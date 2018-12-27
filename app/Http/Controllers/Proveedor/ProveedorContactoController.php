<?php

namespace App\Http\Controllers\Proveedor;

use App\Proveedor;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\ContactoProveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Proveedor $proveedore)
    {
        //
        $contactos = $proveedore->contactosProveedor;
        // dd($contactos);
        return view('proveedores.contacto.index', ['proveedore'=>$proveedore, 'contactos'=>$contactos]);

    }

    public function busqueda(){
        $contactos = $proveedore->contactosProveedor;
        // dd($contactos);
        return view('proveedores.contacto.busqueda', ['proveedore'=>$proveedore, 'contactos'=>$contactos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Proveedor $proveedore)
    {
        //
        return view('proveedores.contacto.create',['proveedore'=>$proveedore]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Proveedor $proveedore)
    {
        //
        $contacto = ContactoProveedor::create($request->all());
        Alert::success('Contacto creado con éxito');

        return redirect()->route('proveedores.contacto.index', ['proveedore'=>$proveedore]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedore,$contacto)
    {
        //
        $contacto = ContactoProveedor::findOrFail($contacto);
        return view('proveedores.contacto.view',['proveedore'=>$proveedore, 'contacto'=>$contacto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedore, $contacto)
    {
        //
        $contacto = ContactoProveedor::findOrFail($contacto);
        return view('proveedores.contacto.edit',['proveedore'=>$proveedore, 'contacto'=>$contacto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedore, $contacto)
    {
        //
        $contacto = ContactoProveedor::findOrFail($contacto);
        $contacto->update($request->all());
        Alert::success('Contacto actualizado con éxito');
        return redirect()->route('proveedores.contacto.index',['proveedore'=>$proveedore]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
