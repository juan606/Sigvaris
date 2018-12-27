<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionFisicaProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_fisica_proveedor', function (Blueprint $table) {
            $table->increments('id');
        $table->integer('proveedor_id')->unsigned();
        $table->foreign('proveedor_id')->references('id')->on('proveedores');
        $table->string('calle')->nullable();
        $table->string('numext')->nullable();
        $table->string('numint')->nullable();
        $table->string('cp')->nullable();
        $table->string('colonia')->nullable();
        $table->string('municipio')->nullable();
        $table->string('ciudad')->nullable();
        $table->string('estado')->nullable();
        $table->string('referencia')->nullable();
        $table->string('calle1')->nullable();
        $table->string('calle2')->nullable();
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
        Schema::dropIfExists('direccion_fisica_proveedor');
    }
}
