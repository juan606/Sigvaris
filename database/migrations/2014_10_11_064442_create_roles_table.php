<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->boolean('proveedores')->default(false);
            $table->boolean('pacientes')->default(false);
            $table->boolean('doctores')->default(false);
            $table->boolean('recursos_humanos')->default(false);
            $table->boolean('precargas')->default(false);
            $table->boolean('punto_de_venta')->default(false);
            $table->boolean('productos')->default(false);
            $table->boolean('crm')->default(false);
            $table->boolean('oficinas')->default(false);
            $table->boolean('usuarios')->default(false);
            $table->boolean('roles')->default(false);
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
        Schema::dropIfExists('roles');
    }
}
