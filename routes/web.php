<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StripePaymentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\Website\WebsiteController;

use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\CommentReplyController;
use App\Http\Controllers\Website\OrderController;
use App\Http\Controllers\Website\ShowCancelController;
use App\Models\Product;
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

// Webite
Route::get('/', [WebsiteController::class, 'home']);

// Product Details Route
Route::get('/product/details/{id}', [WebsiteController::class, 'product_details'])->name('product.details');

// Cart Routes 
Route::post('/product/add-cart/{id}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('/show/cart', [CartController::class, 'showCart'])->name('show.cart');
Route::get('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('remove.cart');

// header product
Route::get('/all-products', [CartController::class, 'product'])->name('product');

// Order and Cancel Route
Route::get('/show-order',[ShowCancelController::class, 'showOrder'])->name('show.order');
Route::get('/cancel-order/{id}', [ShowCancelController::class, 'cancelOrder'])->name('cancel.order');

// Order Routes
Route::get('/cash/order', [OrderController::class, 'cashOrder'])->name('cash.order');

// Payment Route
Route::get('/stripe/{totalprice}', [StripePaymentController::class, 'stripe'])->name('stripe');
Route::post('/stripe/{totalprice}', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

// Sent email Routes
Route::get('/sent/email/{id}', [EmailController::class, 'sentEmail'])->name('sent.email');
Route::post('send-user-email/{id}', [EmailController::class, 'sentUserEmail'])->name('sendUser.email');

// comment and reply route
Route::post('/add-comment', [CommentReplyController::class, 'addComment'])->name('add.comment');
Route::post('/add-reply', [CommentReplyController::class, 'addReply'])->name('add.reply');

Route::get('/product-search', [WebsiteController::class, 'productSearch'])->name('product.search');

// header product/ and product search
Route::get('/search-product', [WebsiteController::class, 'searchProduct'])->name('search_product');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');})->name('dashboard');
});


// Admin Panel
Route::get('/redirect',[HomeController::class, 'redirect'])->middleware('auth','verified');

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

// Order list table
Route::get('/order/list', [HomeController::class, 'order'])->name('order');
Route::get('/delivered/{id}', [HomeController::class, 'devivered'])->name('delivered');

// product print pdf
Route::get('/print/pdf/{id}',[PdfController::class, 'printPdf'])->name('print.pdf');

// admin product search
Route::get('/search', [HomeController::class, 'searchData'])->name('search.product');




?>