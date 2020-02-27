<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Empleado $empleado)
    {
        $estudios = $empleado->estudios;
        $cursos = Curso::where('id_empleado',$empleado->id)->get();
        //dd($cursos);
        if ($estudios == null) {
            # code...
            return redirect()->route('empleados.estudios.create',['empleado'=>$empleado,'cursos'=>$cursos ]);
        } else {
            # code...
            return view('certificaciones.index',['empleado'=>$empleado, 'estudios'=>$estudios,'cursos'=> $cursos]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Empleado $empleado)
    {
        $estudios = $empleado->estudios;
        $cursos = Curso::where('id_empleado',$empleado->id)->get();
        //dd($cursos);
        if ($estudios == null) {
            # code...
            return redirect()->route('empleados.estudios.create',['empleado'=>$empleado,'cursos'=>$cursos ]);
        } else {
            # code...
            return view('certificaciones.create',['empleado'=>$empleado, 'estudios'=>$estudios,'cursos'=> $cursos]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Empleado $empleado,Request $request)
    {
        $curso = Curso::create($request->input());
        
         $estudios = $empleado->estudios;
        $cursos = Curso::where('id_empleado',$empleado->id)->get();
        //dd($cursos);
        if ($estudios == null) {
            # code...
            return redirect()->route('empleados.estudios.create',['empleado'=>$empleado,'cursos'=>$cursos ]);
        } else {
            # code...
            return view('certificaciones.index',['empleado'=>$empleado, 'estudios'=>$estudios,'cursos'=> $cursos]);
        }
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
    public function destroy(Empleado $empleado,$id)
    {
        Curso::find($id)->delete();

         $estudios = $empleado->estudios;
        $cursos = Curso::where('id_empleado',$empleado->id)->get();
        //dd($cursos);
        if ($estudios == null) {
            # code...
            return redirect()->route('empleados.estudios.create',['empleado'=>$empleado,'cursos'=>$cursos ]);
        } else {
            # code...
            return view('certificaciones.index',['empleado'=>$empleado, 'estudios'=>$estudios,'cursos'=> $cursos]);
        }
    }
}
