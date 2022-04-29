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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('loans', 'LoanController@index');
Route::get('loans/{id}', 'LoanController@show');
Route::post('loans', 'LoanController@store');
Route::put('loans/{id}', 'LoanController@update');
Route::delete('loans/{id}', 'LoanController@destroy');

Route::get('lenders', 'LenderController@index');
Route::get('lenders/{id}', 'LenderController@show');
Route::post('lenders', 'LenderController@store');
Route::put('lenders/{id}', 'LenderController@update');
Route::delete('lenders/{id}', 'LenderController@destroy');

Route::get('orders', 'OrderController@index');
Route::get('orders/{id}', 'OrderController@show');
Route::post('orders', 'OrderController@store');
Route::put('orders/{id}', 'OrderController@update');
Route::delete('orders/{id}', 'OrderController@destroy');


