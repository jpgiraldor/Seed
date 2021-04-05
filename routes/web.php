<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/shop/list/{order?}', "App\Http\Controllers\ShoppingController@list")->name('shop.list');
Route::post('/shop/list/search', "App\Http\Controllers\ShoppingController@search")->name('shop.search');
Route::get('/shop/add/{id}', 'App\Http\Controllers\ShoppingController@add')->name("shop.add");
Route::get('/shop/removeAll/', 'App\Http\Controllers\ShoppingController@removeAll')->name("shop.removeAll");
Route::get('/shop/cart', "App\Http\Controllers\ShoppingController@cart")->name('shop.cart');
Route::get('/shop/buy', "App\Http\Controllers\ShoppingController@buy")->name('shop.buy');
#---------------------------admin
Route::get('/admin/seed/create', "App\Http\Controllers\Admin\SeedController@create")->name('admin.seed.create');
Route::post('/admin/seed/save', "App\Http\Controllers\Admin\SeedController@save")->name('admin.seed.save');
Route::get('/admin/seed/show/{id}', 'App\Http\Controllers\Admin\SeedController@show')->name("admin.seed.show");
Route::post('/admin/seed/delete/{id}', 'App\Http\Controllers\Admin\SeedController@delete')->name("admin.seed.delete");
Route::get('/admin/review/show/{id}', 'App\Http\Controllers\Admin\ReviewController@show')->name("admin.review.show");
Route::get('/admin/review/list', 'App\Http\Controllers\Admin\ReviewController@list')->name("admin.review.list");
#---------------------------customer
Route::get('/user/seed/show/{id}', 'App\Http\Controllers\User\SeedController@show')->name("user.seed.show");
Route::get('/user/review/create', "App\Http\Controllers\User\ReviewController@create")->name('user.review.create');
Route::post('/user/review/save', "App\Http\Controllers\User\ReviewController@save")->name('user.review.save');
