<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IncidenceScript;
use Faker\Generator as Faker;

$factory->define(IncidenceScript::class, function (Faker $faker) {
    return [
        'project_id' => rand(1,5),        
        'tincidenceScript_id' => rand(1,10),
        'cincidenceScript_id' => rand(1,29),
        'Ver_Material' => rand(1,10),
        'Ver_Script' => rand(1,10),
        'Pregunta' => 'Prueba',
        'Ronda' => 'R1',
        'Acepta_RDM' => null,
        'Acepta_LDC' => null,
        'NoCambio' => null,
    ];
});
