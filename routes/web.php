<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Website\CartController;
use App\Models\Product;

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

// Webite
Route::get('/', [WebsiteController::class, 'home']);

Route::get('/product/details/{id}', [WebsiteController::class, 'product_details'])->name('product.details');

// Cart Routes
Route::post('/product/add-cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('/show/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('remove.cart');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Admin Panel
Route::get('/redirect',[HomeController::class, 'redirect']);

// Category Routes
Route::get('/view_category', [CategoryController::class, 'view_category'])->name('view.category');
Route::post('/add/catetory', [CategoryController::class, 'add_category'])->name('add.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete_category'])->name('delete.category');

// Product Routes
Route::get('/view_product', [ProductController::class, 'view_product'])->name('view.product');
Route::post('/add/product', [ProductController::class, 'add_product'])->name('add.product');
Route::get('/show_product', [ProductController::class, 'show_product'])->name('show.product');
Route::get('/product/edit/{id}', [ProductController::class, 'edit_product'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update_product'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'delete_product'])->name('product.delete');


