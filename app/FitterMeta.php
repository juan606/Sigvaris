<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FitterMeta extends Model
{
    protected $table = "fitter_metas";
    protected $fillable = [
        "monto_venta", 
        "num_pacientes_recompra",
        "numero_recompras",
        "fecha_inicio",
        "empleado_id",
    ];
}
