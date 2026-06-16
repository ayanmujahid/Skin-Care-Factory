<?php

use App\Http\Controllers\Backend\{AdminController, ReviewController, BrandController, WishlistController, CheckoutController, CartController, DashboardController, ProductController, NewsletterController, InquiryController, OrderController, ProductCategoryController, ProductSubCategoryController, ProfessionalController, UserController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ReviewFrontendController;
use App\Http\Controllers\Frontend\ProductImportController;
use App\Http\Controllers\Professionals\ProfessionalCartController;
use App\Http\Controllers\Professionals\ProfessionalIndexController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

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
Route::get('/blogs', [IndexController::class, 'blogs'])->name('blogs');
Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('aboutUs');
Route::get('/cart', [IndexController::class, 'cart'])->name('cart');
Route::get('/contact-us', [IndexController::class, 'contactUs'])->name('contactUs');
Route::get('/brands', [IndexController::class, 'brands'])->name('brands');
Route::get('/faqs', [IndexController::class, 'faqs'])->name('faqs');
Route::get('/education', [IndexController::class, 'education'])->name('education');
Route::get('/resources', [IndexController::class, 'resources'])->name('resources');
Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::get('/privacy-policy', [IndexController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/product-details/{slug?}', [IndexController::class, 'productDetails'])->name('productDetails');
Route::get('/return-policy', [IndexController::class, 'returnPolicy'])->name('returnPolicy');
Route::get('/shipping-policy', [IndexController::class, 'shippingPolicy'])->name('shippingPolicy');
Route::get('/shop/filter/ajax', [IndexController::class, 'filterAjax'])
    ->name('shop.filter.ajax');
Route::get('/shop/{slug?}/{subSlug?}', [IndexController::class, 'shop'])->name('shop');
Route::get('/signup', [IndexController::class, 'signup'])->name('signup');
Route::get('/terms-and-conditions', [IndexController::class, 'termsAndConditions'])->name('termsAndConditions');
Route::get('/testimonials', [IndexController::class, 'testimonials'])->name('testimonials');
Route::get('/wishlist', [IndexController::class, 'wishlist'])->name('wishlist');
Route::get('/professional-signup', [IndexController::class, 'professionalSignup'])->name('professionalSignup');
Route::get('/product-search', [IndexController::class, 'search'])
    ->name('product.search');


// ---------------------------------------For Frontend-----------------------------------


// ---------------------------------------For Cart Setup-----------------------------------
Route::get('/product/quick-view/{id}', [CartController::class, 'quickView']);
Route::post('/place-order/{token?}', [CheckoutController::class, 'placeOrder'])->name('place.order');

// Add product to cart
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update']);


// View cart
// Route::get('/cart', [CartController::class, 'index'])->name('cart');

// Remove item from cart
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

// Get cart data (for dropdown)
Route::get('/cart/data', [CartController::class, 'data'])->name('cart.data');
// Route::get('/cart/share/{token}', [CartController::class, 'sharedCart']);
// ---------------------------------------For Cart Setup-----------------------------------


// ---------------------------------------For Checkout Setup-----------------------------------

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [IndexController::class, 'checkout']);
});
// ---------------------------------------For Checkout Setup-----------------------------------


// ---------------------------------------For Review Setup-----------------------------------



// ---------------------------------------For Review Setup-----------------------------------


// ---------------------------------------For Import Setup-----------------------------------
Route::get(
    '/admin/products/import',
    [ProductImportController::class,'index']
);

Route::post(
    '/admin/products/import',
    [ProductImportController::class,'import']
);
// ---------------------------------------For Import Setup-----------------------------------




// ---------------------------------------Wishlist -----------------------------------
Route::post('/wishlist/toggle', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::post('/wishlist/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist/count', function () {
    if (Auth::check()) {
        $count = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $count]);
    } else {
        return response()->json(['count' => 0]);
    }
});
// ---------------------------------------Wishlist -----------------------------------


