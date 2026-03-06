<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;



class CheckoutController extends Controller
{
    //
    public function placeOrder(Request $request)
{
    $cart = session('cart');

    if (!$cart || count($cart) == 0) {
        return redirect()->route('cart')->with('error', 'Cart is empty');
    }

    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'phone'   => 'required',
        'address' => 'required',
        'city'    => 'required',
        'state'   => 'required',
        'zip'     => 'required',
    ]);

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
        'total'   => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
    ]);

    foreach ($cart as $item) {
        OrderItem::create([
            'order_id'           => $order->id,
            'product_variant_id'=> $item['variant_id'], // 👈 IMPORTANT
            'quantity'           => $item['quantity'],
            'price'              => $item['price'],
        ]);

        // 🔻 Reduce stock
        ProductVariant::where('id', $item['variant_id'])
            ->decrement('stock', $item['quantity']);
    }

    session()->forget('cart');

    return redirect()->route('shop')->with('notify_success', 'Order placed successfully!');
}

}
