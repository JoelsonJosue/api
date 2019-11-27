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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('site')->group(function () {
    Route::get('login', function () {
        return view('admin.login');
    });
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('clientes', 'ClienteController');
});
