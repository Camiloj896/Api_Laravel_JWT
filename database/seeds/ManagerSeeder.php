<?php

use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manager')->insert([ 'Nombre' => 'Ninguno' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Edgar Lizarazo' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Edwin Grisales' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Fabian Quiroga' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Fernando Moraga' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Manuel Bayona' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Ricardo Ortiz' ]);
        DB::table('manager')->insert([ 'Nombre' => 'Mario Sabogal' ]);
    }
}
