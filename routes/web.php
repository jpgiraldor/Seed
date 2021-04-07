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
Route::get('/shop/show/{id}', "App\Http\Controllers\ShoppingController@show")->name('shop.show');

#---------------------------admin
Route::get('/admin/seed/create', "App\Http\Controllers\Admin\SeedController@create")->name('admin.seed.create');
Route::post('/admin/seed/save', "App\Http\Controllers\Admin\SeedController@save")->name('admin.seed.save');
Route::post('/admin/seed/delete/{id}', 'App\Http\Controllers\Admin\SeedController@delete')->name("admin.seed.delete");

#---------------------------user
Route::get('/user/seed/add/{id}', 'App\Http\Controllers\User\SeedController@add')->name("user.seed.add");
Route::get('/user/seed/removeAll/', 'App\Http\Controllers\User\SeedController@removeAll')->name("user.seed.removeAll");
Route::get('/user/seed/cart', "App\Http\Controllers\User\SeedController@cart")->name('user.seed.cart');
Route::get('/user/seed/buy', "App\Http\Controllers\User\SeedController@buy")->name('user.seed.buy');

Route::get('/user/address/create', "App\Http\Controllers\User\AddressController@create")->name('user.address.create');
Route::post('/user/address/save', "App\Http\Controllers\User\AddressController@save")->name('user.address.save');

Route::get('/user/review/create', "App\Http\Controllers\User\ReviewController@create")->name('user.review.create');
Route::post('/user/review/save', "App\Http\Controllers\User\ReviewController@save")->name('user.review.save');
