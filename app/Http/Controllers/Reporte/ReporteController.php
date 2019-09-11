<?php

namespace App\Http\Controllers\Reporte;

use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Producto;
use App\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{

    public function uno(Request $request)
    {
        
        if ($request->input()) {
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');
            $pacientes_sin_compra = Paciente::noCompradores()->where('created_at', '>=', $fechaInicial)->where('created_at', '<=', $fechaFinal)->get();
            return view('reportes.uno', compact('pacientes_sin_compra'));
        }

        return view('reportes.uno');
    }

    public function dos(Request $request){

        if($request->input()){
            // return Paciente::find(2)->ventas()->with('productos')->get()->pluck('productos')->flatten();

            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');
            // $ventas = Venta::
            //     where('fecha','>=',$fechaInicial)->with('productos')->with('paciente')->where('fecha','<=',$fechaFinal)->get();
            // return $ventas;

            $ventasPorFechaPorPaciente = Venta::
                where('fecha','>=',$fechaInicial)->
                where('fecha','<=',$fechaFinal)->
                withCount('productos')->
                get()->
                groupBy('paciente_id')->transform(function($item, $k) {
                    return $item->groupBy(function($date) {
                        return Carbon::parse($date->fecha)->format('Y-m-d'); // grouping by years
                        //return Carbon::parse($date->created_at)->format('m'); // grouping by months
                    });
                });

            foreach($ventasPorFechaPorPaciente as $venta){
                $prendasVendidasPorPaciente =  $venta->pluck('productos_count')->flatten()->sum();
                // return $prendas;
                // return array_sum($prendas);
            }

            // return $ventasPorFechaPorPaciente;

            return view('reportes.dos',compact('ventasPorFechaPorPaciente'));
        }

        return view('reportes.dos');
    }

    public function tres(Request $request){
        return view('reportes.tres');
    }

    public function cuatroa(Request $request){

        if($request->input()){
            // dd($request->input(''));
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            $pacientesConCompra = Paciente::has('ventas')->get();

            foreach($pacientesConCompra as $paciente){
                $comprasPorCliente[] = count(
                    $paciente->
                    ventas()->
                    where('fecha','>=',$fechaInicial)->
                    where('fecha','<=',$fechaFinal)->
                    with('productos')->
                    get()->
                    pluck('productos')->
                    flatten()
                );

                
            }

            // dd(array_count_values($comprasPorCliente));
            $comprasPorCliente = array_count_values($comprasPorCliente);

            return view('reportes.cuatroa',compact('comprasPorCliente'));

        }

        return view('reportes.cuatroa');
    }

    public function cuatrob(Request $request){
        return view('reportes.cuatrob');
    }

    public function cuatroc(Request $request){

        $meses = null;
        $anios = null;
        $skus = null;

        if($request->input()){
            $meses = $request->input('mes');
            $anios = $request->input('anio');

            $skus = array_unique(Producto::pluck('sku')->toArray());
        }

        return view('reportes.cuatroc',compact('meses','anios','skus'));
    }

    public function cuatrod(Request $request){
        return view('reportes.cuatrod');
    }

    public function cinco(Request $request){

        $pacientes = null;
        $anios = [];
        $meses = [];

        if($request->input()){
            $opcion = $request->input('opciones');
            $anioInicial = $request->input('anioInicial');
            $anioFinal = $request->input('anioFinal');

            // Obtenemos los años validos
            for ($i=$anioInicial; $i <= $anioFinal; $i++) { 
                $anios[] = $i;
            }
            // dd($anios);
            $meses = ["01","02","03","04","05","06","07","08","09","10","11","12"];

        }

        return view('reportes.cinco',compact('pacientes','anios','meses','opcion'));
    }

    public function nueve(Request $request){

        if($request->input()){
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');
            
            $ventasPorSku = Venta::
                where('fecha','>=',$fechaInicial)->
                where('fecha','<=',$fechaFinal)->
                with('productos')->
                get()->
                pluck('productos')->
                flatten()->
                groupBy('sku');

                // with('productos')->get()->pluck('productos')->flatten()

                return view('reportes.nueve',compact('ventasPorSku'));

        }

        return view('reportes.nueve');
    }

    public function diez(Request $request){
        
        $doctores = Paciente::
                with('doctor')->
                get()->
                pluck('doctor')->
                flatten()->
                groupBy('id');

        if($request->input()){
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            $doctores = Paciente::
                where('updated_at','>=',$fechaInicial)->
                where('updated_at','<=',$fechaFinal." 23:59:59")->
                with('doctor')->
                get()->
                pluck('doctor')->
                flatten()->
                groupBy('nombre');

            return view('reportes.diez',compact('doctores'));

        }

        return view('reportes.diez',compact('doctores'));
    }
    
    public function dosAnt(Request $request)
    {

        $pacientes = array();
        $ventas = array();

        if ($request->input()) {
            $fechaInicial = $request->input('fecha_inicial');
            $fechaFinal = $request->input('fecha_final');
            $pacientes = Paciente::get();
            $ventas = Venta::where('fecha', '>=', $fechaInicial)->where('fecha', '<=', $fechaFinal)->get();
            // dd($ventas);


        }

        return view('reportes.prendas', compact('pacientes', 'ventas'));
    }

    public function cuatro(Request $request)
    {

        $fechaInicial = $request->input('fecha_inicial');
        $fechaFinal = $request->input('fecha_final');
        // dd($fechaInicial);

        $dataList = array();
        $sku_y_num_pacentes = array();
        $pacientes = array();
        $fecha_y_paciente = array();

        if ($request->input('categorias') == 'prendas') {
            // dd($request->input());
            $pacientes = Paciente::get();
            $arreglo = array();
            foreach ($pacientes as $paciente) {
                $arreglo = array_merge($arreglo, array($paciente->id => $paciente->totalProductos()));
            }
            $dataList = array_count_values($arreglo);
            // dd($dataList);
        }

        if ($request->input('categorias') == 'sku') {

            $skus = DB::table('productos')
                ->select('sku')
                ->groupBy('sku')
                ->get();

            // $arreglo_pacientes_id = array();

            foreach ($skus as $sku) {
                $productos = Producto::where('sku', $sku->sku)->get();
                $num_pacientes_de_sku = [];

                foreach ($productos as $producto) {
                    $ventas = $producto->ventas()->get();

                    foreach ($ventas as $venta) {
                        $num_pacientes_de_sku[] = $venta->paciente_id;
                    }
                    // dd($num_pacientes_de_sku);
                }

                $num_pacientes_de_sku = array_unique($num_pacientes_de_sku);
                $nuevo_array = array($sku->sku => count($num_pacientes_de_sku));
                $sku_y_num_pacentes = array_merge($sku_y_num_pacentes, $nuevo_array);
            }
            // dd($sku_y_num_pacentes);
        }

        if ($request->input('categorias') == 'primeraVez') {
            $pacientes = Paciente::noCompradores()->where('created_at', '>=', $fechaInicial)->where('created_at', '<=', $fechaFinal)->get();

            return $pacientes;

            foreach ($pacientes as $paciente) { }
        }

        return view('reportes.pacientes', compact('dataList', 'sku_y_num_pacentes', 'pacientes'));
    }

    public function siete()
    {
        return view('reportes.productos');
    }
}
