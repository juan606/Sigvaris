<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    protected $table = 'consultorios';
    public $timestamps = false;
    
    protected $fillable = [
    	'id',
    	'doctor_id',
    	'nombre',
    	'direccion',
        'secretaria',
        'tel1',
        'tel2',
        'tel3',
        'mail',
        'desde',
        'hasta'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
