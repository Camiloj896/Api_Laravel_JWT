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

Route::post('/user/register', 'UserController@register'); //OK
Route::post('/user/login', 'UserController@login'); //OK
Route::get('/user/show/{id?}', 'UserController@show'); //OK
Route::put('/user/update/{id?}', 'UserController@updated'); //OK
Route::delete('/user/delete/{id}', 'UserController@delete'); //OK
Route::get('/user/project', 'UserController@project'); //OK

/* RUTAS DEL PROYECTO
---------------------------*/
Route::post('/project/new', 'ProjectController@create');
Route::get('/project/show/{id}', 'ProjectController@show');
Route::put('/project/update/{id}', 'ProjectController@updated');
Route::delete('/project/delete/{id}', 'ProjectController@delete');

/* RUTAS INCIDENCIAS DE SCRIPT
------------------------------------*/
Route::post('/incidence/script/new', 'IncidenceScriptController@register');
Route::get('/incidence/script/{id?}', 'IncidenceScriptController@show');
