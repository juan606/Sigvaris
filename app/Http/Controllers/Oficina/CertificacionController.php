<?php

namespace App\Http\Controllers\Oficina;

use App\Oficina;
use App\Certificacionestienda;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Oficina $oficina)
    {
        $cursos = Certificacionestienda::where("oficina_id",$oficina->id)->get();
        return view('certificacionesTienda.index', ['oficina'=>$oficina,'cursos'=>$cursos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Oficina $oficina)
    {
        $cursos = Certificacionestienda::where("oficina_id",$oficina->id)->get();
        return view('certificacionesTienda.create', ['oficina'=>$oficina,'cursos'=>$cursos ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Oficina $oficina)
    {
        $curso = Certificacionestienda::create($request->input());

        $cursos = Certificacionestienda::where("oficina_id",$oficina->id)->get();
        return view('certificacionesTienda.index', ['oficina'=>$oficina,'cursos'=>$cursos ]);
        //return redirect()->route('certificacionesTienda.index')->with('success','El curso ha sido creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficina $oficina,$id)
    {
        Certificacionestienda::find($id)->delete();

       $cursos = Certificacionestienda::where("oficina_id",$oficina->id)->get();
        return view('certificacionesTienda.index', ['oficina'=>$oficina,'cursos'=>$cursos ]);
    }
}
