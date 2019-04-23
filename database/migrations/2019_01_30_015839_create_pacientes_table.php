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
            $table->date('nacimiento')->nullable();
            $table->string('rfc');
            $table->string('celular');
            $table->string('telefono');
            $table->string('mail');
            $table->string('otro_doctor')->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctores');
            $table->integer('nivel_id')->unsigned();
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
