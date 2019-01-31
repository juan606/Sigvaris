<?php

namespace App\Http\Controllers\Paciente;

use App\Consultorio;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteTallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($paciente)
    {
        $pacientee = Paciente::find($paciente);
        //dd($pacientee);
        return view('pacientetalla.index', ['paciente'=>$pacientee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pacientee)
    {
        $paciente = Paciente::find($pacientee);
        return view('pacientetalla.create', ['paciente'=>$paciente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $paciente)
    {
        $paciente = Paciente::find($paciente);
        $paciente->tallas()->create($request->all());
        return view('pacientetalla.index', ['paciente'=>$paciente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultorio  $talla
     * @return \Illuminate\Http\Response
     */
    public function show($paciente, $talla)
    {
        $consul = Consultorio::find($talla);
        return view('pacientetalla.show', ['paciente'=>$consul->consultable, 'talla'=>$consul]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultorio  $talla
     * @return \Illuminate\Http\Response
     */
    public function edit($paciente, $talla)
    {
        $consul = Consultorio::find($talla);
        return view('pacientetalla.edit', ['paciente'=>$consul->consultable,'talla'=>$consul]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultorio  $talla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paciente, $talla)
    {
        $consul = Consultorio::find($talla);
        $consul->nombre = $request->input('nombre');
        $consul->direccion = $request->input('direccion');
        $consul->secretaria = $request->input('secretaria');
        $consul->tel1 = $request->input('tel1');
        $consul->tel2 = $request->input('tel2');
        $consul->tel3 = $request->input('tel3');
        $consul->mail = $request->input('mail');
        $consul->desde = $request->input('desde');
        $consul->hasta = $request->input('hasta');
        $consul->save();
        return redirect()->route('pacientees.tallas.index', ['paciente'=>$consul->consultable]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultorio  $talla
     * @return \Illuminate\Http\Response
     */
    public function destroy($paciente, $talla)
    {
        $consul = Consultorio::find($talla);
        $consul->delete();
        return redirect()->route('pacientees.tallas.index', ['paciente'=>$paciente]);
    }
}
