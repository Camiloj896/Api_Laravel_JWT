<?php

use Illuminate\Database\Seeder;

class ProducsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Hombre',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Hombre',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Hombre',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Mujer',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Mujer',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Mujer',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Mujer',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Niño',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Niño',
            'subcat'=> 'Prueba'
        ]);

        DB::table('products')->insert([
            'user_id' => rand(1,5),
            'category_id' => rand(1,6),
            'state_id' => rand(1,4),
            'brand_id' => rand(1,16),
            'talla_id' => rand(1,9),
            'type' => 'Niño',
            'subcat'=> 'Prueba'
        ]);
    }
}
