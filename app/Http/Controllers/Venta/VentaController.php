<?php

namespace App\Http\Controllers\Venta;

use App\Venta;
use App\Paciente;
use App\Producto;
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

    public function indexXPaciente(Paciente $paciente){
        dd('camp');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::get();
        $pacientes = Paciente::get();
        return view('venta.create', ['pacientes'=>$pacientes, 'productos'=>$productos,'folio'=>Venta::count()+1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new Venta($request->all());
        // dd($request->producto_id);
        $total = 0.00;
        foreach ($request->producto_id as $key=>$producto_id) {
            $producto= Producto::find($producto_id);
            // dd($key);
            // $venta->productos()->attach($producto->id,['cantidad'=>$request->cantidad])
            $precio= (float)$producto->precio*(float)$request->cantidad[$key];
            $total += $precio;
        }
        $venta->total = $total;
        $venta->save();
        foreach ($request->producto_id as $key=>$producto_id) {
            $producto= Producto::find($producto_id);
            // dd($producto);
            $venta->productos()->attach($producto->id,['cantidad'=>$request->cantidad[$key]]);
            $precio= (float)$producto->precio*(float)$request->cantidad;
            $total += $precio;
        }
        // dd($total);
        // $venta->total = 
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
