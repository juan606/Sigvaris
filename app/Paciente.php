<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
    public $timestamps = true;
    
    protected $fillable = [
    	'id',
    	'nombre',
    	'materno',
        'paterno',
        'nacimiento',
        'rfc',
        'celular',
        'telefono',
        'mail',
        'otro_doctor',
        'doctor_id',
        'nivel_id',
        'oficina_id'
    ];

    public function consultorios(){
        return $this->morphMany('App\Consultorio', 'consultable');
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function crms(){
        return $this->hasMany('App\Crm');
    }

    public function tallas(){
        return $this->hasMany('App\Talla');
    }

    public function historial(){
        return $this->hasMany('App\RegistroHistorial');
    }
    public function tutor(){
        return $this->hasOne('App\Tutor');
    }

    public function ventas(){
        return $this->hasMany('App\Venta');
    }

    public function nivel(){
        return $this->belongsTo(Nivel::class,'nivel_id');
    }

    public function oficina(){
        return $this->belongsTo('App\Oficina');
    }

}
