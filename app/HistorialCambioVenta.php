<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialCambioVenta extends Model
{
    protected $table = "historial_cambios_venta";
    protected $fillable = [
    	'tipo_cambio', 
    	'responsable_id', 
    	'venta_id', 
    	'producto_entregado_id', 
    	'producto_devuelto_id', 
    	'observaciones'];
}
