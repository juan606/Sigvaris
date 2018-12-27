<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoProveedor extends Model
{

	protected $table = 'contactos_proveedor';
	public $timestamps = false;

    protected $fillable = [
    	'id',
    	'proveedor_id',
    	'nombre',
    	'apater',
    	'amater',
    	'area',
    	'puesto',
    	'telefono1',
    	'ext1',
    	'telefono2',
    	'ext2',
    	'telefonodir',
    	'celular1',
    	'celular2',
    	'email1',
    	'email2'
    ];

    public function proveedores() {
    	return $this->belongsTo(Proveedor::class,'proveedor_id');
    }
}
