<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;

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


