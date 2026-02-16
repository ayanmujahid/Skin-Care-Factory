<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //
    protected $fileRepo;

    public function __construct(FileRepository $fileRepo)
    {
        $this->fileRepo = $fileRepo;
    }

    public function index(Request $request)
    {
        $query = Product::query();

        // 🔍 Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 📦 Stock filter
        if ($request->stock === 'in-stock') {
            $query->where('stock', '>', 0);
        }

        if ($request->stock === 'out-of-stock') {
            $query->where('stock', 0);
        }

        // ↕ Sort
        if ($request->sort === 'price') {
            $query->orderBy('price');
        } elseif ($request->sort === 'name') {
            $query->orderBy('name');
        } else {
            $query->latest();
        }

        $products = $query->paginate(10);

        // 📊 Stats
        $stats = [
            'total' => Product::count(),
            'in_stock' => Product::where('stock', '>', 0)->count(),
            'out_stock' => Product::where('stock', 0)->count(),
            'revenue' => Product::sum('price'),
            'recent' => Product::whereDate('created_at', '>=', now()->subMonth())->count(),
        ];

        return view('admin.product-management.index', compact('products', 'stats'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('name')->get();
        return view('admin.product-management.create', compact('categories'));
    }

    public function subCategories($categoryId)
    {
        return ProductSubCategory::where('category_id', $categoryId)
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'main_image' => 'nullable|image',
            'gallery.*' => 'nullable|image',
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'stock' => $request->stock,
            'discounted_price' => $request->discounted_price,
        ]);

        // Handle files
        if ($request->hasFile('main_image')) {
            $this->fileRepo->upload($request->file('main_image'), $product, 'main_image');
        }

        if ($request->hasFile('gallery')) {
            $this->fileRepo->uploadMultiple($request->file('gallery'), $product, 'gallery');
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.product-management.show', compact('product'));
    }

    public function edit(Product $product)
    {
         $categories = ProductCategory::orderBy('name')->get();

        return view('admin.product-management.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'sub_category_id' => 'nullable|exists:product_sub_categories,id',

            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'long_description' => 'nullable|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',

            'main_image' => 'nullable|image',
            'gallery.*' => 'nullable|image',
        ]);

        /**
         * Extra safety:
         * Ensure sub-category belongs to selected category
         */
        if ($request->sub_category_id) {
            $valid = ProductSubCategory::where('id', $request->sub_category_id)
                ->where('category_id', $request->category_id)
                ->exists();

            abort_if(!$valid, 422, 'Invalid sub-category for selected category.');
        }

        // Update product data
        $product->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,

            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'discounted_price' => $request->discounted_price,
        ]);

        // Update main image (replace)
        if ($request->hasFile('main_image')) {
            $this->fileRepo->deleteAll($product, 'main_image');
            $this->fileRepo->upload(
                $request->file('main_image'),
                $product,
                'main_image'
            );
        }

        // Append new gallery images
        if ($request->hasFile('gallery')) {
            $this->fileRepo->uploadMultiple(
                $request->file('gallery'),
                $product,
                'gallery'
            );
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $this->fileRepo->deleteAll($product); // delete all related files
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
