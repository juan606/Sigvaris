<?php

namespace App\Http\Controllers\Doctor;

use App\Consultorio;
use App\Doctor;
use App\Hospital;
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
        $hospitals = Hospital::get();
        $doctor = Doctor::find($doctore);
        return view('doctorconsultorio.create', ['doctor'=>$doctor, 'hospitals'=>$hospitals]);
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
    public function show($doctor, $consultorio)
    {
        $consul = Consultorio::find($consultorio);
        return view('doctorconsultorio.show', ['doctor'=>$consul->consultable, 'consultorio'=>$consul]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function edit($doctor, $consultorio)
    {
        $hospitals = Hospital::get();
        $consul = Consultorio::find($consultorio);
        return view('doctorconsultorio.edit', ['doctor'=>$consul->consultable,'consultorio'=>$consul, 'hospitals'=>$hospitals]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultorio  $consultorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $doctor, $consultorio)
    {
        $consul = Consultorio::find($consultorio);
        $consul->update($request->all());
        return redirect()->route('doctores.consultorios.index', ['doctor'=>$consul->consultable]);
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
