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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login','AuthController@login');
Route::post('refresh-token','AuthController@refreshToken');
Route::resource('products','ProductsController',['except'=>['create','edit']]);

Route::group(['middleware'=>'jwt.auth'], function(){
	Route::post('logout-token','AuthController@logoutToken');
	//Route::resource('products','ProductsController',['except'=>['create','edit']]);
});

