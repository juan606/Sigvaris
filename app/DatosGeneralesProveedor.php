<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosGeneralesProveedor extends Model
{
	protected $table = 'datos_generales_proveedor';
	public $timestamps = false;

    protected $fillable=[
		'id',
		'proveedor_id',
		'giro_id',
		'tamano', 
		'forma_contacto_id', 
		'web','comentario', 
		'fechacontacto',
		'banco',
		'cuenta',
		'beneficiario',
		'clabe'
	];

    public function proveedor() {
    	return $this->belongsTo('App\Proveedor');
    }
}
