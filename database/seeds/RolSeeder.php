<?php

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('rol')->insert([ 'tipo' => 'Admin' ]);
        DB::table('rol')->insert([ 'tipo' => 'Director' ]);
        DB::table('rol')->insert([ 'tipo' => 'Manager' ]);
        DB::table('rol')->insert([ 'tipo' => 'DP' ]);
        DB::table('rol')->insert([ 'tipo' => 'Script' ]);
        DB::table('rol')->insert([ 'tipo' => 'Campo' ]);
        DB::table('rol')->insert([ 'tipo' => 'RDM/CM' ]);    
        DB::table('rol')->insert([ 'tipo' => 'Nuevo' ]);            
        
    }
}
