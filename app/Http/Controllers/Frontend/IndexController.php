<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;

class IndexController extends Controller
{
    public function __construct()
    {
        $categories = ProductCategory::with('subcategories')->get();


        $product = Product::latest()->first(); // ✅ single product

        view()->share('product', $product);
        View()->share('categories', $categories);
    }
    //

    // public function index(){
    //     $data = compact('sliders', 'venues');
    //     return view('index')->with('title', 'Home')->with($data);
    // }
    public function index()
    {
        // Take 8 newest products
        $newProducts = Product::latest()->take(8)->get();

        // Split new products for two sliders/tabs
        $upperNewProducts = $newProducts->take(4); // first 4 products
        $lowerNewProducts = $newProducts->slice(4); // remaining 4 products

        // Featured products
        $featuredProducts = Product::where('is_featured', 1)->take(8)->get();

        return view('index', compact(
            'upperNewProducts',
            'lowerNewProducts',
            'featuredProducts'
        ))->with('title', 'Home');
    }

    public function aboutUs()
    {
        return view('about-us')->with('title', 'About Us');
    }

    public function cart()
    {
        $cart = session('cart', []);

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('cart', compact('cart', 'total'))->with('title', 'Cart');
    }

    public function checkout()
    {
        $cart = session('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('checkout', compact('cart', 'total'))->with('title', 'Checkout');
    }

    public function contactUs()
    {
        return view('contact-us')->with('title', 'Contact Us');
    }

    public function login()
    {
        return view('login')->with('title', 'Login');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy')->with('title', 'Privacy Policy');
    }

    public function productDetails($slug)
    {
        $product = Product::with(['mainImage', 'gallery'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProduct = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(12)
            ->get();

        return view('product-details', compact('product', 'relatedProduct'))->with('title', $product->name);
    }


    public function returnPolicy()
    {
        return view('return-policy')->with('title', 'Return Policy');
    }

    public function shippingPolicy()
    {
        return view('shipping-policy')->with('title', 'Shipping Policy');
    }

    public function shop($slug = null, $subSlug = null)
    {
        $subcats = ProductSubCategory::get();
        $search_query = request('search');
        $sort_option = request('sort', 'featured');

        $productsQuery = Product::query();

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
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $productsQuery->orderBy('price', 'desc');
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

        return view('shop', compact(
            'products',
            'categories',
            'categoryName',
            'subcats',
            'totalProducts',
            'slug'
        ))->with('title', 'Shop');
    }


    public function signup()
    {
        return view('signup')->with('title', 'Signup');
    }

    public function termsAndConditions()
    {
        return view('terms-and-conditions')->with('title', 'Terms And Conditions');
    }

    public function testimonials()
    {
        return view('testimonials')->with('title', 'Testimonials');
    }

    public function wishlist()
    {
        return view('wishlist')->with('title', 'Wishlist');
    }
}
