<?php

use App\Http\Controllers\NhomsanphamController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\SanphamDetailController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Middleware\CheckAdminLogin;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\ProductDetail;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin/login', [AdminLoginController::class, 'getlogin'])->name('admin.getlogin');
Route::post('/admin/login', [AdminLoginController::class, 'postlogin'])->name('admin.postlogin');
Route::get('/admin/logout', [AdminLoginController::class, 'getlogout'])->name('admin.getlogout');

Route::get("/register", [RegistrationController::class, 'create'])->name('register');
Route::post("/register/create", [RegistrationController::class, 'store'])->name('register.create');

Route::prefix('admin')->name('admin.')->middleware([CheckAdminLogin::class])->group(function () {
    Route::get('/', [AdminLoginController::class, 'dashboard'])->name('dashboard');

    Route::resources([
        'nhomsanpham' => NhomsanphamController::class,
        'sanpham' => SanphamController::class,
        'sanpham_detail' => SanphamDetailController::class,
        'user' => UserManagementController::class,
        'order' => OrderController::class,
    ]);

    Route::get('/file', function () {
        return view('admin.file');
    })->name('file');
});

Route::get('/', function () {
    return view('site.home');
})->name('home');

Route::get('/shop', function () {
    return view('site.shop');
})->name('shop');

Route::get('/cart', function () {
    return view('site.cart');
})->name('cart');

Route::get('/order', function () {
    return view('site.order');
})->name('order');

Route::get('/contact', function () {
    return view('site.contact');
})->name('contact');

Route::get('/shop-search', function () {
    return view('site.shop-search');
})->name('shopsearch');

Route::get('/checkout', function () {
    return view('site.check-home');
})->name('checkout');

// Route::get('/checkout', Checkout::class)->name('checkout');

Route::get('/productdetail/{id_p}', ProductDetail::class)->name('productdetail');
