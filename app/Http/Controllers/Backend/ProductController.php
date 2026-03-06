<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductVariant;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jobs\ImportProductsJob;

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
            // 'in_stock' => Product::where('stock', '>', 0)->count(),
            // 'out_stock' => Product::where('stock', 0)->count(),
            // 'revenue' => Product::sum('price'),
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
        $slug = $this->slug_maker($request->input('name'), Product::class);

        $product = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'stock' => $request->stock,
            'is_featured' => $request->is_featured,
            'discounted_price' => $request->discounted_price,
            'slug' => $slug,


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
            'is_featured' => $request->is_featured,
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


    public function bulk()
    {
        return view('admin.product-management.bulk')->with('title', 'Add Bulk Product');
    }
    public function jsonbulk()
    {
        return view('admin.product-management.jsonbulk')->with('title', 'Add Bulk Product (JSON)');
    }


    public function importProductsCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $file = fopen($path, 'r');
        $header = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {

            $rowData = array_combine($header, $row);
            $rowData = array_map(fn($v) => trim($v) === '' ? null : trim($v), $rowData);

            // ✅ CATEGORY (auto create)
            $category = null;
            if (!empty($rowData['category'])) {
                $category = ProductCategory::firstOrCreate(
                    ['slug' => \Str::slug($rowData['category'])],
                    ['name' => $rowData['category']]
                );
            }

            // ✅ SUB CATEGORY (auto create)
            $subCategory = null;
            if (!empty($rowData['sub_category']) && $category) {
                $subCategory = ProductSubCategory::firstOrCreate(
                    [
                        'slug' => \Str::slug($rowData['sub_category']),
                    ],
                    [
                        'name' => $rowData['sub_category'],
                        'category_id' => $category->id
                    ]
                );
            }

            // 🟢 PRODUCT
            $product = Product::updateOrCreate(
                ['slug' => $rowData['slug']],
                [
                    'category_id'      => $category?->id,
                    'sub_category_id'  => $subCategory?->id,
                    'name'             => $rowData['name'],
                    'long_description' => $rowData['long_description'],
                    'is_featured'      => $rowData['is_featured'] ?? 0,
                ]
            );

            // 🟢 VARIANT
            ProductVariant::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'color'      => $rowData['color'],
                    'size'       => $rowData['size'],
                ],
                [
                    'price'            => $rowData['price'],
                    'discounted_price' => $rowData['discounted_price'],
                    'stock'            => $rowData['stock'] ?? 0,
                    'sku'              => $rowData['sku'],
                ]
            );

            // 🖼 MAIN IMAGE
            if (!empty($rowData['main_image'])) {
                $this->fileRepo->deleteAll($product, 'main_image');
                $this->fileRepo->uploadFromPath($rowData['main_image'], $product, 'main_image');
            }

            // 🖼 GALLERY
            if (!empty($rowData['gallery'])) {
                $this->fileRepo->deleteAll($product, 'gallery');
                foreach (explode('|', $rowData['gallery']) as $img) {
                    $this->fileRepo->uploadFromPath(trim($img), $product, 'gallery');
                }
            }
        }

        fclose($file);

        return back()->with('success', 'Products imported with variants successfully!');
    }

    public function importProductsJson(Request $request)
    {

        $request->validate([
            'json_file' => 'required|mimes:json,txt'
        ]);

        $json = json_decode(file_get_contents($request->file('json_file')->getRealPath()), true);
        // dd($json);

        // support both wrapped and unwrapped JSON
        $products = $json['products'] ?? $json;

        // Split into chunks
        $chunks = array_chunk($products, 60);

        foreach ($chunks as $chunk) {
            ImportProductsJob::dispatch($chunk);
        }


        return back()->with('success', 'Import started in background.');
    }
}
