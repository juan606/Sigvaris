<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificacionestienda extends Model
{
     protected $table = "certificacionestiendas";
    protected $fillable = [
    	"nombre", "es_certificado", "calificacion", "fecha", "duracion", "instructor", "certificador","oficina_id"
    ];

    public function oficina(){
    	return $this->belongsTo('App\Oficina','oficina_id');
    }
}
