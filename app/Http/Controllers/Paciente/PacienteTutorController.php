<?php

namespace App\Http\Controllers\Paciente;

use App\Tutor;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteTutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paciente)
    {   
        $paci = Paciente::find($paciente);
        return view('pacientetutor.index', ['paciente'=>$paci]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($paciente)
    {
        $paci = Paciente::find($paciente);
        return view('pacientetutor.create',['paciente'=>$paci]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $paciente)
    {
        $paci = Paciente::find($paciente);
        $paci->tutor()->create($request->all());
        return view('pacientetutor.index', ['paciente'=>$paci]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit($paciente, $tutor)
    {
        $tuto = Tutor::find($tutor);
        return view('pacientetutor.edit', ['paciente'=>$tuto->paciente,'tutor'=>$tuto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paciente, $tutor)
    {

        $tuto = Tutor::find($tutor);
        $tuto->nombre = $request->input('nombre');
        $tuto->paterno = $request->input('paterno');
        $tuto->materno = $request->input('materno');
        $tuto->relacion = $request->input('relacion');
        $tuto->save();
        return redirect()->route('pacientes.tutores.index', ['paciente'=>$tuto->paciente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy($paciente, $tutor)
    {
        $tuto = Tutor::find($tutor);
        $tuto->delete();
        return redirect()->route('pacientes.tutores.index', ['paciente'=>$paciente]);
    }
}
