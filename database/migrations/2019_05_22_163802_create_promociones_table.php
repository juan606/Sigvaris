<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tipo',1);
            $table->integer('compra_min')->default(0);
            $table->string('unidad_compra');
            $table->integer('descuento_de');
            $table->string('unidad_descuento');
            $table->integer('descuento_id')->unsigned();
            $table->foreign('descuento_id')->references('id')->on('descuentos');
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
        Schema::dropIfExists('promociones');
    }
}
