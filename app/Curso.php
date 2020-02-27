<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    protected $fillable = [
    	"nombre", "es_certificado", "calificacion", "fecha", "duracion", "instructor", "certificador","id_empleado"
    ];

    public function empleado(){
    	return $this->belongsTo('App\Empleado','id_empleado');
    }
}
