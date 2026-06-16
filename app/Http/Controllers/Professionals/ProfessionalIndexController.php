<?php

namespace App\Http\Controllers\Professionals;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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

    public function index()
    {
        // Take 8 newest products
        $newProducts = Product::with(['mainImage', 'firstVariant'])
            ->latest()
            ->take(8)
            ->get();

        // Split new products for two sliders/tabs
        $upperNewProducts = $newProducts->take(4); // first 4 products
        $lowerNewProducts = $newProducts->slice(4); // remaining 4 products

        // Featured products
        $featuredProducts = Product::where('is_featured', 0)->take(12)->get();

        return view('professionals.index', compact(
            'upperNewProducts',
            'lowerNewProducts',
            'featuredProducts'
        ))->with('title', 'Professional Home');
    }

    public function shop($slug = null, $subSlug = null)
    {
        $subcats = ProductSubCategory::get();
        $brands = Brand::get();

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
            'brands',
            'totalProducts',
            'slug'
        ))->with('title', 'Shop');
    }


    public function shared_checkout()
{
    $cart = SharedCart::with('items.variant.product.mainImage')
        ->where('id', session('shared_cart_id'))
        ->firstOrFail();

    $subtotal = 0;

    $items = [];

    foreach ($cart->items as $item) {

        $price = $item->variant->discounted_price ?? $item->variant->price;

        $subtotal += $price * $item->quantity;

        $items[] = [
            'name' => $item->variant->product->name,
            'image' => $item->variant->product->mainImage
                ? asset('storage/' . $item->variant->product->mainImage->url)
                : '',
            'price' => $price,
            'quantity' => $item->quantity,
            'color' => $item->variant->color,
            'size' => $item->variant->size,
        ];
    }

    $discount = ($subtotal * $cart->discount_percent) / 100;

    return view('cart.share-checkout', [
        'cart' => $items,
        'cartTotal' => $subtotal,
        'discount' => $discount,
        'isShared' => true
    ]);
}
}
