<?php

use Illuminate\Database\Seeder;

class PaisComisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais_comision')->insert([ 'Nombre' => 'Argentina MB', 'Jobnumber_local' => '31109036' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Argentina TNS', 'Jobnumber_local' => '31109024' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Brasil MB', 'Jobnumber_local' => '31109023' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Brasil TNS', 'Jobnumber_local' => '31109033' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Canada MB', 'Jobnumber_local' => '31109037' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Chile MB', 'Jobnumber_local' => '31109040' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Chile TNS', 'Jobnumber_local' => '31109015' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Colombia MB', 'Jobnumber_local' => '31109030' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Ecuador MB', 'Jobnumber_local' => '31109025' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'España MB', 'Jobnumber_local' => '31109028' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Hungria MB', 'Jobnumber_local' => '31109026' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Malaysia MB', 'Jobnumber_local' => '31109039' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Mercaplan', 'Jobnumber_local' => '31109038' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'México MB', 'Jobnumber_local' => '31109034' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'México TNS', 'Jobnumber_local' => '31109041' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Millward Brown Group', 'Jobnumber_local' => '31109021' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'North America', 'Jobnumber_local' => '31109022' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Peru MB', 'Jobnumber_local' => '31109031' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Singapur', 'Jobnumber_local' => '31109016' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Tailandia MB', 'Jobnumber_local' => '31109017' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Taylor Nelson Sofres Mexico', 'Jobnumber_local' => '31109035' ]);
        DB::table('pais_comision')->insert([ 'Nombre' => 'Uk MB', 'Jobnumber_local' => '31109018' ]);
    }
}
