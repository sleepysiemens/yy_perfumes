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

// TODO: Доделать лендинг и убрать редирект
//Route::get('/', function () {
//    return view('land.home');
//});

Route::redirect('/', '/shop/');

Route::get('/test', function () {
    dd(\Illuminate\Support\Facades\Session::get('cart'));
});

/*
|--------------------------------------------------------------------------
| Shop Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/shop')->group(function () {
    Route::get('/', 'App\Http\Controllers\Shop\HomeController@index')->name('shop');

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

// Cart
Route::post('/cart/push/{product}/{count}', 'App\Http\Controllers\Api\CartController@push');
Route::get('/cart/get', 'App\Http\Controllers\Api\CartController@get')->name('cart.show');
Route::get('/cart/remove/{id}', 'App\Http\Controllers\Api\CartController@remove')->name('cart.remove');
Route::get('/cart/view', 'App\Http\Controllers\CartController@show')->name('cart.view');

Route::view('/shop/checkout', 'checkout')->name('checkout');

// Persons
Route::view('/philosophy', 'philosophy');
Route::view('/ravenna/my-universe', 'person.ravenna.my-universe');
Route::view('/william/my-universe', 'person.william.my-universe');
Route::view('/aron/my-universe', 'person.aron.my-universe');
Route::view('/gideon/my-universe', 'person.gideon.my-universe');
Route::view('/perfumer', 'perfumer');
Route::view('/store-locator', 'store-locator');
