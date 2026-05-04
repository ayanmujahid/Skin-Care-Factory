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

class CheckoutController extends Controller
{
    //
    public function placeOrder(Request $request, $token = null)
    {
        /*
    |------------------------------------------
    | Validate customer data
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
    | CASE 1: SHARED CART (DB via token)
    |------------------------------------------
    */
        if ($token) {

            $sharedCart = SharedCart::with('items.variant.product.mainImage')
                ->where('token', $token)
                ->firstOrFail();

            $isShared = true;

            foreach ($sharedCart->items as $item) {

                $variant = $item->variant;
                $product = $variant->product;

                $price = $variant->discounted_price ?? $variant->price;
                $qty = $item->quantity;

                $total += $price * $qty;

                $cartItems[] = [
                    'variant_id' => $variant->id,
                    'quantity'   => $qty,
                    'price'      => $price,
                ];
            }

            // Apply discount from shared cart
            $discount = ($total * $sharedCart->discount_percent) / 100;
            $total = $total - $discount;
        }

        /*
    |------------------------------------------
    | CASE 2: NORMAL CART (session)
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
        }

        /*
    |------------------------------------------
    | CREATE ORDER
    |------------------------------------------
    */
        $order = Order::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
            'apartment' => $request->apartment,
            'city'    => $request->city,
            'state'   => $request->state,
            'zip'     => $request->zip,
            'notes'   => $request->notes,
            'total'   => $total,

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
    | PROFESSIONAL POINTS (ONLY shared cart)
    |------------------------------------------
    */
        if ($isShared) {

            $earnRate = config('points.earn_rate', 0.5);
            $points = floor($order->total * $earnRate);

            PointsTransaction::create([
                'professional_id' => $sharedCart->professional_id,
                'points' => $points,
                'type' => 'earn',
                'reference' => 'order_' . $order->id
            ]);

            // mark cart as used
            $sharedCart->update([
                'status' => 'used'
            ]);
        }

        /*
    |------------------------------------------
    | EMAIL NOTIFICATION
    |------------------------------------------
    */
        // Mail::to([
        //     'robert0307a@gmail.com',
        //     'erinn@skincarefactory.com'
        // ])->send(new OrderPlacedMail($order));

        /*
    |------------------------------------------
    | CLEANUP
    |------------------------------------------
    */
        session()->forget('cart');

        return redirect()->route('shop')
            ->with('notify_success', 'Order placed successfully!');
    }
}
