<?php

namespace App\Http\Controllers\Professionals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SharedCart;
use App\Models\SharedCartItem;
use Illuminate\Support\Facades\DB;
use App\Models\PointsTransaction;
use App\Helpers\PointsHelper;

class ProfessionalCartController extends Controller
{
    //
    public function index()
    {
        $points = PointsHelper::balance(auth()->id());

        return view('professionals.cart', [
            'cartMode' => 'professional'
        ], compact('points'));
    }

    public function pointsBalance()
    {
        return response()->json([
            'points' => PointsHelper::balance(auth()->id())
        ]);
    }

    // ✅ Apply Points (Voucher)
    public function applyPoints(Request $request)
    {
        $request->validate([
            'points' => 'required|integer|min:1'
        ]);

        $available = PointsHelper::balance(auth()->id());

        if ($request->points > $available) {
            return back()->with('error', 'Not enough points');
        }

        session(['points_used' => $request->points]);

        return back()->with('success', 'Points applied');
    }


    // ✅ Remove Points
    public function removePoints()
    {
        session()->forget('points_used');

        return back()->with('success', 'Points removed');
    }

    // ✅ Generate Link
    public function generateLink(Request $request)
    {
        $cart = SharedCart::with('items.variant')
            ->where('professional_id', auth()->id())
            ->where('status', 'active')
            ->first();

        if (!$cart || $cart->items->count() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cart is empty'
            ]);
        }

        $pointsUsed = session('points_used', 0);

        $discountPercent = min(($pointsUsed / 1000) * 5, 20);

        // calculate total (optional but useful for lock snapshot)
        $total = 0;

        foreach ($cart->items as $item) {
            $price = $item->variant->discounted_price ?? $item->variant->price;
            $total += $price * $item->quantity;
        }

        $cart->update([
            'discount_percent' => $discountPercent,
            'points_used' => $pointsUsed,
            'status' => 'locked',
            'locked_at' => now()
        ]);

        $link = url('/shared-cart/' . $cart->token);

        $cart->update([
            'share_link' => $link
        ]);

        session()->forget('points_used');

        return response()->json([
            'status' => 'success',
            'link' => $link,
            'cart_id' => $cart->id
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = auth()->user();

        $cart = SharedCart::firstOrCreate(
            [
                'professional_id' => $user->id,
                'status' => 'active'
            ],
            [
                'token' => Str::uuid()
            ]
        );

        $item = SharedCartItem::where('shared_cart_id', $cart->id)
            ->where('variant_id', $request->variant_id)
            ->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            SharedCartItem::create([
                'shared_cart_id' => $cart->id,
                'variant_id' => $request->variant_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            'status' => 'success'
        ]);
    }
    public function show($token)
    {
        $cart = SharedCart::with('items.product')
            ->where('token', $token)
            ->firstOrFail();

        return response()->json($cart);
    }



    public function current()
    {
        $cart = SharedCart::with([
            'items.variant.product.mainImage'
        ])
            ->where('professional_id', auth()->id())
            ->where('status', 'active')
            ->first();

        if (!$cart) {
            return response()->json([
                'items' => [],
                'cart_total' => 0
            ]);
        }

        $items = $cart->items->map(function ($item) {

            $variant = $item->variant;
            $product = $variant->product;

            $price = $variant->discounted_price ?? $variant->price;

            return [
                'variant_id' => $variant->id,
                'quantity' => $item->quantity,
                'price' => $price,

                'product' => [
                    'name' => $product->name,
                    'price' => $price,
                    'main_image' => $product->mainImage
                        ? $product->mainImage->url
                        : null
                ]
            ];
        });

        return response()->json([
            'items' => $items,
            'cart_total' => $items->sum(fn($i) => $i['price'] * $i['quantity'])
        ]);
    }

    public function data()
    {
        $cart = SharedCart::where('professional_id', auth()->id())
            ->where('status', 'active')
            ->with([
                'items.variant.product.mainImage'
            ])
            ->first();

        if (!$cart) {
            return response()->json([
                'cart' => [],
                'cart_count' => 0,
                'cart_total' => 0
            ]);
        }

        $items = $cart->items->map(function ($item) {
            $variant = $item->variant;
            $product = $variant->product;

            return [
                'variant_id' => $variant->id,
                'name' => $product->name,
                'price' => floatval($variant->discounted_price ?? $variant->price),
                'quantity' => $item->quantity,
                'image' => $product->mainImage
                    ? asset('storage/' . $product->mainImage->url)
                    : ''
            ];
        });

        return response()->json([
            'cart' => $items,
            'cart_count' => $items->sum('quantity'),
            'cart_total' => $items->sum(fn($i) => $i['price'] * $i['quantity'])
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = SharedCart::where('professional_id', auth()->id())
            ->where('status', 'active')
            ->firstOrFail();

        $item = SharedCartItem::where('shared_cart_id', $cart->id)
            ->where('variant_id', $request->variant_id)
            ->firstOrFail();

        $item->quantity = $request->quantity;
        $item->save();

        return response()->json(['status' => 'updated']);
    }

    public function remove(Request $request)
    {
        $cart = SharedCart::where('professional_id', auth()->id())
            ->where('status', 'active')
            ->firstOrFail();

        SharedCartItem::where('shared_cart_id', $cart->id)
            ->where('variant_id', $request->variant_id)
            ->delete();

        return response()->json(['status' => 'removed']);
    }

    public function shared_checkout($token)
    {
        // Load cart safely (no unexpected 404 crash)
        $cart = SharedCart::with('items.variant.product.mainImage')
            ->where('token', $token)
            ->whereIn('status', ['active', 'locked']) // allow both states
            ->first();

        // If cart not found
        if (!$cart) {
            return abort(404, 'Shared cart not found or expired.');
        }

        $subtotal = 0;
        $items = [];

        foreach ($cart->items as $item) {

            $variant = $item->variant;

            // Safety check (prevents crash if relation missing)
            if (!$variant || !$variant->product) {
                continue;
            }

            $product = $variant->product;

            $price = $variant->discounted_price ?? $variant->price;

            $subtotal += $price * $item->quantity;

            $items[] = [
                'name' => $product->name,
                'image' => $product->mainImage
                    ? asset('storage/' . $product->mainImage->url)
                    : null,
                'price' => $price,
                'quantity' => $item->quantity,
                'color' => $variant->color ?? null,
                'size' => $variant->size ?? null,
            ];
        }

        // Discount calculation (safe float handling)
        $discount = ($subtotal * ($cart->discount_percent ?? 0)) / 100;
        $total = max(0, $subtotal - $discount);

        return view('cart.share-checkout', [
            'cart' => $items,
            'cartTotal' => $total,
            'discount' => $discount,
            'subtotal' => $subtotal,
            'isShared' => true,
            'token' => $token,
        ]);
    }

    public function shareCart($token)
    {



        $cart = SharedCart::with('items.variant.product.mainImage')
            ->where('token', $token)
            ->firstOrFail();

        $subtotal = 0;

        $items = $cart->items->map(function ($item) use (&$subtotal) {

            $price = $item->variant->discounted_price ?? $item->variant->price;
            $line = $price * $item->quantity;

            $subtotal += $line;

            return [
                'name' => $item->variant->product->name,
                'image' => $item->variant->product->mainImage
                    ? asset('storage/' . $item->variant->product->mainImage->url)
                    : '',
                'price' => $price,
                'quantity' => $item->quantity,
                'color' => $item->variant->color ?? null,
                'size' => $item->variant->size ?? null,
            ];
        });

        $discount = ($subtotal * $cart->discount_percent) / 100;
        $total = $subtotal - $discount;

        return view('cart.share-cart', [
            'cart' => $items,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'cartModel' => $cart
        ]);
    }
}
