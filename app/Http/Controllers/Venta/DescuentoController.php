<?php

namespace App\Http\Controllers\Venta;

use App\Descuento;
use App\Promocion;
use App\Paciente;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->role->precargas)
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
        return view('venta.descuentos', ['descuentos'=>Descuento::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.descuentos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                
        $descuento = Descuento::create($request->all());
        if($request->tipoA)
        {
            $promoA=new Promocion;
            $promoA->tipo='A';
            $promoA->compra_min=$request->compra_minA;
            $promoA->unidad_compra='prendas';
            $promoA->descuento_de=$request->descuento_deA;
            $promoA->unidad_descuento='prendas';
            $promoA->descuento_id=$descuento->id;
            $promoA->save();
        }

        if($request->tipoB)
        {
            $promoB=new Promocion;
            $promoB->tipo='B';
            $promoB->compra_min=$request->compra_minB;
            $promoB->unidad_compra='$';
            $promoB->descuento_de=$request->descuento_deB;
            $promoB->unidad_descuento=$request->unidad_descuentoB;
            $promoB->descuento_id=$descuento->id;
            $promoB->save();
        }

        if($request->tipoC)
        {
            $promoC=new Promocion;
            $promoC->tipo='C';
            $promoC->compra_min=0;
            $promoC->unidad_compra='$';
            $promoC->descuento_de=$request->descuento_deC;
            $promoC->unidad_descuento=$request->unidad_descuentoC;
            $promoC->descuento_id=$descuento->id;
            $promoC->save();
        }

        if($request->tipoD)
        {
            $promoD=new Promocion;
            $promoD->tipo='D';
            $promoD->compra_min=$request->compra_minD;
            $promoD->unidad_compra='prendas';
            $promoD->descuento_de=$request->descuento_deD;
            $promoD->unidad_descuento=$request->unidad_descuentoD;
            $promoD->descuento_id=$descuento->id;
            $promoD->save();
        }

        if($request->tipoE)
        {
            $promoE=new Promocion;
            $promoE->tipo='E';
            $promoE->compra_min=$request->compra_minE;
            $promoE->unidad_compra='prendas';
            $promoE->descuento_de=$request->descuento_deE;
            $promoE->unidad_descuento='sigpesos';
            $promoE->descuento_id=$descuento->id;
            $promoE->save();
        }

        if($request->tipoF)
        {
            $promoF=new Promocion;
            $promoF->tipo='F';
            $promoF->compra_min=0;
            $promoF->unidad_compra='$';
            $promoF->descuento_de=$request->descuento_deF;
            $promoF->unidad_descuento=$request->unidad_descuentoF;
            $promoF->descuento_id=$descuento->id;
            $promoF->save();
        }

        return redirect()->route('descuentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function show(Descuento $descuento)
    {
        //dd(date("z",strtotime($descuento->inicio)));
        // dd($descuento->promociones->where('tipo','A')->first()->compra_min);
        //dd($descuento->promociones->where('tipo','B')->first());
        return view('venta.descuentos_show',['descuento'=>$descuento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function edit(Descuento $descuento)
    {
        return view('venta.descuentos_edit',['descuento'=>$descuento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Descuento $descuento)
    {
        $descuento->update($request->all());
        if($request->tipoA)
        {
            $promoA=new Promocion;
            $promoA->tipo='A';
            $promoA->compra_min=$request->compra_minA;
            $promoA->unidad_compra='prendas';
            $promoA->descuento_de=$request->descuento_deA;
            $promoA->unidad_descuento='prendas';
            $promoA->descuento_id=$descuento->id;
            $promoA->save();
        }

        if($request->tipoB)
        {
            $promoB=new Promocion;
            $promoB->tipo='B';
            $promoB->compra_min=$request->compra_minB;
            $promoB->unidad_compra='$';
            $promoB->descuento_de=$request->descuento_deB;
            $promoB->unidad_descuento=$request->unidad_descuentoB;
            $promoB->descuento_id=$descuento->id;
            $promoB->save();
        }

        if($request->tipoC)
        {
            $promoC=new Promocion;
            $promoC->tipo='C';
            $promoC->compra_min=0;
            $promoC->unidad_compra='$';
            $promoC->descuento_de=$request->descuento_deC;
            $promoC->unidad_descuento=$request->unidad_descuentoC;
            $promoC->descuento_id=$descuento->id;
            $promoC->save();
        }

        if($request->tipoD)
        {
            $promoD=new Promocion;
            $promoD->tipo='D';
            $promoD->compra_min=$request->compra_minD;
            $promoD->unidad_compra='prendas';
            $promoD->descuento_de=$request->descuento_deD;
            $promoD->unidad_descuento=$request->unidad_descuentoD;
            $promoD->descuento_id=$descuento->id;
            $promoD->save();
        }

        if($request->tipoE)
        {
            $promoE=new Promocion;
            $promoE->tipo='D';
            $promoE->compra_min=$request->compra_minE;
            $promoE->unidad_compra='prendas';
            $promoE->descuento_de=$request->descuento_deE;
            $promoE->unidad_descuento='sigpesos';
            $promoE->descuento_id=$descuento->id;
            $promoE->save();
        }

        if($request->tipoF)
        {
            $promoF=new Promocion;
            $promoF->tipo='F';
            $promoF->compra_min=0;
            $promoF->unidad_compra='$';
            $promoF->descuento_de=$request->descuento_deF;
            $promoF->unidad_descuento=$request->unidad_descuentoF;
            $promoF->descuento_id=$descuento->id;
            $promoF->save();
        }
        return redirect('descuentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Descuento  $descuento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descuento $descuento)
    {
        //
    }

    public function getPromos(Descuento $descuento)
    {
        return view('venta.get_promos',['promociones'=>$descuento->promociones]);
    }

    public function getDescuento(Promocion $promocion,Request $request)
    {
      //   $response = array(
      //     'status' => 'success',
      //     'subtotal' => $request->subtotal,
      //     'paciente_id'=>$request->paciente_id,
      //     'total_productos'=>$request->total_productos
      // );
      // return response()->json($response); 
        switch ($promocion->tipo) {
            case 'A':
                if($request->total_productos>=$promocion->compra_min)
                {
                    $product=[];//Id del producto, su cantidad esta en el mismo index de $cantidad_p, si precio esta en el mismo index de $precio
                    $cantidad_p=[];
                    $precio=[];
                    $barato=[];
                    $verificar=1;                    
                    foreach ($request->productos_id as $i => $producto)
                    {
                        foreach ($product as $j=>$p)
                        {
                            if($p==$producto)
                            {
                                $verificar=0;
                                $cantidad_p[$j]+=$request->cantidad_id[$i];
                            }
                        }
                        if($verificar)
                        {
                            array_push($product,$producto);
                            array_push($cantidad_p,$request->cantidad_id[$i]);
                        }
                    }
                    foreach ($product as $i => $p)
                    {
                        array_push($precio,Producto::find($p)->precio_publico_iva);
                    }
                    $barato=$precio;
                    $regalado=$promocion->descuento_de-$promocion->compra_min;
                    $productos=$request->total_productos;
                    $pagar=0;
                    $gratis=0;
                    while ($productos>=$promocion->compra_min) {
                        $pagar+=$promocion->compra_min;
                        $productos-=$promocion->compra_min;
                        if($productos>=$regalado)
                        {
                            $gratis+=$regalado;
                            $productos-=$regalado;    
                        }
                        else
                        {
                            $gratis+=$productos;
                            $productos=0;
                        }
                    }
                    $pagar+=$productos;
                    sort($barato);
                    $verificar=0;
                    $total=0;
                    foreach ($barato as $b)
                    {
                        foreach ($precio as $i => $pr)
                        {
                            if ($b==$pr)
                            {
                                if($cantidad_p[$i]>=$gratis)
                                {
                                    $total+=$gratis*$pr;
                                    $verificar=1;
                                }
                                else
                                {
                                    $total+=$cantidad_p[$i]*$pr;
                                    $gratis-=$cantidad_p[$i];
                                }
                            }
                            if($verificar)
                                break;
                        }
                        if($verificar)
                            break;
                    }
                    $response=array(
                        'status'=>1,
                        'sigpesos'=>0,
                        'total'=>$total,
                        'product'=>$product,
                        'cantidad_p'=>$cantidad_p,
                        'precio'=>$precio,
                        'barato'=>$barato
                    );

                }
                else
                {
                    $response=array('status'=>0);
                }
                
            break;
            case 'B':
                if($promocion->compra_min<$request->subtotal)
                {
                    if ($promocion->unidad_descuento=='%') 
                    {
                        $total=($request->subtotal*($promocion->descuento_de/100));
                    }
                    else
                    {
                        $total=$promocion->descuento_de;
                    }
                    $response=array(
                        'status'=>1,
                        'sigpesos'=>0,
                        'total'=>$total
                    );
                }
                else
                {
                    $response=array('status'=>0);
                }
            break;

            case 'C':
                $paciente=Paciente::find($request->paciente_id);
                $f_i=date("z",strtotime($promocion->descuento->inicio));
                $f_f=date("z",strtotime($promocion->descuento->fin));
                $f_birth=date("z",strtotime($paciente->nacimiento));
                if($f_i<$f_birth && $f_birth<$f_f)
                {
                     if ($promocion->unidad_descuento=='%') 
                    {
                        $total=($request->subtotal*($promocion->descuento_de/100));
                    }
                    else
                    {
                        $total=$promocion->descuento_de;
                    }
                    $response=array(
                        'status'=>1,
                        'sigpesos'=>0,
                        'total'=>$total
                    ); 
                }
                else
                {
                    $response=array('status'=>0);
                }
            break;

            case 'D':
                if($request->total_productos>=$promocion->compra_min)
                {
                     if ($promocion->unidad_descuento=='%') 
                    {
                        $total=($request->subtotal*($promocion->descuento_de/100));
                    }
                    else
                    {
                        $total=$promocion->descuento_de;
                    }
                    $response=array(
                        'status'=>1,
                        'sigpesos'=>0,
                        'total'=>$total
                    ); 
                }
                else
                {
                     $response=array('status'=>0);
                }
            break;

            case 'E':
                if($request->total_productos>=$promocion->compra_min)
                {
                    // $sigpesos=Paciente::find($request->paciente_id)->ventas->last()->sigpesos;
                    // if(!$sigpesos)
                    // {
                        $sigpesos=0;
                    //}
                    $productos=$request->total_productos;
                    while ($productos>=$promocion->compra_min) {
                        // $pagar+=$promocion->compra_min;
                        $productos-=$promocion->compra_min;
                        $sigpesos+=$promocion->descuento_de;                        
                    }
                    $response=array(
                    'status'=>1,                    
                    'sigpesos'=>$sigpesos,
                    'total'=>0
                ); 

                }
                else
                {
                    $response=array('status'=>0);
                }

            break;

            case 'F':
                if ($promocion->unidad_descuento=='%') 
                {
                    $total=($request->subtotal*($promocion->descuento_de/100));
                }
                else
                {
                    $total=$promocion->descuento_de;
                }
                $response=array(
                    'status'=>1,
                    'sigpesos'=>0,
                    'total'=>$total
                ); 
            break;
            
            default:
                $response=array(
                    'status'=>1,
                    'sigpesos'=>0,
                    'total'=>0
                ); 
            break;
        }
        return response()->json($response);
    }

    public function getSigpesos(Paciente $paciente)
    {
        if(isset($paciente->ventas))
        {
            return $paciente->ventas->last()->sigpesos;
        }
        else
        {
            return 0;
        }
        
    }
}
