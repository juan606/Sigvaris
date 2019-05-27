<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas', function (Blueprint $table){
            $table->integer('sigpesos')->nullable();
            $table->integer('promocion_id')->unsigned()->nullable();
            $table->foreign('promocion_id')->references('id')->on('promociones');
            $table->integer('descuento_id')->unsigned()->nullable()  ->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropColumn('sigpesos');
            $table->dropColumn('promocion_id');
            $table->integer('descuento_id')->unsigned()->nullable(false)  ->change();
        });
    }
}
