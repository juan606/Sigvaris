<?php

namespace App\Http\Controllers\Proveedor;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Proveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProveedorController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->role->proveedores)
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
        //
        $proveedores = Proveedor::get();
        // Alert::message('Robots are working!');
        return view('proveedores.index', ['proveedores'=>$proveedores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedores.create');
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
        $proveedore = Proveedor::where('rfc',$request->rfc)->get();
        // dd(count($proveedore));
        if (count($proveedore) != 0) {
            # code...
            // alert()->error('Error Message', 'Optional Title');
            // return redirect()->route('clientes.create');
            Alert::message('Robots are working!');
            return view('proveedores.create');
        } else {
            # code...
            $proveedore = Proveedor::create($request->all());
            Alert::success("Proveedor creado con exito, sigue agregando información")->persistent("Cerrar");
            return redirect()->route('proveedores.direccionfisica.create',['proveedore'=>$proveedore]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proveedore  $proveedore
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedore)
    {
        
        return view('proveedores.view', ['proveedore'=>$proveedore]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedore)
    {
        //
        return view('proveedores.edit',['proveedore'=>$proveedore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedore)
    {
        
        $proveedore->update($request->all());
        Alert::success('Proveedor actualizado')->persistent("Cerrar");
        return redirect()->route('proveedores.show',['proveedore'=>$proveedore]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedore)
    {
        //
    }
    public function buscar(Request $request){
    // dd($request);
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $proveedores = Proveedor::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',           "%$word%")
                ->orWhere('apellidopaterno','LIKE',"%$word%")
                ->orWhere('apellidomaterno','LIKE',"%$word%")
                ->orWhere('razonsocial','LIKE',    "%$word%")
                ->orWhere('rfc','LIKE',            "%$word%")
                ->orWhere('alias','LIKE',          "%$word%")
                ->orWhere('tipopersona','LIKE',    "%$word%");
            }
        })->get();
    return view('proveedores.busqueda', ['proveedores'=>$proveedores]);
        

    }
}
