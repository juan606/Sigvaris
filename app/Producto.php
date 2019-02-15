<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'nombre',
        'cantidad',
        'precio'
    ];

    public function ventas(){
        return $this->belongsToMany('App\Venta', 'producto_venta');
    }
}
