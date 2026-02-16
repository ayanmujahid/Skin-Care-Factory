<?php

use App\Http\Controllers\Backend\{AdminController, DashboardController, ProductController, NewsletterController, InquiryController, ProductCategoryController, ProductSubCategoryController, UserController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ---------------------------------------For Frontend-----------------------------------

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('aboutUs');
Route::get('/cart', [IndexController::class, 'cart'])->name('cart');
Route::get('/checkout', [IndexController::class, 'checkout'])->name('checkout');
Route::get('/contact-us', [IndexController::class, 'contactUs'])->name('contactUs');
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::get('/privacy-policy', [IndexController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/product-details/{slug?}', [IndexController::class, 'productDetails'])->name('productDetails');
Route::get('/return-policy', [IndexController::class, 'returnPolicy'])->name('returnPolicy');
Route::get('/shipping-policy', [IndexController::class, 'shippingPolicy'])->name('shippingPolicy');
Route::get('/shop', [IndexController::class, 'shop'])->name('shop');
Route::get('/signup', [IndexController::class, 'signup'])->name('signup');
Route::get('/terms-and-conditions', [IndexController::class, 'termsAndConditions'])->name('termsAndConditions');
Route::get('/testimonials', [IndexController::class, 'testimonials'])->name('testimonials');
Route::get('/wishlist', [IndexController::class, 'wishlist'])->name('wishlist');

// ---------------------------------------For Frontend-----------------------------------



// ---------------------------------------USER AUTH LOGIN-----------------------------------
Route::post('/signup', [UserController::class, 'signUp'])->name('signUp');
Route::post('/login', [UserController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// ---------------------------------------USER AUTH LOGIN-----------------------------------

// ---------------------------------------Frontend Form Submit-----------------------------------
Route::post('/contact-us', [InquiryController::class, 'contactSubmit'])->name('contactSubmit');
Route::post('/newsletter', [NewsletterController::class, 'newsletterSubmit'])->name('newsletterSubmit');
// ---------------------------------------Frontend Form Submit-----------------------------------


// ---------------------------------------Language-----------------------------------
Route::post('/language', function (Illuminate\Http\Request $request) {
    $locale = $request->input('locale');
    if (in_array($locale, ['en', 'fr'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('language.change');

// ---------------------------------------Language-----------------------------------




// ---------------------------------------ADMIN ROUTES-----------------------------------
Route::get('/admin/login', [DashboardController::class, 'login'])->name('dashboard.login');
Route::get('/admin/register', [DashboardController::class, 'register'])->name('dashboard.register');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::post('/admin/signup', [AdminController::class, 'registerSubmit'])->name('admin.register.submit');
Route::post('/admin/login/submit',    [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
Route::get(
    '/admin/categories/{category}/sub-categories',
    [ProductController::class, 'subCategories']
)->name('admin.categories.subcategories');



Route::prefix('admin')
    ->name('admin.')   // <--- This adds "admin." to route names
    ->group(function () {
        Route::resource('inquiries', InquiryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('newsletters', NewsletterController::class);
        Route::resource('product-categories', ProductCategoryController::class)->parameters(['product-categories' => 'category']);
        Route::resource('product-subcategories', ProductSubCategoryController::class);
    });
