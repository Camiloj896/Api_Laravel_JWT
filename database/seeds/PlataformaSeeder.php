<?php

use Illuminate\Database\Seeder;

class PlataformaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plataforma')->insert([ 'Tipo' => 'Dimensions' ]);
        DB::table('plataforma')->insert([ 'Tipo' => 'Nfield' ]);
        DB::table('plataforma')->insert([ 'Tipo' => 'SAT' ]);
        DB::table('plataforma')->insert([ 'Tipo' => 'KAP' ]);
    }
}
