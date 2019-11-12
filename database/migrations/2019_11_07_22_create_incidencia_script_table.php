<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenciaScriptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencia_script', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');            
            $table->unsignedInteger('tincidenceScript_id');
            $table->foreign('tincidenceScript_id')->references('id')->on('type_incidence_script'); 
            $table->integer('Ver_Material')->nullable();
            $table->integer('Ver_Script')->nullable();
            $table->string('Pregunta')->nullable();
            $table->boolean('Acepta_RDM')->nullable();
            $table->boolean('Acepta_LDC')->nullable();
            $table->boolean('NoCambio')->nullable();
            $table->date('fecha_Live')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencia_script');
    }
}
