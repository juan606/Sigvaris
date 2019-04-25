<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
        'name'=>'Administrador',
        'email'=>'admin@sigvarismexicocrm.mx',
        'password'=> bcrypt('SigvarisCrm246'), // secret
        'role_id'=>1
    	]);
    }
}
