<?php

use Illuminate\Database\Seeder;

class TypeIncidenceScript extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Different questionnaires / collection methodology', 'Tipo_es' => 'Cuestionarios diferentes / metodologia  de recoleccion' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Script Error', 'Tipo_es' => 'Error en el Script' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Questionnaire error', 'Tipo_es' => 'Error de cuestionario' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Material error', 'Tipo_es' => 'Error de material' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Changes requested by the CM / Client', 'Tipo_es' => 'Cambios solicitados por el CM/Cliente' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Changes requested by RDM', 'Tipo_es' => 'Cambios solicitados por RDM' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Changes requested by Field', 'Tipo_es' => 'Cambios solicitados por Campo' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Wrong script review', 'Tipo_es' => 'Revision erronea del script' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Technical Errors', 'Tipo_es' => 'Errores Tecnicos' ]);
        DB::table('type_incidence_script')->insert([ 'Tipo_en' => 'Quota Tracking', 'Tipo_es' => 'Seguimiento de cuotas' ]);

    }
}
