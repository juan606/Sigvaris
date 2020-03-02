<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table='promociones';    

    protected $fillable = [
        'tipo',
		'compra_min',
		'unidad_compra',
		'descuento_de',
		'unidad_descuento',
		'descuento_id',
        'aceptSigPesos'
    ];

    public function descuento(){
    	return $this->belongsTo('App\Descuento', 'descuento_id');
    }
}
