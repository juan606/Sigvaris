<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoBaja extends Model
{
    protected $fillable = [
        'motivo',
        'comentario',
        'empleado_id'
    ];
    protected $table = 'empleado_bajas';
    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'empleado_id');
    }
}
