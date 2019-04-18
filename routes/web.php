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

Route::get('/', function () {
    return view('users.dashboard');
});

Auth::routes();

Route::resource('/lotes', 'LoteController');
Route::resource('/users', 'UserController');
Route::get('/users/{user}/subscription/create', 'UserController@subscriptionCreate')->name('users.subscription.create');
Route::post('/users/{user}/subscription/store', 'UserController@subscriptionStore')->name('users.subscription.store');
