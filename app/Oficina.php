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
}
