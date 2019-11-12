<?php

use Illuminate\Database\Seeder;

class IncidenceScriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\IncidenceScript::class, 100)->create();
    }
}
