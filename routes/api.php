<?php

use Illuminate\Http\Request;

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

Route::prefix('currencies')->group(function () {

Route::get('/', 'CurrenciesController@getActiveCurrencies');
    Route::get('{id}', 'CurrenciesController@getCurrencyById')->where('id', '[0-9]+');
});

Route::resource('admin/currencies', 'AdminCurrenciesController', ['except' => ['create', 'edit']]);