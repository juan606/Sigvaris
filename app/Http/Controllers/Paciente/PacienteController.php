<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Doctor;
use App\Nivel;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::get();
        return view('paciente.index', ['pacientes'=> $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles = Nivel::get();
        return view('paciente.create', ['niveles'=>$niveles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = Paciente::create($request->all());
        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show($paciente)
    {
        $temp = Paciente::find($paciente);
        return view('paciente.show',['paciente'=>$temp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit($paciente)
    {
        $temp = Paciente::find($paciente);
        $niveles = Nivel::get();
        return view('paciente.edit',['paciente'=>$temp, 'niveles'=>$niveles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paciente)
    {
        $temp = Paciente::find($paciente);
        $temp->update($request->all());
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy($paciente)
    {
        $temp = Paciente::find($paciente);
        $temp->delete();
        $pacientes = Paciente::get();
        return view('paciente.index', ['pacientes'=>$pacientes]);
    }
}
