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
    	'hospital_id',
    	'direccion',
        'secretaria',
        'tel1',
        'tel2',
        'tel3',
        'mail',
        'desde',
        'hasta'
    ];

    public function consultable(){
        return $this->morphTo();
    }

    public function hospital(){
        return $this->belongsTo('App\Hospital', 'hospital_id');
    }
}
