<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFitterMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fitter_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('monto_venta')->default(0.00);
            $table->integer('num_pacientes_recompra')->default(0);
            $table->integer('numero_recompras')->default(0);
            $table->date('fecha_inicio');
            $table->integer('empleado_id')->unsigned();
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
        Schema::dropIfExists('fitter_metas');
    }
}
