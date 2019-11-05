<?php

use Illuminate\Database\Seeder;

class FrecuenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('frecuencia_entrega')->insert([ 'Frecuencia' => 'Bimestral' ]);
        DB::table('frecuencia_entrega')->insert([ 'Frecuencia' => 'Mensual' ]);
        DB::table('frecuencia_entrega')->insert([ 'Frecuencia' => 'Puntual' ]);
        DB::table('frecuencia_entrega')->insert([ 'Frecuencia' => 'Semestral' ]);
        DB::table('frecuencia_entrega')->insert([ 'Frecuencia' => 'Trimestral' ]);
        DB::table('frecuencia_entrega')->insert([ 'Frecuencia' => 'Wave' ]);
    }
}
