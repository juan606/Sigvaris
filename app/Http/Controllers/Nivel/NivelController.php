<?php

namespace App\Http\Controllers\Nivel;

use App\Nivel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles = Nivel::get();
        return view('niveles.index', ['niveles'=>$niveles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('niveles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nivel::create($request->all());
        return redirect()->route('niveles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function show(Nivel $nivel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit(Nivel $nivele)
    {
        return view('niveles.edit', ['nivel'=>$nivele]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nivel $nivele)
    {
        $nivele->update($request->all());
        return redirect()->route('niveles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nivel $nivele)
    {
        $nivele->delete();
        return redirect()->route('niveles.index');
    }
}
