<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidads';
    public $timestamps = false;
    
    protected $fillable = [
    	'id',
    	'doctor_id',
    	'nombre',
        'cedula',
        'universidad'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
