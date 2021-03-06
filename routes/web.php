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
Route::get('/', 'HomeController@home')->name('home');
// Route::get('/form', 'HomeController@form')->name('form');
// Route::get('/mail', 'OrderController@mail')->name('mail');
// Route::post('/passwordupdate', 'Users\UserController@passwordUpdate')->name('users.password.update');

// Auth::routes();

// Route::resource('/batches', 'BatchController');
// Route::resource('/users', 'Users\UserController');
// Route::resource('/orders', 'OrderController');
// Route::get('/orders/{order}/status', 'OrderController@status')->name('orders.status');
// Route::get('/orders/{order}/mailpay', 'OrderController@payMail')->name('orders.paymail');
// Route::get('/orders/{order}/payflow', 'OrderController@payFlow')->name('orders.payflow');
// Route::post('/orders/{order}/paid', 'OrderController@paid')->name('orders.paid');
// Route::post('/flow/return', 'OrderController@returnFlow')->name('orders.returnflow');
// Route::post('/flow/confirm', 'OrderController@confirmFlow')->name('orders.confirmflow');


// //Route::get('/subscriptions', 'Users\SubscriptionController@all')->name('subscriptions.all');
// //Route::get('/orders', 'Users\SubscriptionController@all')->name('orders.all');
// Route::get('/payments', 'Users\PaymentController@all')->name('payments.all');
// Route::middleware(['auth'])->prefix('users')->group(function ()
// {
//   Route::resource('/{user}/subscriptions', 'Users\SubscriptionController');
//   //Route::resource('/{user}/orders', 'Users\OrderController');
//   Route::resource('/{user}/payments', 'Users\PaymentController');
// });

// Route::post('/flow/confirm', function ($name = null) {
//     return 'confirm';
// });


// Route::get('/users/{user}/subscription/create', 'UserController@subscriptionCreate')->name('users.subscription.create');
// Route::post('/users/{user}/subscription/store', 'UserController@subscriptionStore')->name('users.subscription.store');
