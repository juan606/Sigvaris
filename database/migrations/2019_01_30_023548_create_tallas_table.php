<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tallas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pierna')->nullable();
            $table->string('brazo')->nullable();
            $table->boolean('tobimedia')->nullable();
            $table->boolean('media')->nullable();
            $table->boolean('pantimedia')->nullable();
            $table->boolean('calcetin')->nullable();
            $table->boolean('pantorrillera')->nullable();
            $table->decimal('circunferencia_tobillo_izq', 8, 2)->nullable();
            $table->decimal('circunferencia_tobillo_dcha', 8, 2)->nullable();
            $table->decimal('circunferencia_pantorrilla_izq', 8, 2)->nullable();
            $table->decimal('circunferencia_pantorrilla_dcha', 8, 2)->nullable();
            $table->decimal('altura_pantorrilla_izq', 8, 2)->nullable();
            $table->decimal('altura_pantorrilla_dcha', 8, 2)->nullable();
            $table->decimal('circunferencia_muslo_izq', 8, 2)->nullable();
            $table->decimal('circunferencia_muslo_dcha', 8, 2)->nullable();
            $table->decimal('altura_pierna_izq', 8, 2)->nullable();
            $table->decimal('altura_pierna_dcha', 8, 2)->nullable();
            $table->decimal('circunferencia_cadera', 8, 2)->nullable();
            $table->decimal('calzado_izq', 8, 2)->nullable();
            $table->decimal('calzado_dcha', 8, 2)->nullable();
            $table->decimal('peso', 8, 2)->nullable();
            $table->decimal('estatura', 8, 2)->nullable();
            $table->boolean('guante')->nullable();
            $table->decimal('circunferencia_plama_izq', 8, 2)->nullable();
            $table->decimal('circunferencia_plama_dcha', 8, 2)->nullable();
            $table->decimal('circunferencia_munieca_izq', 8, 2)->nullable();
            $table->decimal('circunferencia_munieca_dcha', 8, 2)->nullable();
            $table->decimal('circunferencia_media_izq', 8, 2)->nullable();
            $table->decimal('circunferencia_media_dcha', 8, 2)->nullable();
            $table->decimal('talla_izq', 8, 2)->nullable();
            $table->decimal('talla_dcha', 8, 2)->nullable();
            $table->string('sexo');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');;
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
        Schema::dropIfExists('tallas');
    }
}
