<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesExpedienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_expediente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paciente_id')->unsigned()->nullable();
            $table->string('receta');
            $table->string('aviso_privacidad');
            $table->string('identificacion');
            $table->string('inapam');
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
        Schema::dropIfExists('pacientes_expediente');
    }
}
