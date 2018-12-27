<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosBancariosProveedor extends Model
{
	protected $table = 'datos_bancarios_proveedor';
	public $timestamps = false;

    protected $fillable = [
    	'id',
    	'proveedor_id',
    	'banco_id',
    	'cuenta',
    	'clabe',
    	'beneficiario'
    ];

    public function proveedor() {
    	return $this->belongsTo('App\Proveedor');
    }

    public function banco() {
    	return $this->belongsTo('App\Banco');
    }
}
