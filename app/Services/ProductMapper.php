<?php

namespace App\Services;

class ProductMapper
{
    public function map(array $product, string $storeUrl)
    {
        return [

            'shopify_id' => $product['id'],

            'name' => $product['title'],

            'handle' => $product['handle'] ?? null,

            'body_html' => $product['body_html'] ?? '',

            'product_type' => $product['product_type'] ?? '',

            'vendor' => $product['vendor'] ?? '',

            'tags' => $product['tags'] ?? '',

            'options' => $product['options'] ?? [],

            'variants' => $product['variants'] ?? [],

            'images' => $product['images'] ?? [],

            'store_url' => $storeUrl
        ];
    }
}
