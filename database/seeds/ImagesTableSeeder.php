<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'product_id' => 1,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 2,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 3,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 4,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 5,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 6,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 7,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 8,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 9,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);

        DB::table('images')->insert([
            'product_id' => 10,
            'type' => 'Destacada',
            'path' => 'producto-default.jpg'
        ]);
    }
}
