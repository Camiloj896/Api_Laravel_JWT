<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'incidenciaScript_id' => rand(1,100),
        'Comentario' => 'Comentario'.rand(1,100),
        'Email' => 'Prueba',
    ];
});