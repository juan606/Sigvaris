<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Venta extends Model
{
    protected $table = 'ventas';
    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'paciente_id',
        'fecha',
        'subtotal',
        'descuento_id',
        'total'
    ];

    public function productos(){
        return $this->belongsToMany('App\Producto', 'producto_venta')->withPivot('cantidad');
    }

    public function paciente(){
        return $this->belongsTo('App\Paciente', 'paciente_id');
    }

    public function descuento(){
        return $this->belongsTo('App\Descuento', 'descuento_id');
    }
}
