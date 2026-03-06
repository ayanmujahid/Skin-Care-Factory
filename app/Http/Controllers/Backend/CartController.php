<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;


class CartController extends Controller
{
    //

    // Add product to cart
    public function add(Request $request)
{
    $variantId = $request->input('variant_id'); // IMPORTANT
    $quantity = $request->input('quantity', 1);

    $variant = ProductVariant::with('product')->findOrFail($variantId);

    $cart = session()->get('cart', []);

    if (isset($cart[$variantId])) {
        $cart[$variantId]['quantity'] += $quantity;
    } else {
        $product = $variant->product;

        $cart[$variantId] = [
            "variant_id" => $variant->id,
            "product_id" => $product->id,
            "name"       => $product->name,
            "color"      => $variant->color,
            "size"       => $variant->size,
            "price"      => floatval($variant->discounted_price ?? $variant->price),
            "quantity"   => $quantity,
            "image"      => $product->mainImage 
                ? asset('storage/' . $product->mainImage->url) 
                : '',
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'success'     => true,
        'cart_count' => array_sum(array_column($cart, 'quantity')),
        'cart_total' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
        'cart'       => array_values($cart),
    ]);
}




    // Remove product from cart
public function remove(Request $request)
{
    $variantId = $request->variant_id;

    $cart = session()->get('cart', []);

    if (isset($cart[$variantId])) {
        unset($cart[$variantId]);
        session()->put('cart', $cart);
    }

    $cartTotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    $cartCount = array_sum(array_column($cart, 'quantity'));

    return response()->json([
        'cart_total' => $cartTotal,
        'cart_count' => $cartCount
    ]);
}







    public function data()
{
    $cart = session()->get('cart', []);

    return response()->json([
        'cart'       => array_values($cart),
        'cart_count' => array_sum(array_column($cart, 'quantity')),
        'cart_total' => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart))
    ]);
}


public function update(Request $request)
{
    $variantId = $request->variant_id;
    $quantity = (int) $request->quantity;

    $cart = session()->get('cart', []);

    if (isset($cart[$variantId])) {
        $cart[$variantId]['quantity'] = $quantity;
        session()->put('cart', $cart);
    }

    $cartTotal = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

    return response()->json([
        'item_total' => $cart[$variantId]['price'] * $cart[$variantId]['quantity'],
        'cart_total' => $cartTotal,
    ]);
}







}
