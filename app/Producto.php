<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'sku',
        'descripcion',
        'cantidad',
        'precio_distribuidor',
        'precio_publico',
        'precio_publico_iva'
    ];

    public function ventas(){
        return $this->belongsToMany('App\Venta', 'producto_venta');
    }
}
