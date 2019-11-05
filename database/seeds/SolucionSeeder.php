<?php

use Illuminate\Database\Seeder;

class SolucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solucion')->insert([ 'Tipo' => 'Adhoc' ]);
        DB::table('solucion')->insert([ 'Tipo' => 'Brand Performance' ]);
        DB::table('solucion')->insert([ 'Tipo' => 'Creative Development' ]);
        DB::table('solucion')->insert([ 'Tipo' => 'TNS Growth Tools' ]);
        DB::table('solucion')->insert([ 'Tipo' => 'HBG' ]);
    }
}
