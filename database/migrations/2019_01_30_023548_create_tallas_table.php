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
            $table->boolean('pierna');
            $table->boolean('brazo');
            $table->boolean('tobimedia');
            $table->boolean('media');
            $table->boolean('pantimedia');
            $table->boolean('calcetin');
            $table->boolean('pantorrillera');
            $table->decimal('circunferencia_tobillo_izq', 8, 2);
            $table->decimal('circunferencia_tobillo_dcha', 8, 2);
            $table->decimal('circunferencia_pantorrilla_izq', 8, 2);
            $table->decimal('circunferencia_pantorrilla_dcha', 8, 2);
            $table->decimal('altura_pantorrilla_izq', 8, 2);
            $table->decimal('altura_pantorrilla_dcha', 8, 2);
            $table->decimal('circunferencia_muslo_izq', 8, 2);
            $table->decimal('circunferencia_muslo_dcha', 8, 2);
            $table->decimal('altura_pierna_izq', 8, 2);
            $table->decimal('altura_pierna_dcha', 8, 2);
            $table->decimal('circunferencia_cadera', 8, 2);
            $table->decimal('calzado_izq', 8, 2);
            $table->decimal('calzado_dcha', 8, 2);
            $table->decimal('peso', 8, 2);
            $table->decimal('estatura', 8, 2);
            $table->boolean('guante');
            $table->decimal('circunferencia_plama_izq', 8, 2);
            $table->decimal('circunferencia_plama_dcha', 8, 2);
            $table->decimal('circunferencia_munieca_izq', 8, 2);
            $table->decimal('circunferencia_munieca_dcha', 8, 2);
            $table->decimal('circunferencia_media_izq', 8, 2);
            $table->decimal('circunferencia_media_dcha', 8, 2);
            $table->decimal('talla_izq', 8, 2);
            $table->decimal('talla_dcha', 8, 2);
            $table->string('sexo');
            $table->integer('paciente_id')->unsigned()->nullable();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
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