<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resources([
    'products' => \App\Http\Controllers\Api\Product\ProductController::class,
    'shops' => \App\Http\Controllers\ShopController::class,
]);

Route::get('/products/{product}/{lang}', 'App\Http\Controllers\Api\Product\ProductController@show');

Route::post('/cart/push/{product}/{count}', 'App\Http\Controllers\Api\CartController@push');
Route::get('/cart/get', 'App\Http\Controllers\Api\CartController@get');

Route::post('/payment/status', 'App\Http\Controllers\Api\Merchant\MerchantCallbackController@statusUpdate');

Route::prefix('sdek')->group(function () {
    Route::get('cities', 'App\Http\Controllers\Api\Deliveries\SdekController@getCities');
    Route::get('villages/{id}', 'App\Http\Controllers\Api\Deliveries\SdekController@getVillages');
    Route::get('points/{id}', 'App\Http\Controllers\Api\Deliveries\SdekController@getPoints');
});
