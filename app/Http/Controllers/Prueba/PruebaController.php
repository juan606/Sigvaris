<?php

namespace App\Http\Controllers\Prueba;

use App\Doctor;
use App\Empleado;
use App\EmpleadosDatosLab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Producto;
use App\Puesto;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class PruebaController extends Controller
{

    public function index(){
        return Empleado::find(3)->pacientes()->get();
    }
}
