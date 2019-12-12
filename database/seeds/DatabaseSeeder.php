<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(TallaTableSeeder::class);
        $this->call(ProducsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
