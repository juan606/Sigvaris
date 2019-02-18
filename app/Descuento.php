<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuento extends Model
{
    protected $table='descuentos';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'tipo',
        'valor'
    ];
    
    public function ventas(){
        return $this->hasMany('App\Venta');
    }
}
