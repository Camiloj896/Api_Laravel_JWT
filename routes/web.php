<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| 
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* RUTAS DEL USUARIO 
---------------------------*/

Route::post('/api/register', 'UserController@register');
Route::post('/api/login', 'UserController@login');
Route::post('/api/user/updated', 'UserController@updated');


