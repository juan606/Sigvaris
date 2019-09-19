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

        $pacientes_sin_compra = null;
        $fechas_pacientes_sin_compra = null;
        $num_pacientes_por_fecha = null;

        if ($request->input()) {
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');
            $pacientes_sin_compra = Paciente::noCompradores()
                ->where('created_at', '>=', $fechaInicial)
                ->where('created_at', '<=', $fechaFinal)
                ->orderBy('created_at', 'asc')
                ->get();

            // ARREGLO DE FECHAS DE LOS PACIENTES QUE NO COMPRARON
            $fechas_pacientes_sin_compra = $pacientes_sin_compra;
            $fechas_pacientes_sin_compra = $fechas_pacientes_sin_compra->pluck('created_at')->flatten();
            $fechas_pacientes_sin_compra->transform(function ($fecha) {
                return $fecha->format('Y-m-d');
            });

            $num_pacientes_por_fecha = $fechas_pacientes_sin_compra->map(function ($fecha, $key) {
                return count(Paciente::noCompradores()->where('created_at', 'LIKE', '%' . $fecha . '%')->get());
            });
        }

        return view('reportes.uno', compact('pacientes_sin_compra', 'fechas_pacientes_sin_compra', 'num_pacientes_por_fecha'));
    }

    public function dos(Request $request)
    {

        if ($request->input()) {
            // return Paciente::find(2)->ventas()->with('productos')->get()->pluck('productos')->flatten();

            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');
            // $ventas = Venta::
            //     where('fecha','>=',$fechaInicial)->with('productos')->with('paciente')->where('fecha','<=',$fechaFinal)->get();
            // return $ventas;

            $ventasPorFechaPorPaciente = Venta::where('fecha', '>=', $fechaInicial)->where('fecha', '<=', $fechaFinal)->withCount('productos')->get()->groupBy('paciente_id')
                ->transform(function ($item, $k) {
                    return $item->groupBy(function ($date) {
                        return Carbon::parse($date->fecha)->format('Y-m-d'); // grouping by years
                        //return Carbon::parse($date->created_at)->format('m'); // grouping by months
                    });
                });

            foreach ($ventasPorFechaPorPaciente as $venta) {
                $prendasVendidasPorPaciente =  $venta->pluck('productos_count')->flatten()->sum();
                // return $prendas;
                // return array_sum($prendas);
            }

            // return $ventasPorFechaPorPaciente;

            return view('reportes.dos', compact('ventasPorFechaPorPaciente'));
        }

        return view('reportes.dos');
    }

    public function tres(Request $request)
    {

        $ventas = null;
        $rangoDias = null;

        if ($request->input()) {

            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            $currentDate = strtotime($fechaInicial);
            $rangoDias = [];

            while ($currentDate <= strtotime($fechaFinal)) {
                $formatted = date("Y-m-d", $currentDate);
                $currentDate = strtotime("+1 day", $currentDate);
                $rangoDias[] = $formatted;
            }

            $ventas = Venta::where('fecha', '>=', $request->input('fechaInicial'))
                ->where('fecha', '<=', $request->input('fechaFinal'))
                ->with('productos')
                ->get();

            // return $ventas;
        }

        return view('reportes.tres', compact('ventas', 'rangoDias'));
    }

    public function cuatroa(Request $request)
    {

        $comprasPorCliente = array();

        if ($request->input()) {
            // dd($request->input(''));
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            $pacientesConCompra = Paciente::has('ventas')->get();

            foreach ($pacientesConCompra as $paciente) {
                $comprasPorCliente[] = count(
                    $paciente->ventas()->where('fecha', '>=', $fechaInicial)->where('fecha', '<=', $fechaFinal)->with('productos')->get()->pluck('productos')->flatten()
                );
            }

            // dd(array_count_values($comprasPorCliente));
            $comprasPorCliente = array_count_values($comprasPorCliente);
        }

        return view('reportes.cuatroa',compact('comprasPorCliente'));
    }

    public function cuatrob(Request $request)
    {

        if ($request->input()) {

            // dd($request->input());

            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            $skus = Producto::distinct()->pluck('sku')->all();

            $ventas = Venta::where('fecha', '>=', $fechaInicial)
                ->where('fecha', '<=', $fechaFinal)
                ->with('productos')
                ->with('paciente')
                ->get();

            // return $ventas;

            $ventas = $ventas->groupBy('fecha');

            // return $ventas;

            $ventas = $ventas->transform(function ($item, $k) {
                return $item->groupBy('productos_id');
            });

            return $ventas;
        }

        return view('reportes.cuatrob');
    }

    public function cuatroc(Request $request)
    {

        $meses = null;
        $anios = null;
        $skus = null;
        $arrayMesesYAnios = array();
        $totalVentasPorMesYAnio = array();

        if ($request->input()) {
            $meses = $request->input('mes');
            $anios = $request->input('anio');

            for ($i = 0; $i < count($meses); $i++) {
                $arrayMesesYAnios[] = $meses[$i] . "-" . $anios[$i];

                $totalVentasPorMesYAnio[] = count(Venta::whereYear('fecha', $anios[$i])->whereMonth('fecha', $meses[$i])->with('productos')->get()->pluck('productos')->flatten());
                // $totalVentasPorMesYAnio[] = count( Venta::whereYear('') );

            }

            // dd($totalVentasPorMesYAnio);

            $skus = array_unique(Producto::pluck('sku')->toArray());
        }

        return view('reportes.cuatroc', compact('meses', 'anios', 'skus','totalVentasPorMesYAnio','arrayMesesYAnios'));
    }

    public function cuatrod(Request $request)
    {

        $anioInicial = null;
        $anioFinal = null;
        $aniosSolicitados = null;
        $productosPorAnio = null;
        $aniosYProductosPorMes = array();
        $meses = array(
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre'
        );

        if ($request->input()) {
            $anioInicial = $request->input('anioInicial');
            $anioFinal = $request->input('anioFinal');

            // ARREGLO DE AÑOS SOLICITADOS
            $aniosSolicitados = [];
            for ($i = $anioInicial; $i <= $anioFinal; $i++) {
                $aniosSolicitados[] = (int) $i;

                $productosPorMes = [];

                foreach ($meses as $key => $mes) {
                    $productosPorMes[] = count(Venta::whereYear('fecha', $i)->whereMonth('fecha', $key)->get()->pluck('productos')->flatten());
                }

                array_push($aniosYProductosPorMes, array($i => $productosPorMes));
            }
        }

        // dd($aniosYProductosPorMes);

        return view('reportes.cuatrod', compact('anioInicial', 'anioFinal', 'meses', 'aniosSolicitados', 'productosPorAnio', 'aniosYProductosPorMes'));
    }

    public function cinco(Request $request)
    {

        $pacientes = null;
        $anios = [];
        $aniosPacientes = [];
        $meses = [];
        $opcion = null;
        $numPacientesPorAnio = null;

        if ($request->input()) {
            $opcion = $request->input('opciones');
            $anioInicial = $request->input('anioInicial');
            $anioFinal = $request->input('anioFinal');

            // Obtenemos los años validos
            for ($i = $anioInicial; $i <= $anioFinal; $i++) {
                $anios[] = $i;

                if ($opcion == 'primeraVez') {
                    $numPacientesPorAnio[] = count(Paciente::whereYear('created_at', $i)->doesnthave('ventas')->get());
                }

                if ($opcion == 'recompra') {
                    $numPacientesPorAnio[] = count(Paciente::whereYear('created_at', $i)->has('ventas')->get());
                }
            }

            // dd($numPacientesPorAnio);
            $meses = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
        }

        return view('reportes.cinco', compact('pacientes', 'anios', 'meses', 'opcion', 'numPacientesPorAnio'));
    }

    public function nueve(Request $request)
    {

        if ($request->input()) {
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            $ventasPorSku = Venta::where('fecha', '>=', $fechaInicial)
                ->where('fecha', '<=', $fechaFinal)
                ->with('productos')->get()
                ->pluck('productos')->flatten()->groupBy('sku');

            // with('productos')->get()->pluck('productos')->flatten()

            return view('reportes.nueve', compact('ventasPorSku'));
        }

        return view('reportes.nueve');
    }

    public function diez(Request $request)
    {

        $doctores = Paciente::with('doctor')->get()->pluck('doctor')->flatten()->groupBy('id');
        $pacientesPorDoctor = null;
        $numRecomendadosPorDoctor = null;
        $nombresDoctores = null;
        $nombresDoctores = null;

        if ($request->input()) {
            $fechaInicial = $request->input('fechaInicial');
            $fechaFinal = $request->input('fechaFinal');

            // DOCTORES QUE SE ENCUENTRAN EN LAS FECHAS SOLICITADAS
            $doctores = Paciente::where('updated_at', '>=', $fechaInicial)
                ->where('updated_at', '<=', $fechaFinal . " 23:59:59")
                ->with('doctor')
                ->orderBy('id')
                ->get()
                ->pluck('doctor')
                ->flatten()
                ->groupBy('id');

            // NUM. DE RECOMENDACION POR DOCTOR
            $numRecomendadosPorDoctor = [];
            foreach ($doctores as $key => $doctor) {
                $numRecomendadosPorDoctor[] = Doctor::find($key)
                    ->pacientes()
                    ->where('updated_at', '>=', $fechaInicial)
                    ->where('updated_at', '<=', $fechaFinal . " 23:59:59")
                    ->get()
                    ->count();
            }

            // NOMBRES DOCTORES:
            $nombresDoctores = [];
            foreach ($doctores as $doctor_id => $value) {
                $nombresDoctores[] = Doctor::find($doctor_id)->nombre . " " . Doctor::find($doctor_id)->apellidopaterno . " " . Doctor::find($doctor_id)->apellidomaterno . " ";
            }
            // dd($nombresDoctores);

            // $nombresDoctores = $nombresDoctores->toArray();
        }

        // $doctores = $doctores->toArray();
        return view('reportes.diez', compact('doctores', 'pacientesPorDoctor', 'numRecomendadosPorDoctor', 'nombresDoctores'));
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
