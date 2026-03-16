<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => 'not_logged_in',
                'message' => 'Please login to add to wishlist.'
            ]);
        }

        $userId = Auth::id();
        $productId = $request->product_id;

        // Check if already in wishlist
        $wishlist = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            return response()->json([
                'success'     => true,
                'status' => 'removed',
                'message' => 'Removed from wishlist'
            ]);
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
            return response()->json([
                'success'     => true,
                'status' => 'added',
                'message' => 'Added to wishlist'
            ]);
        }
    }

    public function remove(Request $request)
    {
        $wishlistItem = Wishlist::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->first();

        if($wishlistItem) {
            $wishlistItem->delete();
            return response()->json([
                'status' => 'removed',
                'message' => 'Product removed from wishlist'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Product not found in wishlist'
        ]);
    }
}
