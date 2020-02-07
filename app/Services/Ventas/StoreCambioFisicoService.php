<?php

namespace App\Services\Ventas;

use App\Producto;
use Illuminate\Http\Request;

class StoreCambioFisicoService
{

    protected $productoEntregado;
    protected $productoDevuelto;

    public function __construct(Request $request)
    {
        $this->setProductoEntregado($request);
        $this->setProductoDevuelto($request);
        $this->actualizarInventario();
        dd($this->productoDevuelto);
    }

    /**
     * =======
     * METHODS
     * =======
     */

    public function actualizarInventario()
    {
        $this->productoEntregado->update([
            'stock' => $this->productoEntregado->stock - 1
        ]);
        $this->productoDevuelto->update([
            'stock' => $this->productoDevuelto->stock + 1
        ]);
    }

    /**
     * =======
     * SETTERS
     * =======
     */

    public function setProductoEntregado($request)
    {
        $this->productoEntregado = Producto::where('sku', $request->skuProductoEntregado)->first();
    }

    public function setProductoDevuelto($request)
    {
        $this->productoDevuelto = Producto::where('sku', $request->skuProductoRegresado)->first();
    }
}
