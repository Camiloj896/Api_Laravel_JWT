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
Route::get('/show/{id}', 'UserController@show');
Route::put('/user/update/{id}', 'UserController@updated');
Route::delete('/user/delete/id', 'UserController@delete');
Route::get('/user/project/id', 'UserController@project');

/* RUTAS DEL PROYECTO
---------------------------*/
Route::post('/project/new', 'ProjectController@create');
Route::get('/show/id', 'ProjectController@show');
Route::put('/user/update/{id}', 'ProjectController@updated');
Route::delete('/user/delete/id', 'ProjectController@delete');

/* RUTAS INCIDENCIAS DE SCRIPT
------------------------------------*/
Route::post('/incidence/script', 'IncidenceScriptController@register');
Route::get('/incidence/script/id', 'IncidenceScriptController@show');
