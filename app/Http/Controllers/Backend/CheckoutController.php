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
    public function placeOrder(Request $request)
    {
        /*
    |------------------------------------------
    | Validate
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

        /*
    |------------------------------------------
    | Detect Cart Type
    |------------------------------------------
    */
        $isShared = session()->has('shared_cart_id');

        $cartItems = [];
        $total = 0;

        /*
    |------------------------------------------
    | CASE 1: Shared Cart
    |------------------------------------------
    */
        if ($isShared) {

            $sharedCart = SharedCart::with('items.product')
                ->findOrFail(session('shared_cart_id'));

            foreach ($sharedCart->items as $item) {

                $price = $item->product->price;
                $qty = $item->quantity;

                $total += $price * $qty;

                $cartItems[] = [
                    'variant_id' => $item->product->default_variant_id ?? null, // adjust if needed
                    'quantity'   => $qty,
                    'price'      => $price,
                ];
            }

            // 🔥 Apply discount
            $discount = ($total * $sharedCart->discount_percent) / 100;
            $total = $total - $discount;
        }

        /*
    |------------------------------------------
    | CASE 2: Normal Cart
    |------------------------------------------
    */ else {

            $cart = session('cart');

            if (!$cart || count($cart) == 0) {
                return redirect()->route('cart')->with('error', 'Cart is empty');
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
    | Create Order
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

            // 🔥 IMPORTANT
            'professional_id' => $isShared ? $sharedCart->professional_id : null,
            'shared_cart_id'  => $isShared ? $sharedCart->id : null,
            'is_shared_cart'  => $isShared ? 1 : 0,
        ]);

        /*
    |------------------------------------------
    | Create Order Items + Reduce Stock
    |------------------------------------------
    */
        foreach ($cartItems as $item) {

            OrderItem::create([
                'order_id'           => $order->id,
                'product_variant_id' => $item['variant_id'],
                'quantity'           => $item['quantity'],
                'price'              => $item['price'],
            ]);

            if ($item['variant_id']) {
                ProductVariant::where('id', $item['variant_id'])
                    ->decrement('stock', $item['quantity']);
            }
        }

        /*
    |------------------------------------------
    | Points Logic (ONLY for shared cart)
    |------------------------------------------
    */
        if ($isShared) {

            // Example logic: 100$ = 50 points
            $points = floor($order->total * 0.5);

            PointsTransaction::create([
                'professional_id' => $sharedCart->professional_id,
                'points' => $points,
                'type' => 'earn',
                'reference' => 'order_' . $order->id
            ]);

            // Optional: mark cart as used
            $sharedCart->update(['status' => 'used']);
        }

        /*
    |------------------------------------------
    | Send Email
    |------------------------------------------
    */
        Mail::to([
            'robert0307a@gmail.com',
            'erinn@skincarefactory.com'
        ])->send(new OrderPlacedMail($order));

        /*
    |------------------------------------------
    | Cleanup Session
    |------------------------------------------
    */
        session()->forget('cart');
        session()->forget('shared_cart_id');

        return redirect()->route('shop')
            ->with('notify_success', 'Order placed successfully!');
    }
}
