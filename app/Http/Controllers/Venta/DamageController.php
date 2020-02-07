<?php

namespace App\Http\Controllers\Venta;

use App\Producto;
use App\Venta;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DamageController extends Controller
{
    //

    public function index($id)
    {
        $Venta=Venta::where('id',$id)->get();
        $Productos=$Venta[0]->productos;
    	return view('venta.damage.index', ['Productos'=>$Productos,'Venta'=>$Venta[0]]);
    }

    public function SerchProductoExit(Request $request){
    	$Producto=Producto::where('sku',$request->input('sku'))->get();;
    	if (count($Producto)==1) {
    		$Datos =array('Ex'=>1,'Producto'=>$Producto[0]);
    		return $Datos;
    	}else{
    		$Datos =array('Ex'=>0);
    		return $Datos;
    	}
    }
}
