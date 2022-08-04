<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaserController;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Dashboard login

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('log_in', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('category', [CategoryController::class, 'index']);
Route::post('category-insert', [CategoryController::class, 'store']);
Route::get('category-list', [CategoryController::class, 'show']);
Route::get('category-edit/{id}', [CategoryController::class, 'edit']);
Route::post('category-update', [CategoryController::class, 'update']);
Route::post('category-update', [CategoryController::class, 'update']);
Route::get('category-delete/{id}', [CategoryController::class, 'delete']);

Route::get('product', [ProductController::class, 'index']);
Route::post('product-insert', [ProductController::class, 'store']);
Route::get('product-list', [ProductController::class, 'show']);
Route::get('product-edit/{id}', [ProductController::class, 'edit']);
Route::post('product-update', [ProductController::class, 'update']);
Route::get('product-delete/{id}', [ProductController::class, 'delete']);

Route::get('stock-add/{id}', [StockController::class, 'stock']);
Route::post('stock-insert', [StockController::class, 'store'])->name('stock-insert');

Route::get('category-view', [CategoryController::class, 'categoryView']);
Route::get('category-listdata', [CategoryController::class, 'getCategory'])->name('categorylist');
Route::get('product-view', [ProductController::class, 'productView']);
Route::get('product-listdata', [ProductController::class, 'getProduct'])->name('productlist');
});
// Route::get('/', [ProductController::class, 'all']);

//frontend login
Route::get('/purchaser-login', [PurchaserController::class, 'index'])->name('purchaser-login');
Route::post('purchaser-log-in', [PurchaserController::class, 'login'])->name('purchaser-log-in');
Route::get('purchaser-logout', [PurchaserController::class, 'logout'])->name('purchaser-logout');
Route::get('purchase', [ProductController::class, 'home'])->name('home');



Route::get('categotry-id/{id}', [PurchaserController::class, 'productview']);
Route::get('cart-add/{id}', [StockController::class, 'cart']);
Route::post('/addData', [CartController::class, 'addCart']);
Route::get('/view-cart', [CartController::class, 'viewCart'])->name('viewcart');
Route::get('delete-cart/{id}', [CartController::class, 'deleteCart']);
Route::get('clear-all', [CartController::class, 'deleteAll']);

// Paypal payment 
// Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction/{total}', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');


//Razorpay payment
Route::get('razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');