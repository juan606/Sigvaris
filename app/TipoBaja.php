<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBaja extends Model
{
    //
    protected $table = 'tipobaja';
    protected $fillable=['id','nombre','abreviatura'];
    protected $hidden=['created_at','updated_at'];
    public $sortable=['id','nombre','abreviatura'];
    public function datosLab(){
    	return $this->belongsTo('App\EmpleadosDatosLab');
    }
}
