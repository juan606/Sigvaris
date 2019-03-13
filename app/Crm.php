<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crm extends Model
{
    protected $table = 'crms';
    public $timestamps = true;
    
    protected $fillable = [
    	'id',
    	'paciente_id',
    	'observaciones',
        'acuerdos',
        'comentarios',
        'fecha_aviso',
        'fecha_contacto',
        'forma_contacto',
        'estado',
        'hora'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }
}
