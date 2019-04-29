<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('materno');
            $table->string('paterno');
            $table->date('nacimiento');
            $table->string('rfc');
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('mail')->nullable();
            $table->string('otro_doctor')->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctores');
            $table->integer('nivel_id')->unsigned()->nullable();
            $table->foreign('nivel_id')->references('id')->on('nivels');
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
        Schema::dropIfExists('pacientes');
    }
}
