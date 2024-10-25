<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');





Route::get('admin/register', [RegisterController::class, 'create'])->name('admin.register');
Route::post('admin/store', [RegisterController::class, 'register'])->name('admin.store');


Route::get('login', function () {
    return view('admin.login');
})->name('login');
Route::post('admin/login', [LoginController::class, 'login'])->name('loginsuccess');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('products-detail', function () {
    return view('products-detail');
})->name('products-detail');



Route::get('contact', function () {
    return view('contact');
})->name('contact');



Route::get('Testimonial', function () {
    return view('Testimonial');
})->name('Testimonial');





Route::middleware('auth')->group(function () {
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('update/{id}',[UserController::class,'Update'])->name('update');
    Route::get('delete/{id}',[UserController::class,'delete'])->name('delete');



    Route::get('user/list', [UserController::class, 'index'])->name('users.list');
    Route::get('/cart', [ProductsController::class, 'cart'])->name('cart');
    Route::post('add/cart', [ProductsController::class, 'addCart'])->name('add.cart');
    Route::post('update', [ProductsController::class, 'updateCart'])->name('update.cart');
    Route::post('remove', [ProductsController::class, 'removeCart'])->name('remove.cart');
    Route::post('totalpayout', [ProductsController::class, 'totalpayout'])->name('total.payout');



    Route::get('checkout', [ProductsController::class, 'checkout'])->name('checkout');


    Route::prefix('product')->group(function () {
        Route::get('list', [ProductsController::class, 'index'])->name('Products.list');
        Route::get('create', [ProductsController::class, 'create'])->name('Products.create');
        Route::post('store', [ProductsController::class, 'store'])->name('product.store');
    });
});
