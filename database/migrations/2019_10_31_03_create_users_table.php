<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rol_id')->nullable();
            $table->foreign('rol_id')->references('id')->on('rol');
            $table->unsignedInteger('manager_id')->nullable();
            $table->foreign('manager_id')->references('id')->on('manager');
            $table->string('Fname',25)->nullable();
            $table->string('Lname',25)->nullable();
            $table->string('Email',100)->unique();
            $table->string('Area',25)->nullable();
            $table->string('Pass',70)->nullable();
            $table->string('ForgotPass',25)->nullable();
            $table->string('Estado',25)->nullable();
            $table->string('Cargo',25)->nullable();
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
        Schema::dropIfExists('users');
    }
}
