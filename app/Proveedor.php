<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'tipopersona',
        'nombre',
        'apellidopaterno',
        'apellidomaterno',
        'razonsocial',
        'alias',
        'rfc',
        'vendedor',
        'email',
        'calle',
        'numext',
        'numinter',
        'colonia',
        'municipio',
        'ciudad',
        'estado',
        'calle1',
        'calle2',
        'referencia'
    ];

    public function direccionFisicaProveedor(){
        return $this->hasOne('App\DireccionFisicaProveedor');
    }

    public function contactosProveedor(){
        return $this->hasMany('App\ContactoProveedor');
    }

    public function datosGeneralesProveedor(){
        return $this->hasOne('App\DatosGeneralesProveedor');
    }

    public function datosBancarios(){
        return $this->hasOne('App\DatosBancariosProveedor');
    }

}
