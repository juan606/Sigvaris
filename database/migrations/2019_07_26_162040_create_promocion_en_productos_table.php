<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionEnProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocion_en_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('descuento_id')->unsigned();
            $table->foreign('descuento_id')->references('id')->on('descuentos');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('descuento');
            $table->string('unidad_descuento');
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
        Schema::dropIfExists('promocion_en_productos');
    }
}
