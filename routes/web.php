<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('frontend.homepage');
});
Route::get('/contactus', function () {
    return view('frontend.contactUs');
});
Route::get('/aboutus', function () {
    return view('frontend.aboutUs');
});
Route::get('/empower', function () {
    return view('frontend.empower');
});
Route::get('/shop', [ShopController::class, 'showShop'])->name('shop');
Route::get('/csr', function () {
    return view('frontend.csr');
});
Route::get('/cart', function () {
    return view('frontend.cart');
});
Route::get('/categories', function () {
    return view('frontend.categories');
});
Route::get('/lead', function () {
    return view('frontend.lead');
});
Route::get('/product/details/{id}', [ShopController::class, 'details'])->name('product.details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::middleware('admin')->group(function () {  
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');
        Route::get('/order/orderlist', [OrdersController::class, 'index'])->name('order.index');
        Route::get('/product/createproduct', [ProductController::class, 'createproduct'])->name('product.add');
        Route::post('/product/storeproduct', [ProductController::class, 'storeproduct'])->name('product.store');
        Route::get('/product/viewproduct', [ProductController::class, 'viewproduct'])->name('product.view');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

        Route::get('/category/createcategory', [CategoryController::class, 'createcategory'])->name('category.add');
        Route::post('/category/storecategory', [CategoryController::class, 'storecategory'])->name('category.store');
        Route::get('/category/viewcategory', [CategoryController::class, 'viewcategory'])->name('category.view');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
     });
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile')->middleware('auth');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update')->middleware('auth');

    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->middleware('auth');
    Route::get('/cart', [CartController::class, 'showCart'])->middleware('auth');

    Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    


});
