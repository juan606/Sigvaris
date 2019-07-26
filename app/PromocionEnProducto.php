<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromocionEnProducto extends Model
{
    protected $table = "promocion_en_productos";

    protected $fillable=[
    	'id',
    	'descuento_id',
    	'producto_id',
    	'descuento',
    	'unidad_descuento'
    ];
    protected $hidden=[ 'created_at', 'updated_at'];

    public function Descuento()
    {
    	return $this->belongsTo('App\Descuento', 'descuento_id');
    }

    public function productos()
    {
    	return $this->belongsToMany('App\Producto', 'producto_id');
    }
}
