<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', "App\Http\Controllers\HomeController@index")->name("home.index");
Route::get('/home', "App\Http\Controllers\HomeController@index")->name('home');
Route::get('/shop/index', "App\Http\Controllers\ShoppingController@index")->name('shop.index');
Route::get('/shop/add/{id}', 'App\Http\Controllers\ShoppingController@add')->name("shop.add");
Route::get('/shop/removeAll/', 'App\Http\Controllers\ShoppingController@removeAll')->name("shop.removeAll");
Route::get('/shop/cart', "App\Http\Controllers\ShoppingController@cart")->name('shop.cart');
Route::get('/shop/buy', "App\Http\Controllers\ShoppingController@buy")->name('shop.buy');

#---------------------------admin
Route::get('/admin/seed/create', "App\Http\Controllers\Admin\SeedController@create")->name('admin.seed.create');
Route::post('/admin/seed/save', "App\Http\Controllers\Admin\SeedController@save")->name('admin.seed.save');
Route::get('/admin/seed/list',  'App\Http\Controllers\Admin\SeedController@list')->name("admin.seed.list");
Route::get('/admin/seed/show/{id}', 'App\Http\Controllers\Admin\SeedController@show')->name("admin.seed.show");
Route::post('/admin/seed/delete/{id}', 'App\Http\Controllers\Admin\SeedController@delete')->name("admin.seed.delete");

#---------------------------customer
Route::get('/customer/seed/list',  'App\Http\Controllers\Customer\SeedController@list')->name("customer.seed.list");
Route::get('/customer/seed/show/{id}', 'App\Http\Controllers\Customer\SeedController@show')->name("customer.seed.show");
Route::get('/customer/review/create', "App\Http\Controllers\Customer\ReviewController@create")->name('customer.review.create');
Route::post('/customer/review/save', "App\Http\Controllers\Customer\ReviewController@save")->name('customer.review.save');
