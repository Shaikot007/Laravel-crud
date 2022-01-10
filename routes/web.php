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

Route::get('/', [
    'uses'  => 'App\Http\Controllers\MainController@home',
    'as'    => 'home'
]);

Route::post('/user', [
    'uses'  => 'App\Http\Controllers\MainController@user',
    'as'    => 'user'
]);

Route::get('/manage', [
    'uses'  => 'App\Http\Controllers\MainController@manage',
    'as'    => 'manage'
]);

Route::get('/edit/{id}', [
    'uses'  => 'App\Http\Controllers\MainController@edit',
    'as'    => 'edit'
]);

Route::post('/update', [
    'uses'  => 'App\Http\Controllers\MainController@update',
    'as'    => 'update'
]);

Route::get('/{id}', [
    'uses'  => 'App\Http\Controllers\MainController@delete',
    'as'    => 'delete'
]);
