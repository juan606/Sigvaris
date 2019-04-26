<?php

namespace App\Http\Controllers\Venta;

use App\Venta;
use App\Paciente;
use App\Producto;
use App\Descuento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index', ['ventas'=>Venta::get()]);
    }

    public function indexConPaciente(Paciente $paciente){
        return view('venta.index', ['ventas'=>$paciente->ventas,'paciente'=>$paciente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $descuentos = Descuento::get();
        $productos = Producto::get();
        $pacientes = Paciente::get();
        return view('venta.create', ['pacientes'=>$pacientes, 'paciente'=>null, 'descuentos'=>$descuentos ,'productos'=>$productos,'folio'=>Venta::count()+1]);
    }

    public function createConPaciente(Paciente $paciente){
        $descuentos = Descuento::get();
        $productos = Producto::get();
        $pacientes = Paciente::get();
        return view('venta.create', ['pacientes'=>$pacientes, 'paciente'=>$paciente, 'descuentos'=>$descuentos, 'productos'=>$productos,'folio'=>Venta::count()+1]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $venta = Venta::create($request->all());
        for($i = 0; $i < sizeof($request->cantidad); $i++){
            $venta->productos()->attach($request->producto_id[$i], ['cantidad'=>$request->cantidad[$i]]);
        }
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        return view('venta.show', ['venta'=>$venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        return view('venta.edit', ['venta'=>$venta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $venta->update($request->all());
        return view('venta.show',['venta'=>$venta]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
