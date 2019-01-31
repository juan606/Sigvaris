<?php

namespace App\Http\Controllers\Paciente;

use App\RegistroHistorial;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteHistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paciente)
    {
        $pacientee = Paciente::find($paciente);
        return view('pacientehistorial.index', ['paciente'=>$pacientee]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RegistroHistorial  $registroHistorial
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroHistorial $registroHistorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RegistroHistorial  $registroHistorial
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroHistorial $registroHistorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RegistroHistorial  $registroHistorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegistroHistorial $registroHistorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RegistroHistorial  $registroHistorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroHistorial $registroHistorial)
    {
        //
    }
}
