<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\SharedCart;


class IndexController extends Controller
{
    public function __construct()
    {
        $categories = ProductCategory::with('subcategories')->get();
        $brands = Brand::get();


        $product = Product::latest()->first(); // ✅ single product

        view()->share('product', $product);
        View()->share('categories', $categories);
        View()->share('brands', $brands);
    }
    //

    // public function index(){
    //     $data = compact('sliders', 'venues');
    //     return view('index')->with('title', 'Home')->with($data);
    // }
    public function index()
    {
        // Take 8 newest products
        $newProducts = Product::with(['mainImage', 'firstVariant'])
            ->latest()
            ->take(8)
            ->get();

        // Split new products for two sliders/tabs
        $upperNewProducts = $newProducts->take(5); // first 4 products
        $lowerNewProducts = $newProducts->slice(4); // remaining 4 products

        // Featured products
        $featuredProducts = Product::where('is_featured', 0)->take(12)->get();

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
    public function faqs()
    {
        return view('faqs')->with('title', 'FAQs');
    }
    public function education()
    {
        return view('education')->with('title', 'Education');
    }
    public function resources()
    {
        return view('resources')->with('title', 'Resources');
    }

    public function blogs()
    {
        return view('blogs')->with('title', 'Blogs');
    }

    public function cart()
    {
        $cart = session('cart', []);

        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('cart', compact('cart', 'total'))->with('title', 'Cart');
    }

    public function checkout()
    {
        // 🔥 CASE 1: Shared Cart
        if (session()->has('shared_cart_id')) {

            $sharedCart = SharedCart::with('items.product')
                ->findOrFail(session('shared_cart_id'));

            $cart = [];

            $subtotal = 0;

            foreach ($sharedCart->items as $item) {

                $price = $item->product->price;
                $qty = $item->quantity;

                $subtotal += $price * $qty;

                $cart[] = [
                    'name' => $item->product->name,
                    'price' => $price,
                    'quantity' => $qty,
                    'image' => $item->product->image ?? '',
                    'color' => '-',
                    'size' => '-',
                ];
            }

            $discount = ($subtotal * $sharedCart->discount_percent) / 100;
            $total = $subtotal - $discount;

            return view('checkout', [
                'cart' => $cart,
                'cartTotal' => $total,
                'discount' => $discount,
                'isShared' => true
            ]);
        }
dd(config('services.stripe.secret'));

        // 🔥 CASE 2: Normal Cart
        $cart = session('cart', []);

        $cartTotal = array_sum(array_map(
            fn($item) => $item['price'] * $item['quantity'],
            $cart
        ));

        return view('checkout', [
            'cart' => $cart,
            'cartTotal' => $cartTotal,
            'discount' => 0,
            'isShared' => false
        ]);
    }





    public function contactUs()
    {
        return view('contact-us')->with('title', 'Contact Us');
    }
    public function brands()
    {
        $brands = Brand::get();
        return view('brands', compact('brands'))->with('title', 'Brands');
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
        $product = Product::with([
            'mainImage',
            'gallery',
            'variants.attributes.attribute',
            'brand',
            'category'
        ])
            ->withSum('variants as total_stock', 'stock')
            ->withMin('variants as min_price', 'price')
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProduct = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(12)
            ->get();

        return view('product-details', compact('product', 'relatedProduct'))
            ->with('title', $product->name);
    }


    public function returnPolicy()
    {
        return view('return-policy')->with('title', 'Return Policy');
    }

    public function shippingPolicy()
    {
        return view('shipping-policy')->with('title', 'Shipping Policy');
    }

    public function shop($slug = null, $subSlug = null, $brandSlug = null)
    {
        $subcats = ProductSubCategory::get();
        $brands = Brand::get();

        $search_query = request('search');

        $sort_option = request('sort', 'featured');

        // Brand from query string
        $brandSlug = request('brand');

        $productsQuery = Product::query()->withMin('variants', 'price');

        $categories = ProductCategory::withCount('products')->get();

        $totalProducts = Product::count();

        $categoryName = 'New Arrival';

        /*
    |--------------------------------------------------------------------------
    | CATEGORY FILTER
    |--------------------------------------------------------------------------
    */

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

        /*
    |--------------------------------------------------------------------------
    | BRAND FILTER
    |--------------------------------------------------------------------------
    */

        if ($brandSlug) {

            $brand = Brand::where('slug', $brandSlug)->first();

            if ($brand) {

                $categoryName = $brand->name;

                $productsQuery->where('brand_id', $brand->id);
            }
        }

        /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

        if ($search_query) {

            $search = strtolower(trim($search_query));

            $searchNoSpace = str_replace(' ', '', $search);

            $pattern = implode('.*', str_split($searchNoSpace));

            $productsQuery->where(function ($query) use ($search, $pattern) {

                $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"])

                    ->orWhereRaw(
                        "LOWER(REPLACE(name, ' ', '')) REGEXP ?",
                        [$pattern]
                    );
            });
        }

        /*
    |--------------------------------------------------------------------------
    | SORTING
    |--------------------------------------------------------------------------
    */

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

        $products = $productsQuery->paginate(12);

        return view('shop', compact(
            'products',
            'categories',
            'categoryName',
            'subcats',
            'totalProducts',
            'slug',
            'brandSlug',
            'brands'
        ))->with('title', 'Shop');
    }


    public function filterAjax(Request $request)
    {
        $products = Product::with([
            'mainImage',
            'category',
            'firstVariant'
        ]);

        // CATEGORY FILTER
        if ($request->categories) {

            $products->whereIn('category_id', $request->categories);
        }

        // BRAND FILTER
        if ($request->brands) {

            $products->whereIn('brand_id', $request->brands);
        }

        // SORTING
        switch ($request->sort) {

            case 'price-asc':

                $products->withMin('variants', 'price')
                    ->orderBy('variants_min_price', 'asc');

                break;

            case 'price-desc':

                $products->withMin('variants', 'price')
                    ->orderBy('variants_min_price', 'desc');

                break;

            case 'alphabetical-asc':

                $products->orderBy('name', 'asc');

                break;

            case 'alphabetical-desc':

                $products->orderBy('name', 'desc');

                break;

            default:

                $products->latest();
        }

        $products = $products->get();

        return view('partials.shop-products', compact('products'))->render();
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
        if (!Auth::check()) {
            return redirect()->back()->with('notify_error', 'Please login first');
        }

        $user = Auth::user();
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', $user->id)
            ->get();

        $wishlistCount = $wishlistItems->count();

        return view('wishlist', compact('wishlistItems', 'wishlistCount'))
            ->with('title', 'Wishlist');
    }

    public function professionalSignup()
    {
        $types = config('professional.types');

        return view('professional-signup', compact('types'))->with('title', 'Professional Signup');
    }

    public function search(Request $request)
    {
        $query = strtolower(trim($request->get('query')));

        $queryNoSpace = str_replace(' ', '', $query);

        $pattern = implode('.*', str_split($queryNoSpace));

        $products = Product::where(function ($q) use ($query, $pattern) {

            $q->whereRaw('LOWER(name) LIKE ?', ["%{$query}%"])
                ->orWhereRaw(
                    "LOWER(REPLACE(name, ' ', '')) REGEXP ?",
                    [$pattern]
                );
        })
            ->take(8)
            ->get();

        $html = view('partials.search-products', compact('products'))->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function paymentSuccess()
    {
        return view('payment-success')->with('title', 'Payment Success');
    }
}
