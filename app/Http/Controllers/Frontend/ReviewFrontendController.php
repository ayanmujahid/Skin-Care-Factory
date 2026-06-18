<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Repositories\FileRepository;

class ReviewFrontendController extends Controller
{
    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }
    //
    public function storeFrontend(Request $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Please login to submit your review.'
            ]);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required',
            'email' => 'required|email',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required',
            'review.*' => 'nullable|file'
        ]);

        $review = Review::create([
            'product_id' => $request->product_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'content' => $request->content,
            'status' => 0 // pending
        ]);

        if ($request->hasFile('review')) {
            $this->fileRepo->uploadMultiple(
                $request->file('review'),
                $review,
                'review'
            );
        }

        return response()->json([
            'status' => true,
            'message' => 'Review submitted successfully and is pending approval.'
        ]);
    }
}
