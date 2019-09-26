<?php

namespace App\Services\Ventas;

use App\Producto;
use App\Venta;
use Carbon\Carbon;

class RealizarVentaProductosService
{

    public function make($venta, $productos, $request){

        // REALIZAMOS LA VENTA
        $venta->save();

        // POR CADA PRODUCTO COMPRADO, ALMACENAMOS LA CANTIDAD COMPRADO, EL PRECIO Y DECREMENTAMOS EL STOCK
        foreach($productos as $i => $producto){

            for($j=0;$j<$request->cantidad[$i];$j++){
                $venta->productos()->attach($producto->id, ['cantidad'=>1, 'precio' =>$producto->precio_publico, 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            }

            // $venta->productos()->attach($producto->id, ['cantidad'=>$request->cantidad[$i], 'precio' =>$producto->precio_publico, 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
            $producto->decrement('stock',$request->cantidad[$i]);
        }

        // for($i = 0; $i < sizeof($request->cantidad); $i++){
        //     $producto = Producto::find($request->producto_id[$i]);
        //     $venta->productos()->attach($producto->id, ['cantidad'=>$request->cantidad[$i], 'precio' =>$producto->precio_publico]);
        //     $producto->decrement('stock',$request->cantidad[$i]);
        // }
    }

}
