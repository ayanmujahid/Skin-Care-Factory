<?php

namespace App\Services;

use DB;
use Illuminate\Support\Str;

use App\Traits\MyTrait;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\VariantAttributeValue;

class ProductStoreService
{
    use MyTrait;

    public function createProduct(array $data)
    {
        DB::transaction(function () use ($data) {

            /*
        |--------------------------------------------------------------------------
        | BRAND
        |--------------------------------------------------------------------------
        */
            $brand = $this->resolveBrand($data);

            /*
        |--------------------------------------------------------------------------
        | CATEGORY
        |--------------------------------------------------------------------------
        */
            $category = $this->resolveCategory($data);

            /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */
            // $slug = $this->slug_maker(
            //     $data['name'],
            //     Product::class
            // );

            /*
        |--------------------------------------------------------------------------
        | CONTENT PARSER
        |--------------------------------------------------------------------------
        */
            $parsed = app(ProductContentParser::class)
                ->parse(
                    $data['body_html'] ?? ''
                );

            /*
        |--------------------------------------------------------------------------
        | PRODUCT PAGE PARSER
        |--------------------------------------------------------------------------
        */
            $pageData = [];

            if (!empty($data['handle'])) {

                $productUrl =
                    rtrim(
                        $data['store_url'],
                        '/'
                    )
                    . '/products/'
                    . $data['handle'];

                logger('Parsing Product URL', [
                    'url' => $productUrl
                ]);

                try {

                    $pageData =
                        app(ProductPageParser::class)
                        ->parse(
                            $productUrl
                        );

                    logger('Product Page Parsed', $pageData);
                } catch (\Exception $e) {

                    logger()->error(
                        'Product page parsing failed',
                        [
                            'url' => $productUrl,
                            'error' => $e->getMessage()
                        ]
                    );
                }
            }

            /*
        |--------------------------------------------------------------------------
        | PRODUCT
        |--------------------------------------------------------------------------
        */





            $slug = $this->generateUniqueSlug(
                $data['name']
            );

            $duplicate = Product::where('slug', $slug)
                ->orWhere(function ($q) use ($data, $brand) {
                    $q->where('name', $data['name'])
                        ->where('brand_id', $brand->id);
                })
                ->first();

            if ($duplicate) {
                logger('Duplicate product skipped', [
                    'name' => $data['name']
                ]);
                return;
            }

            $product = Product::create([

                'category_id' =>
                $category->id,

                'brand_id' =>
                $brand->id,

                'name' =>
                $data['name'],

                'slug' =>
                $slug,

                'short_description' =>
                Str::limit(
                    strip_tags(
                        $data['body_html'] ?? ''
                    ),
                    250
                ),

                'long_description' =>
                $data['body_html'] ?? '',

                'ingredients' =>
                $pageData['ingredients']
                    ?? $parsed['ingredients']
                    ?? null,

                'benefits' =>
                $pageData['benefits']
                    ?? $parsed['benefits']
                    ?? null,

                'how_to_use' =>
                $pageData['how_to_use']
                    ?? $parsed['how_to_use']
                    ?? null,

                'pro_tip' =>
                $pageData['pro_tip']
                    ?? $parsed['pro_tip']
                    ?? null,
            ]);

            logger('Product Created', [
                'product_id' => $product->id,
                'name' => $product->name,
                'brand' => $brand->name,
                'category' => $category->name
            ]);

            /*
        |--------------------------------------------------------------------------
        | VARIANTS
        |--------------------------------------------------------------------------
        */
            $options =
                $data['options'] ?? [];

            foreach (
                $data['variants'] ?? []
                as $variantData
            ) {

                $sku =
                    !empty($variantData['sku'])
                    ? $variantData['sku']
                    : uniqid('SKU-');

                $sku = $this->generateUniqueSku($sku);

                $variant =
                    ProductVariant::create([

                        'product_id' =>
                        $product->id,

                        'sku' =>
                        $sku,

                        'price' =>
                        $variantData['price']
                            ?? 0,

                        'compare_price' =>
                        $variantData['compare_at_price']
                            ?? null,

                        'stock' =>
                        $variantData['inventory_quantity']
                            ?? 0,

                        'is_active' =>
                        1,
                    ]);

                logger('Variant Created', [
                    'variant_id' => $variant->id,
                    'sku' => $variant->sku
                ]);

                /*
            |--------------------------------------------------------------------------
            | ATTRIBUTES
            |--------------------------------------------------------------------------
            */
                foreach ($options as $index => $option) {

                    $attributeName =
                        trim(
                            $option['name']
                                ?? ''
                        );

                    if (
                        empty($attributeName)
                    ) {
                        continue;
                    }

                    $attribute =
                        Attribute::firstOrCreate([
                            'name' =>
                            $attributeName
                        ]);

                    $optionNumber =
                        $index + 1;

                    $value =
                        $variantData["option{$optionNumber}"] ?? null;

                    if (
                        empty($value)
                        ||
                        $value === 'Default Title'
                    ) {
                        continue;
                    }

                    $attributeValue =
                        AttributeValue::firstOrCreate([

                            'attribute_id' =>
                            $attribute->id,

                            'value' =>
                            trim($value)
                        ]);

                    VariantAttributeValue::firstOrCreate([

                        'product_variant_id' =>
                        $variant->id,

                        'attribute_value_id' =>
                        $attributeValue->id
                    ]);

                    logger('Attribute Linked', [
                        'attribute' => $attributeName,
                        'value' => $value,
                        'variant_id' => $variant->id
                    ]);
                }
            }

            /*
        |--------------------------------------------------------------------------
        | IMAGES
        |--------------------------------------------------------------------------
        */
            try {

                app(ImageDownloader::class)
                    ->saveImages(
                        $product,
                        $data['images'] ?? []
                    );
            } catch (\Exception $e) {

                logger()->error(
                    'Image Download Failed',
                    [
                        'product_id' => $product->id,
                        'error' => $e->getMessage()
                    ]
                );
            }

            logger('IMPORT COMPLETE', [
                'product_id' => $product->id,
                'product_name' => $product->name
            ]);
        });
    }
    /*
    |--------------------------------------------------------------------------
    | BRAND
    |--------------------------------------------------------------------------
    */
    private function resolveBrand(array $data)
    {
        $brandName =
            trim(
                $data['vendor'] ?? ''
            );

        if (empty($brandName)) {

            $host = parse_url(
                $data['store_url'],
                PHP_URL_HOST
            );

            $host = str_replace(
                'www.',
                '',
                $host
            );

            $brandName =
                ucfirst(
                    explode('.', $host)[0]
                );
        }

        return Brand::firstOrCreate(
            [
                'name' => $brandName
            ],
            [
                'slug' => Str::slug($brandName)
            ]
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */
    private function resolveCategory(array $data)
    {
        $categoryName = trim(
            $data['product_type'] ?? ''
        );

        if (!empty($categoryName)) {

            return ProductCategory::firstOrCreate(
                ['name' => $categoryName],
                ['slug' => Str::slug($categoryName)]
            );
        }

        $tags = $data['tags'] ?? [];

        if (is_string($tags)) {
            $tags = explode(',', $tags);
        }

        if (is_array($tags) && count($tags)) {
            $categoryName = trim($tags[0]);
        } else {
            $categoryName = 'General';
        }

        return ProductCategory::firstOrCreate(
            ['name' => $categoryName],
            ['slug' => Str::slug($categoryName)]
        );
    }

    private function generateUniqueSlug($name)
    {
        $baseSlug = Str::slug($name);

        $slug = $baseSlug;

        $counter = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
    private function generateUniqueSku($sku)
    {
        $base = $sku;
        $counter = 1;

        while (
            ProductVariant::where('sku', $sku)->exists()
        ) {
            $sku = $base . '-' . $counter;
            $counter++;
        }

        return $sku;
    }
}
