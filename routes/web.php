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

Route::group(["middleware"=>"auth"], function(){
    Route::get('/admin',"AdminController@index")->name("admin");
    Route::resource("admin/products", "Admin\\Products")->except(["show"]);
    Route::get("admin/orders", 'Admin\Orders@index')->name("orders");
    Route::get("admin/orders/{id}", 'Admin\Orders@show')->name("orders.show");

});



// Authentication Routes...
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::get('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


Route::get('/', 'HomeController@index')->name('home');
Route::get('/showProduct/{id}', 'HomeController@product')->name('show-product');
Route::post('/addToCart/{id}', 'HomeController@addToCart')->name('addToCart');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::post('/cart', 'HomeController@updateCart');
Route::post('/updateCart', 'HomeController@updateCart');
Route::post('/order', 'HomeController@order')->name("order");

