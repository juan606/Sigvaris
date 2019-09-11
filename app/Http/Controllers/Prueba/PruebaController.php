<?php

namespace App\Http\Controllers\Prueba;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Producto;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PruebaController extends Controller
{
    public function index()
    {

        // GROUP BY DATE
        return Paciente::has('ventas')->orderBy('created_at')->get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y-d-m');
        });
    }
}