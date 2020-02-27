<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class EmpleadosVacaciones extends Model
{
    //
    protected $table='empleadosvacaciones';
    protected $fillable=['id','empleado_id','fechainicio','fechafin','diastomados','diasrestantes','periodo1','periodo2','diastotal','tipoVacaciones'];
    protected $hidden=['created_at','updated_at'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }

}
