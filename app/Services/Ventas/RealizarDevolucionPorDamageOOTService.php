<?php

namespace App\Services\Ventas;

use App\HistorialCambioVenta;
use App\Producto;
use App\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealizarDevolucionPorDamageOOTService
{

    protected $venta;
    protected $productos;

    public function __construct(Request $request, Venta $venta)
    {
        // dd($request->input());
        $this->setVenta($venta);
        $this->setProductos($request);
        $this->anadirProductosAStock();
        $this->eliminarProductosDeLaVenta();
        $this->anadirHistorialCambio();
        // dd($this->productos);
    }

    /**
     * =======
     * METHODS
     * =======
     */

    public function eliminarProductosDeLaVenta(){
        foreach($this->productos as $producto){
            $this->venta
                ->productos()
                ->wherePivot('producto_id',$producto->id)
                ->detach();
        }
    }

    public function anadirHistorialCambio()
    {
        foreach($this->productos as $producto){
            HistorialCambioVenta::create([
                'tipo_cambio' => 'DAMAGE OOT',
                'responsable_id' => Auth::user()->id,
                'venta_id' => $this->venta->id,
                'producto_entregado_id' => null,
                'producto_devuelto_id' => $producto->id
            ]);
        }
    }

    public function anadirProductosAStock()
    {
        foreach ($this->productos as $producto) {
            $producto->update([
                'stock' => $producto->stock + 1
            ]);
        }
    }

    /**
     * =======
     * SETTERS
     * =======
     */

    public function setVenta($venta)
    {
        $this->venta = $venta;
    }

    public function setProductos($request)
    {
        $this->productos = Producto::find($request->idProductosSeleccionados);
    }
}
