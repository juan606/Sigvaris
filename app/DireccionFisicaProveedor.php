<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionFisicaProveedor extends Model
{
    protected $table='direccion_fisica_proveedor';
    public $timestamps = false;

    protected $fillable=[
        'id',
        'proveedor_id',
        'calle',
        'numext',
        'numint',
        'colonia',
        'municipio',
        'ciudad',
        'estado',
        'referencia',
        'calle1',
        'calle2',
        'cp'];
    

    public function proveedores(){
    	return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
