<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\VariantAttributeValue;
use App\Repositories\FileRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ImportProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 1200;

    public function __construct(public array $products) {}

    public function handle(FileRepository $fileRepo)
    {
        Log::info('ImportProductsJob started', ['count' => count($this->products)]);

        set_time_limit(0);
        ini_set('memory_limit', '-1');

        foreach ($this->products as $rowData) {

            DB::transaction(function () use ($rowData, $fileRepo) {

                // -------------------------------
                // CATEGORY
                // -------------------------------
                $category = null;
                if (!empty($rowData['product_type'])) {
                    $category = ProductCategory::firstOrCreate(
                        ['slug' => Str::slug($rowData['product_type'])],
                        ['name' => $rowData['product_type']]
                    );
                }

                // -------------------------------
                // PRODUCT
                // -------------------------------
                $product = Product::updateOrCreate(
                    ['slug' => $rowData['handle']],
                    [
                        'category_id' => $category?->id,
                        'name' => $rowData['title'] ?? 'No title',
                        'long_description' => $rowData['body_html'] ?? null,
                        'is_featured' => 0,
                    ]
                );

                // -------------------------------
                // VARIANTS
                // -------------------------------
                $importedVariantIds = [];

                if (!empty($rowData['variants'])) {

                    foreach ($rowData['variants'] as $variant) {

                        // -------------------------------
                        // Generate a safe, unique SKU
                        // -------------------------------
                        $optionSlug = collect([$variant['option1'] ?? null, $variant['option2'] ?? null, $variant['option3'] ?? null])
                            ->filter()
                            ->map(fn($o) => Str::slug($o))
                            ->implode('-');

                        $baseSlug = $product->slug ?: 'product';

                        $sku = !empty($variant['sku'])
                            ? $variant['sku']
                            : ($baseSlug . ($optionSlug ? '-' . $optionSlug : '') . '-' . uniqid());

                        // Ensure SKU is unique in DB
                        $originalSku = $sku;
                        $counter = 1;
                        while (ProductVariant::where('sku', $sku)->exists()) {
                            $sku = $originalSku . '-' . $counter++;
                        }
                        if ($sku !== ($variant['sku'] ?? '')) {
                            Log::warning("SKU adjusted to ensure uniqueness", [
                                'original' => $variant['sku'] ?? '',
                                'new' => $sku
                            ]);
                        }

                        // -------------------------------
                        // Create or update variant
                        // -------------------------------
                        $variantModel = ProductVariant::updateOrCreate(
                            [
                                'product_id' => $product->id,
                                'sku' => $sku
                            ],
                            [
                                'price' => $variant['price'] ?? 0,
                                'compare_price' => $variant['compare_at_price'] ?? null,
                                'stock' => !empty($variant['available']) ? 999 : 0,
                            ]
                        );

                        $importedVariantIds[] = $variantModel->id;

                        // -------------------------------
                        // ATTRIBUTES & ATTRIBUTE VALUES
                        // -------------------------------
                        if (!empty($rowData['options'])) {
                            foreach ($rowData['options'] as $option) {
                                $attributeName = $option['name'];
                                $attribute = Attribute::firstOrCreate(['name' => $attributeName]);

                                $value = $variant['option1'] ?? null;
                                if ($option['position'] === 2) $value = $variant['option2'] ?? $value;
                                if ($option['position'] === 3) $value = $variant['option3'] ?? $value;

                                if ($value) {
                                    $attributeValue = AttributeValue::firstOrCreate([
                                        'attribute_id' => $attribute->id,
                                        'value' => $value
                                    ]);

                                    VariantAttributeValue::updateOrCreate(
                                        [
                                            'product_variant_id' => $variantModel->id,
                                            'attribute_value_id' => $attributeValue->id
                                        ]
                                    );
                                }
                            }
                        }
                    }

                    // -------------------------------
                    // Remove old variants not in import
                    // -------------------------------
                    ProductVariant::where('product_id', $product->id)
                        ->whereNotIn('id', $importedVariantIds)
                        ->delete();
                }

                // -------------------------------
                // IMAGES
                // -------------------------------
                if (!empty($rowData['images'])) {
                    $fileRepo->deleteAll($product, 'main_image');
                    $fileRepo->deleteAll($product, 'gallery');

                    foreach ($rowData['images'] as $index => $img) {
                        if (!empty($img['src'])) {
                            try {
                                $fileRepo->uploadFromUrl(
                                    $img['src'],
                                    $product,
                                    $index === 0 ? 'main_image' : 'gallery'
                                );
                            } catch (\Exception $e) {
                                Log::error('Image upload failed', [
                                    'url' => $img['src'],
                                    'error' => $e->getMessage()
                                ]);
                            }
                        }
                    }
                }
            });
        }

        Log::info('ImportProductsJob finished');
    }
}
