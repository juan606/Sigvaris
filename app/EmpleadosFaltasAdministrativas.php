<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadosFaltasAdministrativas extends Model
{

    protected $table='empleadosfadministrativas';
    
    protected $fillable=['id','empleado_id','fecha','comentarios','problema','tipofalta','reporto'];
    
    
    protected $hidden=['created_at','updated_at'];
    
    public function empleado(){
    	return $this->belongsTo('App\Empleado','empleado_id');
    }
}
