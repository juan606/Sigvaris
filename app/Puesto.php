<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Puesto extends Model  
{
    //
    protected $table = 'puestos';
    protected $fillable=['id','nombre','etiqueta'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];

    public function EmpleadosDatosLab(){
    	return $this->hasMany('App\EmpleadosDatosLab');
    }
}
