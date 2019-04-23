<?php

namespace App\Http\Controllers\Empleado;
use App\Empleado;
use App\EmpleadoBaja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class EmpleadoBajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        return view('empleado.baja',['empleado'=>$empleado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Empleado $empleado)
    {
        $baja=new EmpleadoBaja([
            'motivo'=>$request->motivo,
            'comentario'=>$request->comentario,
            'empleado_id'=>$empleado->id
        ]);
        $baja->save();
        $empleado->activo=0;
        $empleado->save();
        $empleados = Empleado::get();
        return view('empleado.index', ['empleados' => $empleados]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpleadoBaja  $empleadoBaja
     * @return \Illuminate\Http\Response
     */
    public function show(EmpleadoBaja $empleadoBaja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EmpleadoBaja  $empleadoBaja
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpleadoBaja $empleadoBaja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EmpleadoBaja  $empleadoBaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpleadoBaja $empleadoBaja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EmpleadoBaja  $empleadoBaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpleadoBaja $empleadoBaja)
    {
        //
    }
}
