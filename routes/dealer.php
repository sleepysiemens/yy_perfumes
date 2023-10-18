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
    ]);

    Route::get('invoices/load-data/{inn}', 'App\Http\Controllers\Dealer\InvoiceController@loadData');
    Route::get('invoices/load-bank-data/{bik}', 'App\Http\Controllers\Dealer\InvoiceController@loadBankData');
});
