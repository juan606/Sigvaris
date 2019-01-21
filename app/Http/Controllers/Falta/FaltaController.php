<?php

namespace App\Http\Controllers\Falta;

use App\Falta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaltaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faltas = Falta::get();
        return view('faltas.index',['faltas'=>$faltas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('faltas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Falta::create($request->all());
        return redirect('faltas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function show(Falta $falta)
    {
        //
        // return view('faltas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function edit(Falta $falta)
    {
        //
        return view('faltas.edit',['falta'=>$falta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Falta $falta)
    {
        //
        $falta->update($request->all());
        return redirect('faltas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Falta  $falta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Falta $falta)
    {
        //
        // var_dump($falta);
        // $falta = Falta::findoorFail($falta);
        // Falta::destroy($falta);
        $falta->delete();
        return  redirect('faltas');
    }
    public function buscar(Request $request){
        $query = $request->input('query');
        $wordsquery = explode(' ',$query);
        $faltas = Falta::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
                $q->orWhere('nombre','LIKE',"%$word%")
                    ->orWhere('etiqueta','LIKE',"%$word%");
            }
        })->paginate(10);
        return view('faltas.index',['faltas'=>$faltas]);
    }

          public function getFaltas(){
        $faltas = Falta::get();
        return view('precargas.select',['precargas'=>$faltas]);
    }
}
