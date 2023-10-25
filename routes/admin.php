<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/yy-admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\HomeController@index');

    Route::resources([
        'statuses' => \App\Http\Controllers\Admin\Order\OrderStatusController::class,
        'products' => \App\Http\Controllers\Admin\Catalogue\ProductController::class,
        'articles' => \App\Http\Controllers\Admin\ArticleController::class,
        'orders' => \App\Http\Controllers\Admin\OrderController::class,
    ]);

    Route::view('dealer/prices/', 'admin.dealer.prices')->name('dealer.prices');
    Route::post('dealer/prices/', 'App\Http\Controllers\Admin\Config\DealerSaleController@updatePrices')->name('dealer.prices');
});
