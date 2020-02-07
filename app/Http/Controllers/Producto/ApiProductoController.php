<?php

namespace App\Http\Controllers\Producto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;

class ApiProductoController extends Controller
{
    public function getProductoBySku($sku){
        $producto = Producto::where('sku',$sku)->first();
        return response()->json($producto);
    }
}
