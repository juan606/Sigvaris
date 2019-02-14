<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Talla;
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
        $tallat = Talla::find($talla);
        return view('pacientetalla.show', ['paciente'=>$tallat->paciente, 'talla'=>$tallat]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultorio  $talla
     * @return \Illuminate\Http\Response
     */
    public function edit($paciente, $talla)
    {
        $tallat = Talla::find($talla);
        
        //dd($tallat);
        return view('pacientetalla.edit', ['paciente'=>$tallat->paciente,'talla'=>$tallat]);
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
        $talla = Talla::find($talla);
        $talla->pierna = $request->input('pierna');
        $talla->brazo = $request->input('brazo');
        $talla->tobimedia = $request->input('tobimedia');
        $talla->media = $request->input('media');
        $talla->pantimedia = $request->input('pantimedia');
        $talla->calcetin = $request->input('calcetin');
        $talla->pantorrillera = $request->input('pantorrillera');
        $talla->circunferencia_tobillo_izq = $request->input('circunferencia_tobillo_izq');
        $talla->circunferencia_tobillo_dcha = $request->input('circunferencia_tobillo_dcha');
        $talla->circunferencia_pantorrilla_izq = $request->input('circunferencia_pantorrilla_izq');
        $talla->circunferencia_pantorrilla_dcha = $request->input('circunferencia_pantorrilla_dcha');
        $talla->altura_pantorrilla_izq = $request->input('altura_pantorrilla_izq');
        $talla->altura_pantorrilla_dcha = $request->input('altura_pantorrilla_dcha');
        $talla->circunferencia_muslo_izq = $request->input('circunferencia_muslo_izq');
        $talla->circunferencia_muslo_dcha = $request->input('circunferencia_muslo_dcha');
        $talla->altura_pierna_izq = $request->input('altura_pierna_izq');
        $talla->altura_pierna_dcha = $request->input('altura_pierna_dcha');
        $talla->circunferencia_cadera = $request->input('circunferencia_cadera');
        $talla->calzado_izq = $request->input('calzado_izq');
        $talla->calzado_dcha = $request->input('calzado_dcha');
        $talla->peso = $request->input('peso');
        $talla->estatura = $request->input('estatura');
        $talla->guante = $request->input('guante');
        $talla->circunferencia_plama_izq = $request->input('circunferencia_plama_izq');
        $talla->circunferencia_plama_dcha = $request->input('circunferencia_plama_dcha');
        $talla->circunferencia_munieca_izq = $request->input('circunferencia_munieca_izq');
        $talla->circunferencia_munieca_dcha = $request->input('circunferencia_munieca_dcha');
        $talla->circunferencia_media_izq = $request->input('circunferencia_media_izq');
        $talla->circunferencia_media_dcha = $request->input('circunferencia_media_dcha');
        $talla->talla_izq = $request->input('talla_izq');
        $talla->talla_dcha = $request->input('talla_dcha');
        $talla->sexo = $request->input('sexo');
        $talla->save();
        return redirect()->route('pacientes.tallas.index', ['paciente'=>$talla->paciente]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultorio  $talla
     * @return \Illuminate\Http\Response
     */
    public function destroy($paciente, $talla)
    {
        $consul = Talla::find($talla);
        $consul->delete();
        return redirect()->route('pacientes.tallas.index', ['paciente'=>$paciente]);
    }
}
