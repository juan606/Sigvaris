<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPacientesExpedienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pacientes_expediente', function (Blueprint $table) {
            //
            $table->string('receta')->unsigned()->nullable();
            $table->string('identificacion')->unsigned()->nullable();
            $table->string('inapam')->unsigned()->nullable();

        });
    }

    
}
