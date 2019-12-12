<?php

use Illuminate\Database\Seeder;

class TallaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('talla')->insert([ 'type' => 'XXS' ]);
        DB::table('talla')->insert([ 'type' => 'XS' ]);
        DB::table('talla')->insert([ 'type' => 'S' ]);
        DB::table('talla')->insert([ 'type' => 'M' ]);
        DB::table('talla')->insert([ 'type' => 'L' ]);
        DB::table('talla')->insert([ 'type' => 'XL' ]);
        DB::table('talla')->insert([ 'type' => 'XXL' ]);
        DB::table('talla')->insert([ 'type' => 'XXXL' ]);
        DB::table('talla')->insert([ 'type' => 'UNICA' ]);
    }
}
