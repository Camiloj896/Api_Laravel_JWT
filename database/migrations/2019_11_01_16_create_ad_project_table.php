<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_project', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->integer('EncuestasM')->nullable();
            $table->integer('EncuestasPC')->nullable();
            $table->integer('TiempoEncuM')->nullable();
            $table->integer('TiempoEncuPC')->nullable();
            $table->integer('Encu_Tiempo')->nullable();
            $table->integer('Encu_Covi')->nullable();
            $table->integer('Encu_Incompletas')->nullable();                       
            $table->integer('Encu_Cuota')->nullable();
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
        Schema::dropIfExists('ad_project');
    }
}
