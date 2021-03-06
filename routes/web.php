<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('shopto', 'ShoptoController');
Route::resource('products', 'ProductController');
Route::resource('order', 'OrderController');
Route::resource('checkout', 'CheckoutController');
Route::get('/shop', function () {
    return view('shop');
});

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

Route::get('/role', 'ProductController@minhRole');