<?php

namespace App\Http\Controllers\Paciente;

use App\Crm;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteCrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::get();
        $crms = Crm::get();
        return view('crm.index', ['crms'=>$crms, 'pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $crm = Crm::create($request->all());
        if($crm){
            Alert::success('Crm registrado subido correctamente.');
            return redirect()->route('crm.index');
        }else{
            Alert::error('Error al registrar crm.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function show(Crm $crm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function edit(Crm $crm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crm $crm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crm $crm)
    {
        //
    }

    public function getCrmCliente(Paciente $paciente){
        return view('pacientecrm.index', ['paciente'=>$paciente]);
    }
}
