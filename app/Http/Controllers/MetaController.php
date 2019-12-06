<?php

namespace App\Http\Controllers;

use App\FitterMeta;
use Illuminate\Http\Request;

class MetaController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FitterMeta::create([
            "monto_venta" => $request->monto_venta,
            "num_pacientes_recompra" => $request->num_pacientes_recompra,
            "numero_recompras" => $request->numero_recompras,
            "fecha_inicio" => $request->fecha_inicio."-01",
            "empleado_id" => $request->empleado_id,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        FitterMeta::find($id)->update([
            "monto_venta" => $request->monto_venta,
            "num_pacientes_recompra" => $request->num_pacientes_recompra,
            "numero_recompras" => $request->numero_recompras,
            "fecha_inicio" => date_format(date_create($request->fecha_inicio), 'Y-m-01'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
