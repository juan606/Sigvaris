<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = 'nivels';
    public $timestamps = true;
    
    protected $fillable = [
    	'id',
    	'nombre',
        'etiqueta'
    ];

    public function pacientes(){
        return $this->hasMany('App\Paciente');
    }
}
