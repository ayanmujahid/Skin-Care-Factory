<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductVariant;
use App\Models\VariantAttributeValue;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jobs\ImportProductsJob;
use App\Models\Brand;
use App\Models\AttributeValue;
use App\Models\Attribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\MyTrait;

class ProductController extends Controller
{
    use MyTrait;

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
        $brands = Brand::orderBy('name')->get();
        return view('admin.product-management.create', compact('categories', 'brands'));
    }

    public function subCategories($categoryId)
    {
        return ProductSubCategory::where('category_id', $categoryId)
            ->orderBy('name')
            ->get(['id', 'name']);
    }

    public function store(Request $request)
    {
        Log::info('=== PRODUCT STORE START ===', $request->all());

        DB::beginTransaction();

        try {

            // ---------------- VALIDATION ----------------
            Log::info('Validating request...');

            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required',
                'brand_id' => 'required',
                'variants' => 'required|array|min:1',
                'variants.*.price' => 'required|numeric|min:0',
            ]);

            Log::info('Validation passed');

            // ---------------- SLUG ----------------
            $slug = $this->slug_maker($request->name, Product::class);
            Log::info('Slug generated', ['slug' => $slug]);

            // ---------------- PRODUCT ----------------
            $product = Product::create([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'sub_category_id' => $request->sub_category_id,
                'name' => $request->name,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'benefits' => $request->benefits,
                'ingredients' => $request->ingredients,
                'how_to_use' => $request->how_to_use,
                'pro_tip' => $request->pro_tip,
                'is_featured' => $request->is_featured ?? 0,
                'slug' => $slug,
            ]);

            Log::info('Product created', ['product_id' => $product->id]);

            // ---------------- VARIANTS ----------------
            foreach ($request->variants as $index => $variantData) {

                Log::info("Processing variant #{$index}", $variantData);

                $sku = $slug . '-' . uniqid();

                $variant = ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $sku,
                    'price' => $variantData['price'],
                    'compare_price' => $variantData['compare_price'] ?? null,
                    'stock' => $variantData['stock'] ?? 0,
                    'is_active' => 1,
                ]);

                Log::info('Variant created', ['variant_id' => $variant->id]);

                // ---------------- ATTRIBUTES ----------------
                if (!empty($variantData['attributes'])) {

                    foreach ($variantData['attributes'] as $attrIndex => $attr) {

                        Log::info("Variant attribute #{$attrIndex}", $attr);

                        if (empty($attr['name']) || empty($attr['value'])) {
                            Log::warning('Skipped empty attribute', $attr);
                            continue;
                        }

                        $attribute = Attribute::firstOrCreate([
                            'name' => $attr['name']
                        ]);

                        $attributeValue = AttributeValue::firstOrCreate([
                            'attribute_id' => $attribute->id,
                            'value' => $attr['value']
                        ]);

                        VariantAttributeValue::create([
                            'product_variant_id' => $variant->id,
                            'attribute_value_id' => $attributeValue->id
                        ]);
                    }
                }
            }

            // ---------------- IMAGES ----------------
            if ($request->hasFile('main_image')) {
                Log::info('Uploading main image');
                $this->fileRepo->upload($request->file('main_image'), $product, 'main_image');
            } else {
                Log::warning('Main image not found');
            }

            if ($request->hasFile('gallery')) {
                Log::info('Uploading gallery images');
                $this->fileRepo->uploadMultiple($request->file('gallery'), $product, 'gallery');
            } else {
                Log::warning('Gallery images not found');
            }

            DB::commit();

            Log::info('=== PRODUCT STORE SUCCESS ===', ['product_id' => $product->id]);

            return redirect()
                ->route('admin.products.index')
                ->with('success', 'Product created successfully');
        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('=== PRODUCT STORE FAILED ===', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }


    public function show(Product $product)
    {
        return view('admin.product-management.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();

        return view('admin.product-management.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:product_categories,id',
            'sub_category_id' => 'nullable|exists:product_sub_categories,id',
            'brand_id' => 'nullable|exists:brands,id',

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
            'brand_id' => $request->brand_id,
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
