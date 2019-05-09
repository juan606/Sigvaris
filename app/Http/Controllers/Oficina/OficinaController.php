<?php

namespace App\Http\Controllers\Oficina;

use App\Oficina;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;


class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->role->oficinas)
                {
                    return $next($request);
                }                
                return redirect('/inicio');
                 
            }
            return redirect('/');         
        });
    }
    public function index()
    {
        $oficinas = Oficina::get();
        return view('oficinas.index', ['oficinas'=>$oficinas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('oficinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Oficina::create($request->all());
        return redirect()->route('oficinas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function show(Oficina $oficina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficina $oficina)
    {
        return view('oficinas.edit', ['oficina'=>$oficina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficina $oficina)
    {
        $oficina->update($request->all());
        return redirect()->route('oficinas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Oficina  $oficina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficina $oficina)
    {        
        if($oficina->empleados->isEmpty() && $oficina->pacientes->isEmpty() && $oficina->ventas->isEmpty() )
        {
            $oficina->delete();
            return redirect()->route('oficinas.index');    
        }
        Alert::error('La oficina puede tener empleados, pacientes o ventas registradas', 'La oficina esta siendo usada');
        return $this->index();
        
    }
}
