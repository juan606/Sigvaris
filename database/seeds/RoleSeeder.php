<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->insert([
        'nombre'=>'admin',
        'proveedores'=>1,
        'pacientes'=>1,
        'doctores'=>1,
        'recursos_humanos'=>1,
        'precargas'=>1,
        'punto_de_venta'=>1,
        'productos'=>1,
        'crm'=>1,
        'oficinas'=>1]);
    }
}
