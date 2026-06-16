<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShopifyImporter
{
    public function __construct(
        ProductMapper $mapper,
        ProductStoreService $storeService
    ) {
        $this->mapper = $mapper;
        $this->storeService = $storeService;
    }

    public function import($storeUrl)
    {
        $page = 1;

        $totalImported = 0;

        do {

            $url =
                $storeUrl .
                '/products.json?limit=250&page=' .
                $page;

            $response = Http::get($url);

            $products =
                $response->json('products');

            if (empty($products)) {
                break;
            }

            foreach ($products as $product) {
                $data = $this->mapper->map(
                    $product,
                    $storeUrl
                );

                $this->storeService
                    ->createProduct(
                        $data
                    );

                $totalImported++;
            }

            $page++;
        } while (true);

        return $totalImported;
    }
}
