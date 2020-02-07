<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialCambiosVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_cambios_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_cambio')->nullable();
            $table->unsignedInteger('responsable_id')->nullable();
            $table->unsignedInteger('venta_id')->nullable();
            $table->unsignedInteger('producto_entregado_id')->nullable();
            $table->unsignedInteger('producto_devuelto_id')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();

            // $table->foreign('responsable_id')->on('id')->references('users');
            // $table->foreign('venta_id')->on('id')->references('ventas');
            // $table->foreign('producto_entregado_id')->on('id')->references('productos');
            // $table->foreign('producto_devuelto_id')->on('id')->references('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_cambios_venta');
    }
}
