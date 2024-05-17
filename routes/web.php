<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ContactinfoController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomebannerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LetstalkController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShoworderController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VaritionsController;
use App\Models\Homebanner;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('welcome');
// });

// FrontendController part
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/accounts', [FrontendController::class, 'accounts'])->name('accounts');
Route::post('/cusregi', [FrontendController::class, 'cusregi'])->name('cusregi');
Route::get('/productdetails/{id}', [FrontendController::class, 'productdetails'])->name('productdetails');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
// FrontendController part



// backend part
// =======================
// ===Home backend part===
// =======================
// HomebannerController part
Route::resource('/homebanner', HomebannerController::class);
// HomebannerController part
// =========================
// Contact info backend part
// =========================
// ContactinfoController part
Route::resource('/contactinfo', ContactinfoController::class);
Route::get('/mail_view', [ContactinfoController::class, 'mail_view'])->name('mail_view');
Route::post('/letstalk', [ContactinfoController::class, 'letstalk'])->name('letstalk');
// ContactinfoController part



// =======================
// ==about backend part==
// =======================
// AboutController part
Route::resource('/aboutpart', AboutController::class);
// AboutController part
// PolicyController part
Route::resource('/policy', PolicyController::class);
// PolicyController part
// ServiceController part
Route::resource('/service', ServiceController::class);
// ServiceController part
// TeamController part
Route::resource('/team', TeamController::class);
// TeamController part




// profile part
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profilechg', [ProfileController::class, 'profilechg'])->name('profilechg');
Route::post('/coverchg', [ProfileController::class, 'coverchg'])->name('coverchg');
Route::post('/passwordcng', [ProfileController::class, 'passwordcng'])->name('passwordcng');
// profile part
// CategoryController part
Route::resource('/category', CategoryController::class);
// CategoryController part
// ProductController part
Route::resource('/product', ProductController::class);
Route::get('/product/inventory/{id}', [InventoryController::class, 'inventory'])->name('inventory');
Route::post('/inventory/store/{id}', [InventoryController::class, 'inventorystore'])->name('inventorystore');
// ProductController part
// CartController part
Route::post('/cart/{id}', [CartController::class, 'cart'])->name('cart');
Route::get('/cartview', [CartController::class, 'cartview'])->name('cartview');
Route::get('/cartdelete/{id}', [CartController::class, 'cartdelete'])->name('cartdelete');
Route::post('/cartupdate', [CartController::class, 'cartupdate'])->name('cartupdate');
// CartController part
// =======================
// =====varition part=====
// =======================
// size part
Route::resource('/varition', VaritionsController::class);
// color part
Route::resource('/color', ColorController::class);
// coupon part
Route::get('/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::post('/couponinsert', [CouponController::class, 'couponinsert'])->name('couponinsert');
// CheackOut Part
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout_store', [CheckoutController::class, 'checkout_store'])->name('checkout_store');
Route::get('/order_success', [CheckoutController::class, 'order_success'])->name('order_success');
// show order part
Route::get('/showorder', [ShoworderController::class, 'showorder'])->name('showorder');
Route::post('/orderstutas/{id}', [ShoworderController::class, 'orderstutas'])->name('orderstutas');
// =======================
// =====varition part=====
// =======================
// =======================
// =====SSLCOMMERZ Start==========
// =======================
Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
// =======================
// =====SSLCOMMERZ Start==========
// =======================

// Role and Permission part
Route::resource('/permission', PermissionController::class);
// Role and Permission part

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// backend part
