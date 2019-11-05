<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pcomision_id')->nullable();
            $table->foreign('pcomision_id')->references('id')->on('pais_comision');
            $table->unsignedInteger('metodologia_id')->nullable();
            $table->foreign('metodologia_id')->references('id')->on('metodologia');
            $table->unsignedInteger('solucion_id')->nullable();
            $table->foreign('solucion_id')->references('id')->on('solucion');
            $table->unsignedInteger('plataforma_id')->nullable();
            $table->foreign('plataforma_id')->references('id')->on('plataforma');
            $table->unsignedInteger('estatus_id')->nullable();
            $table->foreign('estatus_id')->references('id')->on('estatus');
            $table->unsignedInteger('tipore_id')->nullable();
            $table->foreign('tipore_id')->references('id')->on('tipo_recoleccion');
            $table->unsignedInteger('fentrega_id')->nullable();
            $table->foreign('fentrega_id')->references('id')->on('frecuencia_entrega');
            $table->string('Jobnumber', 20)->nullable();
            $table->integer('Jobnumber_LDCG')->nullable();
            $table->string('Pname', 30)->nullable();
            $table->string('Cliente', 25)->nullable();
            $table->boolean('KantarProject')->nullable();
            $table->text('Link_KP')->nullable();
            $table->string('Qlib_uso', 25)->nullable();
            $table->text('Qlib_Link')->nullable();
            $table->string('Qlib_NA', 25)->nullable();
            $table->boolean('Qlib_Metadata')->nullable();
            $table->string('Qlib_porqueM', 30)->nullable();
            $table->boolean('Qlib_Web')->nullable();
            $table->string('Qlib_porqueW', 30)->nullable();
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
        Schema::dropIfExists('projects');
    }
}
