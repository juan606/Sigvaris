<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='proveedores';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'preveedores',
        'pacientes',
        'doctores',
        'recursos_humanos',
        'precargas',
        'punto_de_venta',
        'productos',
        'crm',
        'oficinas',
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}
