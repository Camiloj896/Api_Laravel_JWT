<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCausalIncidenciaScriptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('causal_incidencia_script', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedInteger('tincidenceScript_id');
            $table->foreign('tincidenceScript_id')->references('id')->on('type_incidence_script'); 
            $table->string("Tipo_en",50)->nullable();
            $table->string("Tipo_es",50)->nullable();           
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
        Schema::dropIfExists('causal_incidencia_script');
    }
}
