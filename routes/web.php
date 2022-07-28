<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaserController;
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
Route::group(['middleware' => ['auth']], function () {

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

});

Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('log_in', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');

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

// Route::get('/', [ProductController::class, 'all']);

//frontend login

Route::get('purchase', [ProductController::class, 'home'])->name('home');

Route::get('/purchaser-login', [PurchaserController::class, 'index'])->name('purchaser-login');
Route::post('purchaser-log-in', [PurchaserController::class, 'login'])->name('purchaser-log-in');
Route::get('purchaser-logout', [PurchaserController::class, 'logout'])->name('purchaser-logout');
Route::get('categotry-id/{id}', [PurchaserController::class, 'productview']);

Route::get('cart-add/{id}', [StockController::class, 'cart']);
Route::post('/addData', [CartController::class, 'addCart']);
Route::get('/view-cart', [CartController::class, 'viewCart']);
Route::get('delete-cart/{id}', [CartController::class, 'deleteCart']);
Route::get('clear-all', [CartController::class, 'deleteAll']);

Route::get('handle-payment', [PayPalPaymentController::class,'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PayPalPaymentController::class,'paymentCancel'])->name('cancel.payment');
Route::get('success-payment', [PayPalPaymentController::class,'paymentSuccess'])->name('success.payment');