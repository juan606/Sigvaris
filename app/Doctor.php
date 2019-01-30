<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{

    use SoftDeletes;

    protected $table='doctores';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'celular',
        'mail',
        'nacimiento'
        ];

        public function consultorios(){
            return $this->morphMany('App\Consultorio', 'consultable');
        }

        public function especialidades(){
            return $this->hasMany('App\Especialidad');
        }

        public function premios(){
            return $this->hasMany('App\Premio');
        }
       
        public function pacientes(){
            return $this->hasMany('App\Paciente');
        }

}
