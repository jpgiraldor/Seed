<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::get('/seed', 'App\Http\Controllers\Api\SeedApi@index')->name("api.seed.index");
Route::get('/seed/price', 'App\Http\Controllers\Api\SeedApi@price')->name("api.seed.price");
Route::get('/seed/water', 'App\Http\Controllers\Api\SeedApi@water')->name("api.seed.water");
Route::get('/seed/germination', 'App\Http\Controllers\Api\SeedApi@germination')->name("api.seed.germination");
Route::get('/seed/popular', 'App\Http\Controllers\Api\SeedApi@popular')->name("api.seed.popular");
Route::get('/seed/score', 'App\Http\Controllers\Api\SeedApi@score')->name("api.seed.score");


Route::get('/seed/{id}', 'App\Http\Controllers\Api\SeedApi@show')->name("api.seed.show");#este debe de ir de ultimo para que no coque con las rutas
