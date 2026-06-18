<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;
use App\Models\SharedCart;
use App\Models\PointsTransaction;
use App\Models\User;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    //
    public function placeOrder(Request $request, $token = null)
    {
        /*
    |--------------------------------------------------------------------------
    | VALIDATION
    |--------------------------------------------------------------------------
    */

        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'required',
            'address' => 'required',
            'city'    => 'required',
            'state'   => 'required',
            'zip'     => 'required',
        ]);

        $cartItems = [];
        $total = 0;
        $sharedCart = null;
        $isShared = false;
        $finalTotal = 0;

        /*
    |--------------------------------------------------------------------------
    | SHARED CART
    |--------------------------------------------------------------------------
    */

        if ($token) {

            $sharedCart = SharedCart::with('items.variant.product.mainImage')
                ->where('token', $token)
                ->where('status', 'locked')
                ->firstOrFail();

            $isShared = true;

            foreach ($sharedCart->items as $item) {

                $variant = $item->variant;

                if (!$variant) {
                    continue;
                }

                $price = $variant->discounted_price ?? $variant->price;

                $qty = $item->quantity;

                $total += ($price * $qty);

                $cartItems[] = [
                    'variant_id' => $variant->id,
                    'quantity'   => $qty,
                    'price'      => $price,
                ];
            }

            /*
        |--------------------------------------------------------------------------
        | APPLY DISCOUNT
        |--------------------------------------------------------------------------
        */

            $discountPercent = $sharedCart->discount_percent ?? 0;

            $discountAmount = ($total * $discountPercent) / 100;

            $finalTotal = max($total - $discountAmount, 0);
        }

        /*
    |--------------------------------------------------------------------------
    | NORMAL CART
    |--------------------------------------------------------------------------
    */ else {

            $cart = session('cart');

            if (!$cart || count($cart) == 0) {

                return redirect()
                    ->route('cart')
                    ->with('error', 'Cart is empty');
            }

            foreach ($cart as $item) {

                $total += $item['price'] * $item['quantity'];

                $cartItems[] = [
                    'variant_id' => $item['variant_id'],
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price'],
                ];
            }

            $finalTotal = $total;
        }

        /*
    |--------------------------------------------------------------------------
    | CREATE ORDER
    |--------------------------------------------------------------------------
    */
        $paymentIntentId = $request->payment_intent_id;

        if (!$paymentIntentId) {
            return back()->with('error', 'Payment not completed.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::retrieve($paymentIntentId);

        if ($paymentIntent->status !== 'succeeded') {
            return back()->with('error', 'Payment not successful.');
        }

        $order = Order::create([
            'user_id' => auth()->id(),

            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'city'    => $request->city,
            'state'   => $request->state,
            'zip'     => $request->zip,
            'notes'   => $request->notes,

            'total'   => $finalTotal,

            // 🔥 Stripe fields
            'payment_method' => 'stripe',
            'payment_intent_id' => $paymentIntentId,
            'transaction_id' => $paymentIntentId,
            'paid_at' => now(),

            'professional_id' => $isShared ? $sharedCart->professional_id : null,
            'shared_cart_id'  => $isShared ? $sharedCart->id : null,
            'is_shared_cart'  => $isShared ? 1 : 0,
        ]);

        /*
    |--------------------------------------------------------------------------
    | CREATE ORDER ITEMS + UPDATE STOCK
    |--------------------------------------------------------------------------
    */

        foreach ($cartItems as $item) {

            OrderItem::create([
                'order_id'           => $order->id,
                'product_variant_id' => $item['variant_id'],
                'quantity'           => $item['quantity'],
                'price'              => $item['price'],
            ]);

            ProductVariant::where('id', $item['variant_id'])
                ->decrement('stock', $item['quantity']);
        }

        /*
    |--------------------------------------------------------------------------
    | PROFESSIONAL POINTS SYSTEM
    |--------------------------------------------------------------------------
    */

        if ($isShared) {

            /*
        |--------------------------------------------------------------------------
        | EARN POINTS
        |--------------------------------------------------------------------------
        */

            $earnRate = config('points.earn_rate', 0.5);

            $earnPoints = floor($finalTotal * $earnRate);

            if ($earnPoints > 0) {

                PointsTransaction::create([
                    'professional_id' => $sharedCart->professional_id,
                    'points'          => $earnPoints,
                    'type'            => 'earn',
                    'reference'       => 'order_' . $order->id,
                ]);
            }

            /*
        |--------------------------------------------------------------------------
        | SPEND POINTS
        |--------------------------------------------------------------------------
        */

            if ($sharedCart->points_used > 0) {

                PointsTransaction::create([
                    'professional_id' => $sharedCart->professional_id,
                    'points'          => $sharedCart->points_used,
                    'type'            => 'spend',
                    'reference'       => 'order_' . $order->id,
                ]);
            }

            /*
        |--------------------------------------------------------------------------
        | MARK CART AS USED
        |--------------------------------------------------------------------------
        */

            $sharedCart->update([
                'status'            => 'used',
                'points_used'       => 0,
                'discount_percent'  => 0,
                'is_paid'           => 1,
                'paid_at'           => now(),
            ]);
        }

        /*
    |--------------------------------------------------------------------------
    | CLEAR SESSION CART
    |--------------------------------------------------------------------------
    */

        session()->forget('cart');

        return redirect()
            ->route('shop')
            ->with('notify_success', 'Order placed successfully!');
    }

    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = $request->total;

        $intent = PaymentIntent::create([
            'amount' => intval($amount * 100),
            'currency' => 'usd',
            'automatic_payment_methods' => [
                'enabled' => true,
            ],
        ]);

        return response()->json([
            'clientSecret' => $intent->client_secret
        ]);
    }
}
