<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\PacientesExpedientes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use UxWeb\SweetAlert\SweetAlert as Alert;

class PacienteExpedienteController extends Controller
{
     public function index(Paciente $paciente)
    {
        $expediente = $paciente->expediente;
        if ($expediente == null) {
            return view('pacineteexpediente.create',['paciente'=>$paciente]);
            //return redirect()->route('pacineteexpediente.create',['paciente'=>$paciente]);
        }
        else {
            return view('pacineteexpediente.view',['paciente'=>$paciente, 'expediente'=>$expediente]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        return view('pacineteexpediente.create', ['paciente' => $paciente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Paciente $paciente)
    {
        if ($request->receta && $request->file('receta')->isValid()) {
            $receta = explode("/",$request->receta->storeAs('expedientes/'.$paciente->id, 'receta.'.$request->receta->extension(), 'public'));
        }
        if ($request->aviso_privacidad && $request->file('aviso_privacidad')->isValid()) {
            $aviso_privacidad = explode("/",$request->aviso_privacidad->storeAs('expedientes/'.$paciente->id, 'aviso_privacidad.'.$request->aviso_privacidad->extension(), 'public'));
        }
        if ($request->identificacion && $request->file('identificacion')->isValid()) {
            $identificacion = explode("/",$request->identificacion->storeAs('expedientes/'.$paciente->id, 'identificacion.'.$request->identificacion->extension(), 'public'));
        }
        if ($request->inapam && $request->file('inapam')->isValid()) {
            $inapam = explode("/",$request->inapam->storeAs('expedientes/'.$paciente->id, 'inapam.'.$request->inapam->extension(), 'public'));
        }


        $expediente = PacientesExpedientes::Create([
            'paciente_id'=>$paciente->id,
            'receta'=>$receta[2],
            'aviso_privacidad'=>$aviso_privacidad[2],
            'identificacion'=>$identificacion[2],
            'inapam'=>$inapam[2]
        ]);
        Alert::success('Información Agregada', 'Se ha registrado correctamente la información');
        return view('pacineteexpediente.view',['paciente'=>$paciente,'expediente'=>$expediente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EmpleadoExpediente  $empleadoExpediente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente, PacientesExpedientes $empleadoExpediente)
    {
        return view('pacineteexpediente.view',['paciente'=>$paciente,'expediente'=>$paciente->expediente]);
    }
}
