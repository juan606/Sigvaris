<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'oficinas';
    public $timestamps = true;
    
    protected $fillable = [
    	'id',
    	'nombre',
        'direccion',
        'responsable'
    ];
    
    public function empleados(){
        return $this->hasMany('App\Empleado');
    }

    public function pacientes(){
        return $this->hasMany('App\Paciente');
    }

    public function ventas(){
        return $this->hasMany('App\Venta');
    }
    public function Certificacionestiendas(){
        return $this->hasMany('App\Certificacionestienda');
    }
}
