<?php

use Illuminate\Database\Seeder;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oficinas')->insert([
        'nombre'=>'Polanco',
        'direccion'=>'Prolongacion Moliere 450 -C Planta Baja Ampliacion granada, CP 11529',
        'responsable'=>'Blanca Talamantes'
        ]);
    }
}
