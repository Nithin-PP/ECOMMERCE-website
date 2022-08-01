<?php

use App\Http\Controllers\api\ApiAuthController;
use App\Http\Controllers\api\ApiCartController;
use App\Http\Controllers\api\ApiCategoryController;
use App\Http\Controllers\api\ApiPaypalController;
use App\Http\Controllers\api\ApiProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/apiLogin', [ApiAuthController::class, 'login']);
Route::post('/userDetail', [ApiAuthController::class, 'detail']);
Route::get('/showData', [ApiCategoryController::class, 'show']);
Route::get('/showproductdata/{category_id}', [ApiProductController::class, 'show']);
Route::get('/addtocart', [ApiCartController::class, 'add']);
Route::get('/paypal', [ApiPaypalController::class, 'processTransaction']);