<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([ 'type' => 'Ropa' ]);
        DB::table('categories')->insert([ 'type' => 'Calzado' ]);
        DB::table('categories')->insert([ 'type' => 'Alta Costura' ]);
        DB::table('categories')->insert([ 'type' => 'Ropa Deportiva' ]);
        DB::table('categories')->insert([ 'type' => 'Belleza' ]);
        DB::table('categories')->insert([ 'type' => 'Accesorios' ]);
    }
}
