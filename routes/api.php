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

/* RUTAS DEL USUARIO 
---------------------------*/

Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');
Route::post('/show/{id}', 'UserController@show');
Route::post('/user/update/{id}', 'UserController@updated');
Route::post('/user/delete/id', 'UserController@delete');
Route::post('/user/project/id', 'UserController@project');

/* RUTAS DEL PROYECTO
---------------------------*/
Route::post('/project/new', 'ProjectController@create');
Route::post('/show/id', 'ProjectController@show');
Route::post('/user/update/{id}', 'ProjectController@updated');
Route::post('/user/delete/id', 'ProjectController@delete');
