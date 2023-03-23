<?php

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

Route::get('/', function () {
    return view('land.home');
});

Route::get('/test', function () {
    dd(\Illuminate\Support\Facades\Session::get('cart'));
});

/*
|--------------------------------------------------------------------------
| Shop Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/shop')->group(function () {
    Route::get('/', 'App\Http\Controllers\Shop\HomeController@index');

    Route::get('/articles/{path}', 'App\Http\Controllers\ArticleController@show')->where('path', '.*');

    Route::resources([
        'catalogue' => \App\Http\Controllers\Shop\ProductController::class,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Смена языка
Route::get('/locale/{locale}', function ($locale) {
    \Illuminate\Support\Facades\Session::put('locale', $locale);
    return redirect()->back();
})->name('locale-set');
