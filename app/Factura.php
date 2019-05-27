<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'facturas';
    
    protected $fillable = [
    	'id',
    	'venta_id',
    	'nombre',
		'fisica',
		'moral',
		'rfc',
		'regimen_fiscal',
		'homoclave',
		'correo',
		'calle',
		'num_ext',
		'num_int',
		'colonia',
		'ciudad',
		'municipio',
		'estado',
		'cp'
    ];

    public function venta(){
    	return $this->belongsTo('App\Venta', 'venta_id');
    }
}
