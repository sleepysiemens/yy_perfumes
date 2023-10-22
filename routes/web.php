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
Route::get('/', function () {
    return view('land.home');
});

Route::group(['prefix' => '/about'], function () {
    Route::view('/privacy-policy', 'about.privacy-policy')->name('privacy-policy');
    Route::view('/terms', 'about.terms')->name('terms');
    Route::view('/contact', 'about.contact')->name('contact');
});

//Route::redirect('/', '/shop/');

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

    Route::resources([
        'news' => \App\Http\Controllers\ArticleController::class,
        'catalogue' => \App\Http\Controllers\Shop\ProductController::class,
        'order' => \App\Http\Controllers\OrderController::class,
    ]);

    Route::get('/news/{path}', 'App\Http\Controllers\ArticleController@show')->where('path', '.*');

    Route::get('/checkout/success/{hash}', function ($hash) {
        return view('checkout.success', [
            'order' => \App\Models\Order::where('hash', $hash)->firstOrFail(),
        ]);
    })->name('checkout.success');
});

Route::resources([
    'post' => \App\Http\Controllers\PostController::class,
]);

Route::group(['prefix' => 'print', 'as' => 'print.'], function () {
    Route::resources([
        'order' => \App\Http\Controllers\Print\OrderPrintController::class,
        'invoice' => \App\Http\Controllers\Print\InvoicePrintController::class,
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
Route::post('/cart/update', 'App\Http\Controllers\CartController@update')->name('cart.view');

Route::view('/shop/checkout', 'checkout')->name('checkout');
Route::view('/shop/delivery', 'delivery')->name('delivery');

// Persons
Route::view('/philosophy', 'philosophy')->name('philosophy');
Route::view('/ravenna/my-universe', 'person.ravenna.my-universe')->name('ravenna.my-universe');
Route::view('/william/my-universe', 'person.william.my-universe')->name('william.my-universe');
Route::view('/aron/my-universe', 'person.aron.my-universe')->name('aron.my-universe');
Route::view('/gideon/my-universe', 'person.gideon.my-universe')->name('gideon.my-universe');
Route::view('/perfumer', 'perfumer')->name('perfumer');
Route::view('/store-locator', 'store-locator')->name('store-locator');

Route::view('profile/become-dealer', 'profile.become-dealer')->name('become-dealer');

// PAYMENT

Route::get('/payment/error/{hash}', function ($hash) {
    return view('payment.error', [
        'order' => \App\Models\Order::where('hash', $hash)->firstOrFail(),
    ]);
})->name('payment.error');
