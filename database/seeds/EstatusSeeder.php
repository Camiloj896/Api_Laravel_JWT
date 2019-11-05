<?php

use Illuminate\Database\Seeder;

class EstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estatus')->insert([ 'Tipo_en' => 'New', 'Tipo_es' => 'Nuevo' ]);
        DB::table('estatus')->insert([ 'Tipo_en' => 'Scripting', 'Tipo_es' => 'Scripting' ]);
        DB::table('estatus')->insert([ 'Tipo_en' => 'Field', 'Tipo_es' => 'Campo' ]);
        DB::table('estatus')->insert([ 'Tipo_en' => 'DP', 'Tipo_es' => 'DP' ]);
        DB::table('estatus')->insert([ 'Tipo_en' => 'Finished', 'Tipo_es' => 'Completado' ]);
        DB::table('estatus')->insert([ 'Tipo_en' => 'Archived', 'Tipo_es' => 'Archivado' ]);
    }
}
