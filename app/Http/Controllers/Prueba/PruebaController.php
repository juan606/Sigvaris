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

        return Venta::
                whereYear('fecha',2019)->
                whereMonth('fecha',8)->
                with('productos')->
                get()->
                pluck('productos')->
                flatten()->
                where('sku','sku1');

        // return Paciente::orWhereMont('created');
        // return Paciente::orWhereMonth('created_at',7)->orWhereMonth('created_at',8)->get();
        
    }
}