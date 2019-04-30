<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'proveedores',
        'pacientes',
        'doctores',
        'recursos_humanos',
        'precargas',
        'punto_de_venta',
        'productos',
        'crm',
        'oficinas',
        'usuarios',
        'roles'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

}
