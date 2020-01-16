<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyFullNullToFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            //
            $table->string('fisica')->nullable()->change();
            $table->string('moral')->nullable()->change();
            $table->string('rfc')->nullable()->change();
            $table->string('regimen_fiscal')->nullable()->change();
            $table->string('homoclave')->nullable()->change();
            $table->string('correo')->nullable()->change();

            $table->string('calle')->nullable()->change();
            $table->string('num_ext')->nullable()->change();
            $table->string('colonia')->nullable()->change();
            $table->string('ciudad')->nullable()->change();
            $table->string('municipio')->nullable()->change();
            $table->string('estado')->nullable()->change();
            $table->string('cp')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturas', function (Blueprint $table) {
            //
        });
    }
}
