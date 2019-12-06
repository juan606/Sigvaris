<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    protected $fillable = [
    	"nombre", "es_certificado", "calificacion", "fecha", "duracion", "instructor", "certificador"
    ];
}
