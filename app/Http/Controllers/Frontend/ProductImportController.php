<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ImportShopifyProductsJob;

class ProductImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'store_url' => 'required|url'
        ]);

        // Dispatch job to queue
        ImportShopifyProductsJob::dispatch($request->store_url);

        return response()->json([
            'success' => true,
            'message' => 'Product import job has been queued successfully.'
        ]);
    }

    public function index()
    {
        return view('admin.products.import');
    }
}