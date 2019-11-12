<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('costad_id');
            $table->foreign('costad_id')->references('id')->on('cost_ad');            
            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');            
            $table->unsignedInteger('costdate_id');
            $table->foreign('costdate_id')->references('id')->on('cost_date');                        
            $table->integer('Horas_Code')->nullable();
            $table->integer('Horas_Script')->nullable();
            $table->integer('Horas_DP')->nullable();
            $table->double('ValorHora')->nullable();
            $table->double('CostoTotal')->nullable();
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
        Schema::dropIfExists('cost');
    }
}
