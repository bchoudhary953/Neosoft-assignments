
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('Backend.dashboard');
});
Route::get('/profile', function () {
    return view('Backend.profile');
});
Route::get('/category', function () {
    return view('Backend.categories');
});
Route::get('/forgot_password', function () {
    return view('Frontend.auth.email');
});
Route::get('/reset_password', function () {
    return view('Frontend.auth.reset');
});

//login-registration
Route::get('/login-registration',[App\Http\Controllers\UserController::class, 'userLoginRegister']);
//add user registration
Route::match(['get','post'],'/user-register', [App\Http\Controllers\UserController::class, 'register']);
Route::match(['get','post'],'/user-logout', [App\Http\Controllers\UserController::class, 'logout']);
Route::match(['get','post'],'/user-login', [App\Http\Controllers\UserController::class, 'login']);
Route::match(['get','post'],'/account', [App\Http\Controllers\UserController::class, 'account']);
//Route::match(['get','post'],'/reset_password', [App\Http\Controllers\UserController::class, 'account']);

//Route::match(['get','post'],'/account', [App\Http\Controllers\UserController::class, 'account']);

//middleware for frontend
Route::group(['middleware'=>['frontlogin']],function (){
    Route::match(['get','post'],'/account', [App\Http\Controllers\UserController::class, 'account']);
    //checkout
    Route::match(['get','post'],'/checkout', [App\Http\Controllers\ProductController::class, 'checkout']);
    Route::match(['get','post'],'/cart', [App\Http\Controllers\ProductController::class, 'cart']);
    Route::match(['get','post'],'/order-review', [App\Http\Controllers\ProductController::class, 'orderReview'])->name('order-review');
    Route::match(['get','post'],'/place-order', [App\Http\Controllers\ProductController::class, 'placeOrder']);
    Route::match(['get','post'],'/thanks', [App\Http\Controllers\ProductController::class, 'thanks']);
    Route::match(['get','post'],'/wishlist', [App\Http\Controllers\ProductController::class, 'wishlist']);
    Route::match(['get','post'],'/myOrder', [App\Http\Controllers\ProductController::class, 'myOrder']);
    Route::match(['get','post'],'/myOrder/{id}', [App\Http\Controllers\ProductController::class, 'orderDetail']);
    Route::match(['get','post'],'/track/{id}', [App\Http\Controllers\ProductController::class, 'track']);

});
//coupon management
Route::match(['get','post'],'/admin/add-coupon', [App\Http\Controllers\CouponsController::class, 'addCoupon']);
Route::match(['get','post'],'/admin/view-coupons', [App\Http\Controllers\CouponsController::class, 'viewCoupons']);
Route::post('/admin/update-status', [App\Http\Controllers\CouponsController::class, 'updateStatus']);
Route::match(['get','post'],'/admin/delete-coupon/{id}', [App\Http\Controllers\CouponsController::class, 'deleteCoupon']);
Route::match(['get','post'],'/admin/edit-coupon/{id}', [App\Http\Controllers\CouponsController::class, 'editCoupon']);
Route::match(['get','post'],'/cart/apply-coupon', [App\Http\Controllers\ProductController::class, 'applyCoupon']);

//product management
Route::match(['get','post'],'/admin/add-product', [App\Http\Controllers\ProductController::class, 'addProduct']);
Route::match(['get','post'],'/admin/view-products', [App\Http\Controllers\ProductController::class, 'viewProducts']);
Route::match(['get','post'],'/admin/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::match(['get','post'],'/admin/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
Route::post('/update-feature-status', [App\Http\Controllers\ProductController::class, 'updateStatus']);

//product attribute
Route::match(['get','post'],'/admin/add-attribute/{id}', [App\Http\Controllers\ProductController::class, 'addAttribute']);
Route::match(['get','post'],'/admin/delete-attribute/{id}', [App\Http\Controllers\ProductController::class, 'deleteAttribute']);
Route::match(['get','post'],'/admin/edit-attribute/{id}', [App\Http\Controllers\ProductController::class, 'editAttribute']);

//address
Route::match(['get','post'],'/add-address/{id}', [App\Http\Controllers\AddressController::class, 'addAddress']);
Route::match(['get','post'],'/delete-address/{id}', [App\Http\Controllers\AddressController::class, 'deleteAddress']);
Route::match(['get','post'],'/edit-address/{id}', [App\Http\Controllers\AddressController::class, 'editAddress']);

//category management
Route::match(['get','post'],'/admin/view-categories', [App\Http\Controllers\CategoryController::class, 'viewCategories']);
Route::match(['get','post'],'/admin/add-category', [App\Http\Controllers\CategoryController::class, 'addCategory']);
Route::match(['get','post'],'/admin/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);
Route::match(['get','post'],'/admin/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);

//banner management
Route::match(['get','post'],'/banners', [App\Http\Controllers\BannerController::class, 'banners']);
Route::match(['get','post'],'/add-banners', [App\Http\Controllers\BannerController::class, 'addBanners']);
Route::match(['get','post'],'/delete-banners/{id}', [App\Http\Controllers\BannerController::class, 'deleteBanners']);
Route::match(['get','post'],'/edit-banners/{id}', [App\Http\Controllers\BannerController::class, 'editBanners']);
Route::post('/update-status', [App\Http\Controllers\BannerController::class, 'updateStatus']);

Auth::routes();
//user management
Route::get('/user_management',[App\Http\Controllers\Admin\DashboardController::class, 'registered'])->name('user_management');
Route::get('/role-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit']);
Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate']);
Route::delete('/role-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete']);
Route::post('/update-user-status', [App\Http\Controllers\Admin\DashboardController::class, 'updateStatus']);

Route::get('/customer', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/product', [App\Http\Controllers\UserController::class, 'product'])->name('product');
Route::get('/product-detail/{id}', [App\Http\Controllers\UserController::class, 'productDetail'])->name('productDetail');
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::match(['get','post'],'/admin', [App\Http\Controllers\AdminController::class, 'login']);
Route::match(['get','post'],'/', [App\Http\Controllers\HomeController::class, 'index']);

//facebook socialite
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

//Google socialite
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class,'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class,'handleGoogleCallback']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');

//cart functionality
//Route::match(['get','post'],'/cart', [App\Http\Controllers\ProductController::class, 'cart']);
Route::match(['get','post'],'/add-cart/{product}', [App\Http\Controllers\ProductController::class, 'addCart']);
Route::match(['get','post'],'/remove/{id}', [App\Http\Controllers\ProductController::class, 'deleteCart']);
Route::match(['get','post'],'/quantity-increase/{id}', [App\Http\Controllers\ProductController::class, 'quantityIncrease']);
Route::match(['get','post'],'/quantity-decrease/{id}', [App\Http\Controllers\ProductController::class, 'quantityDecrease']);

//paypal
Route::get('/payment',  [App\Http\Controllers\PayPalController::class, 'payment'])->name('payment');
Route::get('cancel',  [App\Http\Controllers\PayPalController::class, 'cancel'])->name('payment.cancel');
Route::get('payment/success',  [App\Http\Controllers\PayPalController::class, 'success'])->name('payment.success');
//Route::resource('payment', App\Http\Controllers\PaymentController::class);
//wishlist
Route::match(['get','post'],'/add-wishlist/{product}', [App\Http\Controllers\ProductController::class, 'addWishlist']);
Route::match(['get','post'],'/delete/{id}', [App\Http\Controllers\ProductController::class, 'deleteWishlist']);
