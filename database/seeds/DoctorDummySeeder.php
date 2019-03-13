<?php

use Illuminate\Database\Seeder;

class DoctorDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctores')->insert([
            'nombre' => 'dummy',
            'apellidopaterno' => 'dummy',
            'apellidomaterno' => 'dummy',
            'celular' => 'dummy',
            'mail' => 'dummy',
            'nacimiento' => 'dummy',
        ]);

    }
}
