<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    // public function index(){
    //     $data = compact('sliders', 'venues');
    //     return view('index')->with('title', 'Home')->with($data);
    // }
    public function index()
    {
        return view('index')->with('title', 'Home');
    }

    public function aboutUs()
    {
        return view('about-us')->with('title', 'About Us');
    }

    public function cart()
    {
        return view('cart')->with('title', 'Cart');
    }

    public function checkout()
    {
        return view('checkout')->with('title', 'Checkout');
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

    public function productDetails($slug = null)
    {
        return view('product-details')->with('title', 'Product Details');
    }

    public function returnPolicy()
    {
        return view('return-policy')->with('title', 'Return Policy');
    }

    public function shippingPolicy()
    {
        return view('shipping-policy')->with('title', 'Shipping Policy');
    }

    public function shop()
    {
        return view('shop')->with('title', 'Shop');
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
