<?php

namespace App\Http\Controllers\Professionals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\SharedCart;

class ProfessionalIndexController extends Controller
{
    //
    public function __construct()
    {
        $categories = ProductCategory::with('subcategories')->get();


        $product = Product::latest()->first(); // ✅ single product

        view()->share('product', $product);
        View()->share('categories', $categories);
    }

    public function shop($slug = null, $subSlug = null)
    {
        $subcats = ProductSubCategory::get();
        $search_query = request('search');
        $sort_option = request('sort', 'featured');

        $productsQuery = Product::query()->withMin('variants', 'price');

        $categories = ProductCategory::withCount('products')->get();
        $totalProducts = Product::count();

        $categoryName = 'New Arrival';

        if ($slug) {
            $category = ProductCategory::where('slug', $slug)->first();

            if ($category) {
                $categoryName = $category->name;
                $productsQuery->where('category_id', $category->id);

                if ($subSlug) {
                    $productsQuery->whereHas('subcategory', function ($query) use ($subSlug) {
                        $query->where('slug', $subSlug);
                    });
                }
            }
        }

        if ($search_query) {
            $productsQuery->where('name', 'like', "%$search_query%");
        }

        switch ($sort_option) {
            case 'price-asc':
                $productsQuery->orderBy('variants_min_price', 'asc');
                break;

            case 'price-desc':
                $productsQuery->orderBy('variants_min_price', 'desc');
                break;

            case 'alphabetical-asc':
                $productsQuery->orderBy('name', 'asc');
                break;

            case 'alphabetical-desc':
                $productsQuery->orderBy('name', 'desc');
                break;

            default:
                $productsQuery->orderBy('created_at', 'desc');
        }

        $products = $productsQuery->get();

        return view('professionals.shop', [
            'cartMode' => 'professional'
        ], compact(
            'products',
            'categories',
            'categoryName',
            'subcats',
            'totalProducts',
            'slug'
        ))->with('title', 'Shop');
    }
}
