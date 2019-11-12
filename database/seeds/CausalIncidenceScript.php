<?php

use Illuminate\Database\Seeder;

class CausalIncidenceScript extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 1, 'Tipo_en' => 'Changes in phrasing or structure', 'Tipo_es' => 'Cambios en fraseo o estructura' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 1, 'Tipo_en' => 'Changes in the collection methodology', 'Tipo_es' => 'Cambios en la metodologia de recoleccion' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 2, 'Tipo_en' => 'Critical Error by default', 'Tipo_es' => 'Error Critico por omision' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 2, 'Tipo_en' => 'Critical error in the logic of the script', 'Tipo_es' => 'Error Critico en la logica del script' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 2, 'Tipo_en' => 'Non-critical error (Tildes phrases, letters, bold, change of some letters, instructions)', 'Tipo_es' => 'Error no critico (Frases Tildes , letras, negrillas, cambio de algunas letras, instrucciones)' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 2, 'Tipo_en' => 'Critical error in script quotas', 'Tipo_es' => 'Error critico en las cuotas del script' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 2, 'Tipo_en' => 'Other incidents', 'Tipo_es' => 'Otras Incidencias' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 3, 'Tipo_en' => 'Incorrect passes in the questionnaire', 'Tipo_es' => 'Pases Incorrectos en el cuestionario' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 3, 'Tipo_en' => 'Incorrect phrases in the questionnaire', 'Tipo_es' => 'Fraseos inconrrectos en el cuestionario' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 3, 'Tipo_en' => 'Omission of response options', 'Tipo_es' => 'Omision de opciones de respuesta' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 3, 'Tipo_en' => 'Omission of instructions', 'Tipo_es' => 'Omision de instrucciones' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 3, 'Tipo_en' => 'Omission of questions', 'Tipo_es' => 'Omision de preguntas' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 4, 'Tipo_en' => 'Wrong material', 'Tipo_es' => 'Material incorrecto' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 4, 'Tipo_en' => 'Incomplete material', 'Tipo_es' => 'Material incompleto' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 4, 'Tipo_en' => 'Material other than the last scheduled version (Waves / Tracking)', 'Tipo_es' => 'Material distinto a la ultima version programada (Waves /Tracking)' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 4, 'Tipo_en' => 'Error in Change Control Format register for Waves / Tracking', 'Tipo_es' => 'Error en registro de Formato de Control de cambios para Waves/Tracking' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 5, 'Tipo_en' => 'Changes to improve look & feel', 'Tipo_es' => 'Cambios para mejorar look &amp; feel' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 5, 'Tipo_en' => 'Add or remove questions answer options', 'Tipo_es' => 'Adicion o eliminado de preguntas opciones de respuesta' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 5, 'Tipo_en' => 'Label changes that do not need to perform protocol in scripting quality', 'Tipo_es' => 'Cambios de label que no necesitan realizar protocolo en la calidad del scripting' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 5, 'Tipo_en' => 'Changes in the sample / Fees', 'Tipo_es' => 'Cambios en la muestra / Cuotas' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 5, 'Tipo_en' => 'Changes in multimedia material (Logos, advertising, etc.)', 'Tipo_es' => 'Cambios del material multimedia (Logos, publicidad, etc.)' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 6, 'Tipo_en' => 'Changes to improve look & feel', 'Tipo_es' => 'Cambios para mejorar look &amp; feel' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 6, 'Tipo_en' => 'Add or remove questions answer options', 'Tipo_es' => 'Adicion o eliminado de preguntas opciones de respuesta' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 6, 'Tipo_en' => 'Label changes that do not need to perform protocol in scripting quality', 'Tipo_es' => 'Cambios de label que no necesitan realizar protocolo en la calidad del scripting' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 6, 'Tipo_en' => 'Changes in the sample / Fees', 'Tipo_es' => 'Cambios en la muestra / Cuotas' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 6, 'Tipo_en' => 'Changes in multimedia material (Logos, advertising, etc.)', 'Tipo_es' => 'Cambios del material multimedia (Logos, publicidad, etc.)' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 7, 'Tipo_en' => 'Changes to improve look & feel', 'Tipo_es' => 'Cambios para mejorar look &amp; feel' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 7, 'Tipo_en' => 'Add or remove questions answer options', 'Tipo_es' => 'Adicion o eliminado de preguntas opciones de respuesta' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 7, 'Tipo_en' => 'Label changes that do not need to perform protocol in scripting quality', 'Tipo_es' => 'Cambios de label que no necesitan realizar protocolo en la calidad del scripting' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 7, 'Tipo_en' => 'Changes in the sample / Fees', 'Tipo_es' => 'Cambios en la muestra / Cuotas' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 7, 'Tipo_en' => 'Changes in multimedia material (Logos, advertising, etc.)', 'Tipo_es' => 'Cambios del material multimedia (Logos, publicidad, etc.)' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 8, 'Tipo_en' => 'Wrong script review', 'Tipo_es' => 'Revision erronea del script' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 9, 'Tipo_en' => 'Technical Errors', 'Tipo_es' => 'Errores Tecnicos' ]);
        DB::table('causal_incidencia_script')->insert([ 'tincidenceScript_id' => 10, 'Tipo_en' => 'Quota Tracking', 'Tipo_es' => 'Seguimiento de cuotas' ]);

    }
}
