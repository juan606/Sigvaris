<?php

namespace App\Http\Controllers\Reporte;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Venta;

class ReporteController extends Controller
{
    public function dos(Request $request){

        $pacientes = array();
        $ventas = array();

        if($request->input()){
            $fechaInicial = $request->input('fecha_inicial');
            $fechaFinal = $request->input('fecha_final');
            $pacientes = Paciente::get();
            $ventas = Venta::where('fecha','>=',$fechaInicial)->where('fecha','<=',$fechaFinal)->get();
            // dd($ventas);
        }

        return view('reportes.prendas', compact('pacientes','ventas'));
    }

    public function cuatro(Request $request){

        if($request->input()){
            dd($request->input());
        }

        return view('reportes.pacientes');
    }

    public function siete(){
        return view('reportes.productos');
    }
}
