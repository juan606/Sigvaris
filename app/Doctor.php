<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table='doctores';

    protected $fillable = [
        'id',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'telefono1',
        'telefono2',
        'hospital',
        'referido',
        'especialidad'
        ];
       
}
