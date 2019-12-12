<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->insert([ 'type' => 'Nuevo con etiqueta' ]);
        DB::table('state')->insert([ 'type' => 'Nuevo sin etiqueta' ]);
        DB::table('state')->insert([ 'type' => 'Como nuevo' ]);
        DB::table('state')->insert([ 'type' => 'Usado' ]);
    }
}
