<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutores';
    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'nombre',
        'paterno',
        'materno',
        'paciente_id'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
