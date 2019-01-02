<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoContrato extends Model
{

    protected $table = 'tipocontrato';
    protected $fillable=['id','nombre','abreviatura'];
    protected $hidden=['created_at','updated_at'];
    
    public function datosLab(){
    	return $this->belongsTo('App\EmpleadosDatosLab');
    }
}
