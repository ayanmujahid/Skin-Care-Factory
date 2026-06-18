<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Review;
use App\Repositories\FileRepository;


class ReviewController extends Controller
{
    //
    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }

    public function index()
    {
        $reviews = Review::with('product')->paginate(10);
        return view('admin.review-management.index', compact('reviews'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.review-management.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'content'    => 'nullable|string',
            'review.*'   => 'nullable|file',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $review = Review::create($data);

        if ($request->hasFile('review')) {
            $this->fileRepo->uploadMultiple(
                $request->file('review'),
                $review,
                'review'
            );
        }

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review created successfully.');
    }

    public function edit(Review $review)
    {
        $products = Product::all();
        return view('admin.review-management.edit', compact('review', 'products'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'content'    => 'nullable|string',
            'review.*'   => 'nullable|file',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        $review->update($data);

        if ($request->hasFile('review')) {

            // Remove existing files
            $this->fileRepo->deleteAll($review, 'review');

            // Upload new files
            $this->fileRepo->uploadMultiple(
                $request->file('review'),
                $review,
                'review'
            );
        }

        return redirect()
            ->route('admin.reviews.index')
            ->with('success', 'Review updated successfully.');
    }

    public function show(Review $review)
    {
        $review->load(['product', 'files']);

        return view('admin.review-management.show', compact('review'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
    public function approve(Review $review)
    {
        $review->update([
            'status' => 1
        ]);

        return back()->with('success', 'Review approved successfully.');
    }

    public function reject(Review $review)
    {
        $review->update([
            'status' => 2
        ]);

        return back()->with('success', 'Review rejected successfully.');
    }
}
