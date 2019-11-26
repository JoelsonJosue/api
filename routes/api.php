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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:api')->resource('usuarios', 'UsuariosController')->except(['store']);

/*Route::resource('usuarios', 'UsuariosController');
Route::post('usuarios/login', 'UsuariosController@login');*/

/*Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('usuarios', 'UsuariosController', ['except' => 'store']);
});*/

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
