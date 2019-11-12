<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'pcomision_id' => rand(1,22),
        'metodologia_id' => rand(1,27),
        'solucion_id' => rand(1,5),
        'plataforma_id' => rand(1,4),
        'estatus_id' => rand(1,6),
        'tipore_id' => rand(1,14),
        'fentrega_id' => rand(1,6),
        'Jobnumber' => $faker->text(20),
        'Jobnumber_LDCG' => 123456,
        'Pname' => 'prueba',
        'Cliente' => 'prueba',
        'KantarProject' => null,
        'Link_KP' => null,
        'Qlib_uso' => null,
        'Qlib_Link' => null,
        'Qlib_NA' => null,
        'Qlib_Metadata' => null,
        'Qlib_porqueM' => null,
        'Qlib_Web' => null,
        'Qlib_porqueW' => null,
    ];
});