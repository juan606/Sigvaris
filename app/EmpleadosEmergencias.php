<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmpleadosEmergencias extends Model
{

    protected $table='empleadosemergencias';

    protected $fillable=['id','empleado_id','sangre','enfermedades','alergias','operaciones','nombrecontac1','parentescocontac1','telefonocontac1','movilcontac1','nombrecontac2', 'parentescocontac2','telefonocontac2','movilcontac2','nombrecontac3','parentescocontac3','telefonocontac3','movilcontac3'];
    protected $hidden=['created_at','updated_at'];

    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }

}
