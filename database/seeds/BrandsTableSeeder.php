<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([ 'brand' => 'Otra' ]);
        DB::table('brands')->insert([ 'brand' => 'Abercrombie' ]);
        DB::table('brands')->insert([ 'brand' => 'Adidas' ]);
        DB::table('brands')->insert([ 'brand' => 'Amelia Toro' ]);
        DB::table('brands')->insert([ 'brand' => 'Apology' ]);
        DB::table('brands')->insert([ 'brand' => 'Banana Republic' ]);
        DB::table('brands')->insert([ 'brand' => 'Basement' ]);
        DB::table('brands')->insert([ 'brand' => 'Benetton' ]);
        DB::table('brands')->insert([ 'brand' => 'Carolina Herrera' ]);
        DB::table('brands')->insert([ 'brand' => 'Converse' ]);
        DB::table('brands')->insert([ 'brand' => 'Diana Holguin' ]);
        DB::table('brands')->insert([ 'brand' => 'DKNY' ]);
        DB::table('brands')->insert([ 'brand' => 'Espirit' ]);
        DB::table('brands')->insert([ 'brand' => 'Forever 21' ]);
        DB::table('brands')->insert([ 'brand' => 'Gab' ]);
        DB::table('brands')->insert([ 'brand' => 'H&M' ]);
    }
}
