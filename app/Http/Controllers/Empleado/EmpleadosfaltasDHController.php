<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\EmpleadoFalta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadosfaltasDHController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $faltas = $empleado->faltas;
        
        $meses = array(
            "01" => "enero",
            "02" => "febrero",
            "03" => "marzo",
            "04" => "abril",
            "05" => "mayo",
            "06" => "junio",
            "07" => "enero",
            "08" => "febrero",
            "09" => "marzo",
            "10" => "octubre",
            "11" => "mayo",
            "12" => "junio"
        );

        $mes_actual = $meses[date('m')];

        return view('empleadovacaciones.falta',['empleado'=>$empleado,'faltas'=>$faltas, 'mes_actual' => $mes_actual]);
    }

    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create(Empleado $empleado)
    {
        //
        //$vacaciones = new EmpleadosVacaciones;
        // $edit = false;
        // return view('empleadosvacaciones.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Empleado $empleado)
    {
        //


        $falta = new EmpleadoFalta($request->all());
        $empleado->faltas()->save($falta);

        $total_retardos_este_mes = count($empleado->faltas()->where('tipofalta', 'like', '%retardo%')->whereMonth('fecha', date('m'))->get());
        $num_faltas_por_retardos_que_deberia = intdiv( $total_retardos_este_mes, 3 );
        $num_faltas_por_retardos_que_tiene = count($empleado->faltas()->where('tipofalta', 'falta por retardos')->whereMonth('fecha', date('m'))->get());

        // dd($num_faltas_por_retardos_que_tiene);
        if( $num_faltas_por_retardos_que_tiene < $num_faltas_por_retardos_que_deberia ){
            // dd( $num_faltas_por_retardos_que_tiene . '<' . $num_faltas_por_retardos_que_deberia );
            EmpleadoFalta::create([
                'empleado_id' => $empleado->id,
                'fecha' => $request->fecha,
                'tipofalta' => 'falta por retardos',
                'motivo' => 'Retardos acumulados'
            ]);

        }

        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return redirect()->route('empleados.vacaciones.index',['empleado'=>$empleado]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }
     public function actualizar(Request $request)
    {
        $falta = EmpleadoFalta::find( $request->falta_id );
        // dd($falta);

        $falta->update($request->all());
        
        return redirect()->back()->with('status','¡La falta ha sido actualizada!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
