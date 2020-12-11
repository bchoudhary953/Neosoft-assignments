
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

//confirm account
Route::get('/confirm/{code}',[App\Http\Controllers\UserController::class, 'confirmAccount']);

//Route::match(['get','post'],'/account', [App\Http\Controllers\UserController::class, 'account']);
//Route::match(['get','post'],'/cart', [App\Http\Controllers\ProductController::class, 'cart'])->middleware('p');

//middleware for frontend
Route::group(['middleware'=>['frontlogin']],function (){
    Route::match(['get','post'],'/account', [App\Http\Controllers\UserController::class, 'account']);
    //checkout
    Route::match(['get','post'],'/checkout', [App\Http\Controllers\ProductController::class, 'checkout'],);
    Route::match(['get','post'],'/cart', [App\Http\Controllers\ProductController::class, 'cart']);
    Route::match(['get','post'],'/order-review', [App\Http\Controllers\ProductController::class, 'orderReview'])->name('order-review');
    Route::match(['get','post'],'/place-order', [App\Http\Controllers\ProductController::class, 'placeOrder']);
    Route::match(['get','post'],'/thanks', [App\Http\Controllers\ProductController::class, 'thanks']);
    Route::match(['get','post'],'/wishlist', [App\Http\Controllers\ProductController::class, 'wishlist']);
    Route::match(['get','post'],'/myOrder', [App\Http\Controllers\ProductController::class, 'myOrder']);
    Route::match(['get','post'],'/myOrder/{id}', [App\Http\Controllers\ProductController::class, 'orderDetail']);
    Route::match(['get','post'],'/myAccount', [App\Http\Controllers\UserController::class, 'myAccount']);
    Route::match(['get','post'],'/changeDetail/{id}', [App\Http\Controllers\UserController::class, 'changeDetail']);
    Route::match(['get','post'],'/change-password', [App\Http\Controllers\UserController::class, 'changePassword']);
    //coupon
Route::match(['get','post'],'/cart/apply-coupon', [App\Http\Controllers\ProductController::class, 'applyCoupon']);


//address
Route::match(['get','post'],'/add-address', [App\Http\Controllers\AddressController::class, 'addAddress']);
Route::match(['get','post'],'/delete-address/{id}', [App\Http\Controllers\AddressController::class, 'deleteAddress']);
Route::match(['get','post'],'/edit-address/{id}', [App\Http\Controllers\AddressController::class, 'editAddress']);


});
Route::group(['middleware'=>['adminlogin']],function (){
   /* Route::get('/dashboard', function () {
        return view('Backend.dashboard');
    });*/
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::get('/charts', [App\Http\Controllers\ChartController::class, 'index'])->name('charts');

    Route::get('/profile', function () {
        return view('Backend.profile');
    });
    Route::get('/category', function () {
        return view('Backend.categories');
    });
    //product management
    Route::match(['get','post'],'/admin/add-product', [App\Http\Controllers\ProductController::class, 'index']);
    Route::match(['get','post'],'/admin/save-product', [App\Http\Controllers\ProductController::class, 'store']);
    Route::match(['get','post'],'/admin/view-products', [App\Http\Controllers\ProductController::class, 'viewProducts']);
    Route::match(['get','post'],'/admin/delete-product/{id}', [App\Http\Controllers\ProductController::class, 'deleteProduct']);
    Route::match(['get','post'],'/admin/edit-product/{id}', [App\Http\Controllers\ProductController::class, 'editProduct']);
    Route::post('/update-Product-Status', [App\Http\Controllers\ProductController::class, 'updateStatus']);

//product attribute
    Route::match(['get','post'],'/admin/add-attribute/{id}', [App\Http\Controllers\ProductController::class, 'addAttribute']);
    Route::match(['get','post'],'/admin/delete-attribute/{id}', [App\Http\Controllers\ProductController::class, 'deleteAttribute']);
    Route::match(['get','post'],'/admin/edit-attribute/{id}', [App\Http\Controllers\ProductController::class, 'editAttribute']);
//order management
    Route::match(['get','post'],'/admin/update-order-status/{id}', [App\Http\Controllers\OrderController::class, 'updateOrderStatus']);
    Route::match(['get','post'],'/admin/view-orders', [App\Http\Controllers\OrderController::class, 'viewOrders']);
    Route::match(['get','post'],'/admin/pending-orders', [App\Http\Controllers\OrderController::class, 'pendingOrders']);
    Route::match(['get','post'],'/admin/delivered-orders', [App\Http\Controllers\OrderController::class, 'deliveredOrders']);
    Route::match(['get','post'],'/admin/completed-orders', [App\Http\Controllers\OrderController::class, 'completedOrders']);
//sales report
    Route::match(['get','post'],'/admin/search-report', [App\Http\Controllers\Admin\ReportController::class, 'index']);
    Route::match(['get','post'],'/check-report', [App\Http\Controllers\Admin\ReportController::class, 'checkReport']);
    //registered user report
    Route::match(['get','post'],'/admin/search-registeredUser-report', [App\Http\Controllers\Admin\ReportController::class, 'searchRegisteredUser']);
    Route::match(['get','post'],'/check-registeredUser-report', [App\Http\Controllers\Admin\ReportController::class, 'checkRegisteredUserReport']);
    //Route::match(['get','post'],'/check-registeredUser-report', [App\Exports\UserExport::class, 'view']);
    //coupon used report
    Route::match(['get','post'],'/admin/search-usedCoupon-report', [App\Http\Controllers\Admin\ReportController::class, 'searchUsedCoupon']);
    Route::match(['get','post'],'/check-usedCoupon-report', [App\Http\Controllers\Admin\ReportController::class, 'checkUsedCoupon']);

    //category management
    Route::match(['get','post'],'/admin/view-categories', [App\Http\Controllers\CategoryController::class, 'viewCategories']);
    Route::match(['get','post'],'/admin/add-category', [App\Http\Controllers\CategoryController::class, 'index']);
    Route::match(['get','post'],'/admin/save-category', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::match(['get','post'],'/admin/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteCategory']);
    Route::match(['get','post'],'/admin/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'editCategory']);
    Route::post('/update-category-status', [App\Http\Controllers\CategoryController::class, 'updateStatus']);

    //coupon management
    Route::match(['get','post'],'/admin/add-coupon', [App\Http\Controllers\CouponsController::class, 'index']);
    Route::match(['get','post'],'/admin/save-coupon', [App\Http\Controllers\CouponsController::class, 'store']);
    Route::match(['get','post'],'/admin/view-coupons', [App\Http\Controllers\CouponsController::class, 'viewCoupons']);
    Route::post('/update-Coupon-Status', [App\Http\Controllers\CouponsController::class, 'updateStatus']);
    Route::match(['get','post'],'/admin/delete-coupon/{id}', [App\Http\Controllers\CouponsController::class, 'deleteCoupon']);
    Route::match(['get','post'],'/admin/edit-coupon/{id}', [App\Http\Controllers\CouponsController::class, 'editCoupon']);

    //cms management
    Route::match(['get','post'],'/admin/view-cms-pages', [App\Http\Controllers\CmsController::class, 'viewCmsPages']);
    Route::match(['get','post'],'/admin/add-cms-page', [App\Http\Controllers\CmsController::class, 'index']);
    Route::match(['get','post'],'/admin/save-cms-page', [App\Http\Controllers\CmsController::class, 'store']);
    Route::match(['get','post'],'/admin/delete-cms-page/{id}', [App\Http\Controllers\CmsController::class, 'deleteCmsPage']);
    Route::match(['get','post'],'/admin/edit-cms-page/{id}', [App\Http\Controllers\CmsController::class, 'editCmsPage']);
    Route::post('/update-cms-status', [App\Http\Controllers\CmsController::class, 'updateStatus']);

    //contact us message
    Route::match(['get','post'],'/admin/contact-us', [App\Http\Controllers\AdminController::class, 'contactUs']);
    Route::match(['get','post'],'/query-response/{id}', [App\Http\Controllers\AdminController::class, 'queryResponse']);

    //banner management
    Route::match(['get','post'],'/banners', [App\Http\Controllers\BannerController::class, 'banners']);
    Route::match(['get','post'],'/add-banners', [App\Http\Controllers\BannerController::class, 'index']);
    Route::match(['get','post'],'/save-banners',[App\Http\Controllers\BannerController::class, 'store']);
    Route::match(['get','post'],'/delete-banners/{id}', [App\Http\Controllers\BannerController::class, 'deleteBanners']);
    Route::match(['get','post'],'/edit-banners/{id}', [App\Http\Controllers\BannerController::class, 'editBanners']);
    Route::post('/update-status', [App\Http\Controllers\BannerController::class, 'updateStatus']);

    //config management
      Route::match(['get','post'],'/config_management', [App\Http\Controllers\ConfigController::class, 'configs']);
    Route::match(['get','post'],'/add-config', [App\Http\Controllers\ConfigController::class, 'index']);
    Route::match(['get','post'],'/save-config', [App\Http\Controllers\ConfigController::class, 'store']);
    Route::match(['get','post'],'/delete-config/{id}', [App\Http\Controllers\ConfigController::class, 'deleteConfigs']);
    Route::match(['get','post'],'/edit-config/{id}', [App\Http\Controllers\ConfigController::class, 'editConfigs']);

   // Auth::routes();
//user management
    Route::get('/user_management',[App\Http\Controllers\Admin\DashboardController::class, 'registered'])->name('user_management');
    Route::get('/role-edit/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registeredit']);
    Route::match(['get','post'],'/add-user', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::match(['get','post'],'/save-user', [App\Http\Controllers\Admin\DashboardController::class, 'store']);
    Route::put('/role-register-update/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerupdate']);
    Route::delete('/role-delete/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'registerdelete']);
    Route::post('/update-user-status', [App\Http\Controllers\Admin\DashboardController::class, 'updateStatus']);

});



Route::get('/customer', [App\Http\Controllers\UserController::class, 'index'])->name('user');
//Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::match(['get','post'],'/admin', [App\Http\Controllers\AdminController::class, 'login']);
Route::match(['get','post'],'/', [App\Http\Controllers\HomeController::class, 'index']);
Route::match(['get','post'],'/logout', [App\Http\Controllers\AdminController::class, 'logout']);

//facebook socialite
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

//Google socialite
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class,'redirectToGoogle']);
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class,'handleGoogleCallback']);

