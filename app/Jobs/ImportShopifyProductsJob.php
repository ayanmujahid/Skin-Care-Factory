<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\ShopifyImporter;


class ImportShopifyProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $storeUrl;

    public function __construct($storeUrl)
    {
        $this->storeUrl = $storeUrl;
    }

    public function handle(ShopifyImporter $importer)
    {
        $importer->import($this->storeUrl);
    }
} 