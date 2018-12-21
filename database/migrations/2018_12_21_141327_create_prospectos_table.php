<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->string('celular')->nullable();
            $table->string('mail')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('especialidadcedula')->nullable();
            $table->string('subespecialidad')->nullable();
            $table->string('subespecialidadcedula')->nullable();
            $table->string('fechanacimiento')->nullable();
            $table->string('fechacreacion')->nullable();
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
        Schema::dropIfExists('prospectos');
    }
}
