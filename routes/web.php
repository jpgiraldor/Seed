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

Route::get('/seed/create', "App\Http\Controllers\SeedController@create")->name('seed.create');
Route::post('/seed/save', "App\Http\Controllers\SeedController@save")->name('seed.save');
Route::get('/seed/list', 'App\Http\Controllers\SeedController@list')->name("seed.list");
Route::get('/seed/show/{id}', 'App\Http\Controllers\SeedController@show')->name("seed.show");
Route::post('/seed/delete/{id}', 'App\Http\Controllers\SeedController@delete')->name("seed.delete");