Auth::routes();

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
//footer
Route::match(['get','post'],'/contact-us', [App\Http\Controllers\UserController::class, 'contactUs']);
//newsletter
Route::match(['get','post'],'/newsletter', [App\Http\Controllers\NewsletterController::class, 'store']);

Route::match(['get','post'],'/track', [App\Http\Controllers\ProductController::class, 'track']);
Route::match(['get','post'],'/track-result', [App\Http\Controllers\ProductController::class, 'trackResult']);

//header
Route::get('/product', [App\Http\Controllers\UserController::class, 'product'])->name('product');
Route::get('/product-detail/{id}', [App\Http\Controllers\UserController::class, 'productDetail'])->name('productDetail');
Route::get('/get-product', [App\Http\Controllers\UserController::class, 'getProductPrice'])->name('productDetail');
Route::get('/products/{url}', [App\Http\Controllers\ProductController::class, 'products'])->name('products');
//cms pages
Route::get('/page/{url}', [App\Http\Controllers\CmsController::class, 'cmsPage']);

Route::get('/404', function () {
    return view('Frontend.404');
});
Route::get('/sales_chart', [ConsoleTVs\Charts\ChartsController::class]);


Route::get('/chart', [App\Http\Controllers\ChartController::class, 'chart']);

//Excel Report
Route::get('/users/export', [App\Http\Controllers\UsersExportController::class, 'export']);
Route::get('/sales/export', [App\Http\Controllers\UsersExportController::class, 'salesExport']);
Route::get('/user/export', [App\Http\Controllers\UsersExportController::class, 'index'])->name('export_excel');
Route::get('/export_excel/excel', [App\Http\Controllers\UsersExportController::class, 'excel'])->name('export_excel.excel');
Route::get('/export', [App\Http\Controllers\UsersExportController::class, 'exxcel']);

//export
Route::match(['get','post'],'/exportOrder', [App\Http\Controllers\OrderController::class, 'export']);
Route::match(['get','post'],'/exportMOrder', [App\Http\Controllers\OrderController::class, 'export_byMonth']);
Route::match(['get','post'],'/exportYOrder', [App\Http\Controllers\OrderController::class, 'export_byYear']);
Route::post('/exportUser',[App\Http\Controllers\Admin\DashboardController::class, 'export']);
Route::post('/exportMUser',[App\Http\Controllers\Admin\DashboardController::class, 'export_byMonth']);
Route::post('/exportYUser',[App\Http\Controllers\Admin\DashboardController::class, 'export_byYear']);
Route::post('/exportCoupon',[App\Http\Controllers\CouponsController::class, 'export']);
Route::post('/exportMCoupon',[App\Http\Controllers\CouponsController::class, 'export_byMonth']);
Route::post('/exportYCoupon',[App\Http\Controllers\CouponsController::class, 'export_byYear']);




