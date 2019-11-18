<?php

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

//Show main app screen
Route::get('/', function () {
    return view('index');
});
Route::get('/test', function () {
    return view('welcome');
});


Route::get('bank/create', 'bankController@create');

Route::post('bank/create', 'bankController@store');

Route::get('transaction/create', 'TransactionController@create');

Route::post('transaction/create', 'TransactionController@store');

Route::get('transaction/{id}/edit', 'TransactionController@edit');

Route::put('transaction/{id}/edit', 'TransactionController@update');
