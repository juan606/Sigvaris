<?php

namespace App\Http\Controllers\Venta;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DamageController extends Controller
{
    //

    public function index()
    {
    	return view('damage.index');
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
