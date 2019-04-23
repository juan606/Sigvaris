<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno')->nullable();
            $table->string('celular')->nullable();
            $table->string('mail')->nullable();
            $table->string('nacimiento')->nullable();
            $table->boolean('activo')->default(1);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctores');
    }
}
