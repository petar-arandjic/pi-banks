<?php

use App\Http\Controllers\BankController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('banks', 'BankController@index');

Route::get('banks/{bank}', 'BankController@show');

Route::get('transactions', 'TransactionController@index');

Route::get('banks/{bank}/transactions', 'BankTransactionsController@index');

Route::get('test/{id}', 'TransactionController@get_sum');

Route::get('test/{id}', 'BankTransactionsController@index');
Route::get('test', 'BankController@test');

Route::post('/order/store', 'OrderController@store');


