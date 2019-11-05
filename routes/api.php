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
// Route::post('/user/updated', 'UserController@updated');

/* RUTAS DEL PROYECTO
---------------------------*/
Route::post('/project/new', 'ProjectController@create');
