<?php

namespace App\Http\Controllers\Doctor;

use App\Premio;
use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorPremioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($doctor)
    {
        $doctore = Doctor::find($doctor);
        return view('doctorpremio.index', ['doctor'=>$doctore]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($doctore)
    {
        $doctor = Doctor::find($doctore);
        return view('doctorpremio.create', ['doctor'=>$doctor]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $doctor)
    {
        $doc = Doctor::find($doctor);
        $doc->premios()->create($request->all());
        return view('doctorpremio.index', ['doctor'=>$doc]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Premio  $premio
     * @return \Illuminate\Http\Response
     */
    public function show($doctor, $premio)
    {
        $prem = Premio::find($premio);
        return view('doctorpremio.show', ['doctor'=>$prem->doctor, 'premio'=>$prem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Premio  $premio
     * @return \Illuminate\Http\Response
     */
    public function edit($doctor, $premio)
    {
        $prem = Premio::find($premio);
        return view('doctorpremio.edit', ['doctor'=>$prem->doctor,'premio'=>$prem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Premio  $premio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doctor, $premio)
    {
        $prem = Premio::find($premio);
        $prem->nombre = $request->input('nombre');
        $prem->institucion = $request->input('institucion');
        $prem->otorga = $request->input('otorga');
        $prem->fecha = $request->input('fecha');
        $prem->save();
        return redirect()->route('doctores.premios.index', ['doctor'=>$prem->doctor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Premio  $premio
     * @return \Illuminate\Http\Response
     */
    public function destroy($doctor,  $premio)
    {
        $premi = Premio::find($premio);
        $premi->delete();
        return redirect()->route('doctores.premios.index', ['doctor'=>$doctor]);
    }
}
