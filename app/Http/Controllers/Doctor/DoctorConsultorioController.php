<?php

namespace App\Http\Controllers\Doctor;

use App\Consultorio;
use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($doctor)
    {
        $doctore = Doctor::find($doctor);
        return view('doctorconsultorio.index', ['doctor'=>$doctore]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($doctore)
    {
        $doctor = Doctor::find($doctore);
        return view('doctorconsultorio.create', ['doctor'=>$doctor]);
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
        $doc->consultorios()->create($request->all());
        return view('doctorconsultorio.index', ['doctor'=>$doc]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function show(Consultorio $consultorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultorio $consultorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultorio $consultorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($doctor, $consultorio)
    {
        $consul = Consultorio::find($consultorio);
        $consul->delete();
        return redirect()->route('doctores.consultorios.index', ['doctor'=>$doctor]);
    }
}
