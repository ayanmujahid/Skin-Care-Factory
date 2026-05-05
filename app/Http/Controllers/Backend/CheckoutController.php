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


class CheckoutController extends Controller
{
    //
    public function placeOrder(Request $request, $token = null)
    {
        /*
    |------------------------------------------
    | VALIDATION
    |------------------------------------------
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

        /*
    |------------------------------------------
    | SHARED CART
    |------------------------------------------
    */
        if ($token) {

            $sharedCart = SharedCart::with('items.variant.product.mainImage')
                ->where('token', $token)
                ->firstOrFail();

            $isShared = true;

            foreach ($sharedCart->items as $item) {

                $variant = $item->variant;

                $price = $variant->discounted_price ?? $variant->price;
                $qty = $item->quantity;

                $total += $price * $qty;

                $cartItems[] = [
                    'variant_id' => $variant->id,
                    'quantity'   => $qty,
                    'price'      => $price,
                ];
            }

            /*
        |------------------------------------------
        | DISCOUNT CALCULATION (POINTS + CART)
        |------------------------------------------
        */

            $discountPercent = $sharedCart->discount_percent ?? 0;
            $discountAmount = ($total * $discountPercent) / 100;

            $finalTotal = $total - $discountAmount;
        }

        /*
    |------------------------------------------
    | NORMAL CART
    |------------------------------------------
    */ else {

            $cart = session('cart');

            if (!$cart || count($cart) == 0) {
                return redirect()->route('cart')
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
    |------------------------------------------
    | CREATE ORDER
    |------------------------------------------
    */
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

            'professional_id' => $isShared ? $sharedCart->professional_id : null,
            'shared_cart_id'  => $isShared ? $sharedCart->id : null,
            'is_shared_cart'  => $isShared ? 1 : 0,
        ]);

        /*
    |------------------------------------------
    | ORDER ITEMS + STOCK UPDATE
    |------------------------------------------
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
    |------------------------------------------
    | POINTS SYSTEM (ONLY SHARED CART)
    |------------------------------------------
    */
        if ($isShared) {

            // 🟢 REWARD POINTS
            $earnRate = config('points.earn_rate', 0.5);
            $earnPoints = floor($finalTotal * $earnRate);

            PointsTransaction::create([
                'professional_id' => $sharedCart->professional_id,
                'points' => $earnPoints,
                'type' => 'earn',
                'reference' => 'order_' . $order->id
            ]);

            // 🔴 REDEEM USED POINTS
            if ($sharedCart->points_used > 0) {

                PointsTransaction::create([
                    'professional_id' => $sharedCart->professional_id,
                    'points' => $sharedCart->points_used,
                    'type' => 'redeem',
                    'reference' => 'order_' . $order->id
                ]);

                User::where('id', $sharedCart->professional_id)
                    ->decrement('points', $sharedCart->points_used);
            }

            /*
        |------------------------------------------
        | RESET SHARED CART
        |------------------------------------------
        */
            $sharedCart->update([
                'status' => 'used',
                'points_used' => 0,
                'discount_percent' => 0
            ]);
        }

        /*
    |------------------------------------------
    | CLEANUP SESSION
    |------------------------------------------
    */
        session()->forget('cart');

        return redirect()->route('shop')
            ->with('notify_success', 'Order placed successfully!');
    }
}
