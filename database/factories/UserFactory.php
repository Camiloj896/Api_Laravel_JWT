<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'rol_id' => rand(1,8),
        'manager_id' => rand(1,8),
        'Fname' => 'prueba',
        'Lname' => 'prueba',
        'Email' => $faker->unique()->safeEmail,
        'Area' => 'prueba',                
        'Pass' => '123456',
        'ForgotPass' => 'null', 
        'Estado' => 'Activo',                
        'Cargo' => 'prueba',         
    ];
});