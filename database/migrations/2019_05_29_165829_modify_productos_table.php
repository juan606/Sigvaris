<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('productos', function (Blueprint $table){
            $table->string('line')->nullable();
            $table->string('upc')->nullable();
            $table->string('swiss_id')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColumn('line');
        $table->dropColumn('upc');
        $table->dropColumn('swiss_id');        
    }
}
