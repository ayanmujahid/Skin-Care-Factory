<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Order;
use Illuminate\Http\Request;

class CouponFrontendController extends Controller
{
    //
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('status', 1)
            ->first();

        if (!$coupon) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid coupon'
            ]);
        }

        // Expiry Check

        if (
            $coupon->expires_at &&
            now()->gt($coupon->expires_at)
        ) {

            return response()->json([
                'status' => false,
                'message' => 'Coupon expired'
            ]);
        }

        // Usage Limit Check

        if (
            $coupon->usage_limit &&
            $coupon->used_count >= $coupon->usage_limit
        ) {

            return response()->json([
                'status' => false,
                'message' => 'Coupon limit reached'
            ]);
        }

        // Cart Total

        $cart = session()->get('cart', []);

        $cartTotal = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Minimum Amount

        if ($cartTotal < $coupon->min_cart_amount) {

            return response()->json([
                'status' => false,
                'message' => 'Minimum amount not reached'
            ]);
        }

        // Already Used Check

        $alreadyUsed = CouponUsage::where('coupon_id', $coupon->id)

            ->where(function ($query) use ($request) {

                if (auth()->check()) {

                    $query->orWhere('user_id', auth()->id());
                }

                $query->orWhere('email', $request->email)

                    ->orWhere('phone', $request->phone)

                    ->orWhere('ip_address', request()->ip())

                    ->orWhere('guest_token', session('guest_token'));
            })

            ->exists();

        if ($alreadyUsed) {

            return response()->json([
                'status' => false,
                'message' => 'Coupon already used'
            ]);
        }

        // First Order Check

        if ($coupon->is_first_order) {

            $hasOrder = Order::where(function ($query) use ($request) {

                if (auth()->check()) {

                    $query->orWhere('user_id', auth()->id());
                }

                $query->orWhere('email', $request->email)
                    ->orWhere('phone', $request->phone);
            })->exists();

            if ($hasOrder) {

                return response()->json([
                    'status' => false,
                    'message' => 'Only for first order'
                ]);
            }
        }

        // Discount Calculate

        if ($coupon->type == 'percent') {

            $discount = ($cartTotal * $coupon->value) / 100;

            if ($coupon->max_discount) {

                $discount = min($discount, $coupon->max_discount);
            }
        } else {

            $discount = $coupon->value;
        }

        $finalTotal = $cartTotal - $discount;

        // Session Store

        session()->put('coupon', [

            'id' => $coupon->id,

            'code' => $coupon->code,

            'discount' => $discount
        ]);

        return response()->json([

            'status' => true,

            'discount' => $discount,

            'final_total' => $finalTotal,

            'message' => 'Coupon applied successfully'
        ]);
    }

    public function removeCoupon()
    {
        session()->forget('coupon');

        return response()->json([
            'status' => true
        ]);
    }
}
