<?php

Route::group([
    'prefix' => 'dealer',
    'middleware' => 'dealer',
    'as' => 'dealer.'
], function () {
    Route::get('dashboard', 'App\Http\Controllers\Dealer\DashboardController@index')->name('dashboard');

    Route::resources([
        'orders' => 'App\Http\Controllers\Dealer\OrderController',
        'invoices' => 'App\Http\Controllers\Dealer\InvoiceController',
        'dealer-orders' => 'App\Http\Controllers\Dealer\DealerOrderController',
        'products' => 'App\Http\Controllers\Dealer\Api\ProductController',
    ]);

    Route::get('invoices/load-data/{inn}', 'App\Http\Controllers\Dealer\InvoiceController@loadData');
    Route::get('invoices/load-bank-data/{bik}', 'App\Http\Controllers\Dealer\InvoiceController@loadBankData');

    Route::prefix('my')->as('requisites.')->group(function () {
        Route::view('requisites/edit', 'dealer.my.requisites')->name('edit');
        Route::post('requisites/edit', 'App\Http\Controllers\Dealer\ProfileController@updateRequisites')->name('update');
    });
});
