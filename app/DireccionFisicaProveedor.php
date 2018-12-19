<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionFisicaProveedor extends Model
{
    protected $table='direccion_fisica_provedor';

    protected $fillable=[
        'id',
        'provedor_id',
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
    

    public function provedores(){
    	return $this->belongsTo(Provedor::class, 'provedor_id');
    }
}
