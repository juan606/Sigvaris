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
        'total'
    ];

    public function productos(){
        return $this->belongsToMany('App\Producto', 'producto_venta');
    }

    public function paciente(){
        $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
