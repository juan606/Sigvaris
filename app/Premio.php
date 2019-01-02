<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premios';
    public $timestamps = false;
    
    protected $fillable = [
    	'id',
    	'doctor_id',
    	'nombre',
        'institucion',
        'otorga',
        'fecha'
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
}
