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


//Route::get('/products','Api\ProductController@index');

Route::Apiresource('orders', 'Api\OrderController', [
    'as' => 'api'
]);
Route::get('/orders/{order}/items','Api\OrderController@items')->name('api.orders.items');


Route::Apiresource('batches', 'Api\BatchController', [
    'as' => 'api'
]);