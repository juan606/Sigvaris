<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Area extends Model 
{
    //
    protected $table = 'areas';
    protected $fillable=['id','nombre','etiqueta'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];

    public function datosLab(){
    	return $this->belongsTo('App\EmpleadosDatosLab');
    }
}