// ---------------------------------------USER AUTH LOGIN-----------------------------------
Route::post('/signup', [UserController::class, 'signUp'])->name('signUp');
Route::post('/login', [UserController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// ---------------------------------------USER AUTH LOGIN-----------------------------------

// ---------------------------------------PROFESSIONAL AUTH LOGIN-----------------------------------
Route::post('professional-registration', [ProfessionalController::class, 'professionalRegistration'])->name('professionalRegistration');
// ---------------------------------------PROFESSIONAL AUTH LOGIN-----------------------------------

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




// ---------------------------------------Professional ROUTES-----------------------------------
Route::middleware(['auth', 'is.professional'])->group(function () {

    Route::get('/professional/shop', [ProfessionalIndexController::class, 'shop'])->name('professional.shop');
    Route::get('/professional/cart', [ProfessionalCartController::class, 'index']);
    Route::get('/professional/cart/current', [ProfessionalCartController::class, 'current']);
    Route::get('/professional/cart/data', [ProfessionalCartController::class, 'data']);
    Route::post('/professional/apply-points', [ProfessionalCartController::class, 'applyPoints']);
    Route::get('/points/balance', [ProfessionalCartController::class, 'pointsBalance']);

    Route::post('/professional/remove-points', [ProfessionalCartController::class, 'removePoints']);

    Route::post('/professional/generate-link', [ProfessionalCartController::class, 'generateLink']);
    Route::post('/professional/cart/add', [ProfessionalCartController::class, 'add']);
    Route::get('/professional/cart/data/{token}', [ProfessionalCartController::class, 'show']);
    Route::post('/professional/cart/update', [ProfessionalCartController::class, 'update']);
    Route::post('/professional/cart/remove', [ProfessionalCartController::class, 'remove']);
    Route::get('/shared-cart/{token}', [ProfessionalCartController::class, 'shareCart']);
    Route::get('/shared-checkout/{token}', [ProfessionalCartController::class, 'shared_checkout'])
        ->name('share.checkout');
});
// ---------------------------------------Professional ROUTES-----------------------------------





// ---------------------------------------ADMIN ROUTES-----------------------------------
Route::get('/admin/login', [DashboardController::class, 'login'])->name('dashboard.login');
Route::get('/admin/register', [DashboardController::class, 'register'])->name('dashboard.register');

Route::post('/admin/signup', [AdminController::class, 'registerSubmit'])->name('admin.register.submit');
Route::post('/admin/login/submit',    [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
Route::get('/admin/logout',    [AdminController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth:admin')
    ->group(function () {

        /*
        |---------------------------------
        | Dashboard
        |---------------------------------
        */
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard.index');

        /*
        |---------------------------------
        | Categories / Subcategories
        |---------------------------------
        */
        Route::get('/categories/{category}/sub-categories', [ProductController::class, 'subCategories'])
            ->name('categories.subcategories');

        /*
        |---------------------------------
        | Bulk Upload (CSV / JSON)
        |---------------------------------
        */
        Route::get('/products-bulk-upload', [ProductController::class, 'bulk'])
            ->name('bulkUpload');

        Route::post('/products-bulk-upload-submit', [ProductController::class, 'importProductsCsv'])
            ->name('importProductsCsv');

        Route::get('/products-bulk-upload-json', [ProductController::class, 'jsonbulk'])
            ->name('jsonBulkUpload');

        Route::post('/products-bulk-upload-submit-json', [ProductController::class, 'importProductsJson'])
            ->name('importProductsJson');

        /*
        |---------------------------------
        | Professional Approvals
        |---------------------------------
        */
        Route::post('/professional/{id}/approve', [AdminController::class, 'approve'])
            ->name('professional.approve');

        Route::post('/professional/{id}/reject', [AdminController::class, 'reject'])
            ->name('professional.reject');

        /*
        |---------------------------------
        | Resource Routes
        |---------------------------------
        */
        Route::resource('inquiries', InquiryController::class);


        Route::resource('reviews', ReviewController::class);

        Route::post('reviews/{review}/approve', [ReviewController::class, 'approve'])
            ->name('reviews.approve');

        Route::post('reviews/{review}/reject', [ReviewController::class, 'reject'])
            ->name('reviews.reject');

        Route::resource('products', ProductController::class);

        Route::resource('newsletters', NewsletterController::class);

        Route::resource('product-categories', ProductCategoryController::class)
            ->parameters(['product-categories' => 'category']);

        Route::resource('product-subcategories', ProductSubCategoryController::class);

        Route::resource('brands', BrandController::class);

        Route::resource('licenses', ProfessionalController::class);

        Route::get('/licenses/status/{status?}', [ProfessionalController::class, 'listByStatus'])
            ->name('licenses.status');

        /*
        |---------------------------------
        | Orders
        |---------------------------------
        */
        Route::get('/orders/status/{status}', [OrderController::class, 'ordersByStatus'])
            ->name('orders.status');

        Route::resource('orders', OrderController::class);
        Route::resource('admins', AdminController::class);
    });
