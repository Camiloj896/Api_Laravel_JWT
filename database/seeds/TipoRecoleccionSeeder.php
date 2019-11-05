<?php

use Illuminate\Database\Seeder;

class TipoRecoleccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAPI' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAPI Conectado' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAPI Desconectado' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CASI' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CASI Conectado' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CASI Desconectado' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CATI' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAWI' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAWI - CASI CONECTADO' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAWI - CASI DESCONECTADO' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'MAILING' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'CAWI-CAPI' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'PAPI' ]);
        DB::table('tipo_recoleccion')->insert([ 'Tipo' => 'SMS' ]);
    }
}
