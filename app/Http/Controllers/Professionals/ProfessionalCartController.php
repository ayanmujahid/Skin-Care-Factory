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
        $cartItems = $request->cart_items;

        if (!$cartItems || count($cartItems) == 0) {
            return back()->with('error', 'Cart is empty');
        }

        $pointsUsed = session('points_used', 0);

        // 🔥 Discount Logic (future scalable)
        $discountPercent = min(($pointsUsed / 1000) * 5, 20);

        $cart = SharedCart::create([
            'professional_id' => auth()->id(),
            'token' => Str::uuid(),
            'discount_percent' => $discountPercent,
            'points_used' => $pointsUsed,
            'status' => 'active'
        ]);

        foreach ($cartItems as $item) {
            SharedCartItem::create([
                'shared_cart_id' => $cart->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['qty']
            ]);
        }

        // 🔥 Deduct points ONLY here
        if ($pointsUsed > 0) {
            PointsTransaction::create([
                'professional_id' => auth()->id(),
                'points' => -$pointsUsed,
                'type' => 'spend',
                'reference' => 'cart_' . $cart->id
            ]);
        }

        session()->forget('points_used');

        return back()->with([
            'success' => 'Link generated',
            'link' => url('/cart/share/' . $cart->token)
        ]);
    }

    public function add(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer',
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
        ->where('product_id', $request->product_id)
        ->first();

    if ($item) {
        $item->increment('quantity', $request->quantity);
    } else {
        SharedCartItem::create([
            'shared_cart_id' => $cart->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity
        ]);
    }

    return response()->json([
        'status' => 'success',
        'message' => 'Added to professional cart'
    ]);
}
public function show($token)
{
    $cart = SharedCart::with('items.product')
        ->where('token', $token)
        ->firstOrFail();

    return response()->json($cart);
}
}
