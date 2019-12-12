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
Route::post('/user/register', 'UserController@register');
Route::post('/user/login', 'UserController@login');
Route::get('/user/show', 'UserController@show');
Route::post('/user/update', 'UserController@updated');
Route::post('/user/delete/id', 'UserController@delete');

/* RUTAS PRODUCTOS
---------------------------*/
Route::get('/product/show', 'ProductsController@show');
Route::post('/product/new', 'ProductsController@new');
Route::post('/product/update/id', 'ProductsController@update');
Route::post('/product/delete/id', 'ProductsController@delete');

/* RUTAS INFORMACION
---------------------------*/
Route::get('/category', 'CategoryController@show');
Route::get('/brand', 'BrandsController@show');
Route::get('/state', 'StateController@show');
Route::get('/talla', 'TallaController@show');


// RUTAS
// FUNCION CONTROLLADOR USUARIOS -> MOSTRAR PROYECTOS ASOCIADOS AL USUARIOS

// Model Proyecto -> relacion con USUARIOS, relación images
// Model Images -> relación Proyecto
// CONTROLLADOR PROYECTOS

