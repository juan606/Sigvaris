<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $table='prospectos';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'celular',
        'mail',
        'especialidad',
        'especialidadcedula',
        'subespecialidad'.
        'subespecialidadcedula',
        'fechanacimiento',
        'fechacreacion'
        ];
}
