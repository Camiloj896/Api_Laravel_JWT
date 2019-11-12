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
        Schema::create('incidence_scripts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');            
            $table->unsignedInteger('tincidenceScript_id')->nullable();
            $table->foreign('tincidenceScript_id')->references('id')->on('type_incidence_script');
            $table->unsignedInteger('cincidenceScript_id')->nullable();
            $table->foreign('cincidenceScript_id')->references('id')->on('causal_incidencia_script');
            $table->integer('Ver_Material')->nullable();
            $table->integer('Ver_Script')->nullable();
            $table->string('Pregunta')->nullable();
            $table->string('Ronda')->nullable();
            $table->boolean('Acepta_RDM')->nullable();
            $table->boolean('Acepta_LDC')->nullable();
            $table->boolean('NoCambio')->nullable();            
            $table->timestamps();
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
