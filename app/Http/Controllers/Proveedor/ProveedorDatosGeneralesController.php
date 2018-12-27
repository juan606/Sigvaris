<?php

namespace App\Http\Controllers\Proveedor;

use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Proveedor;
use App\DatosGeneralesProveedor;
use App\FormaContacto;
use App\Giro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorDatosGeneralesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Proveedor $proveedore)
    {
        //
        $datos = $proveedore->datosGeneralesProveedor;
        if ($datos==null) {
            # code...
            return redirect()->route('proveedores.datosgenerales.create',['proveedore'=>$proveedore]);;
        }
        else{
            $giro = Giro::find($datos->giro_id);
            $formaContacto = FormaContacto::find($datos->forma_contacto_id);
            // dd($giro);
            return view('proveedores.generales.view',['datos'=>$datos, 'proveedore'=>$proveedore, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Proveedor $proveedore)
    {
        //
        $giros = Giro::get();
        $formaContactos = FormaContacto::get();
        // dd($giros);}
        return view('proveedores.generales.create',['proveedore'=>$proveedore, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
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
        // dd($request->all());

        
        $datos = DatosGeneralesProveedor::create($request->all());
        Alert::success('Datos generales creados con éxito');
        return redirect()->route('proveedores.datosgenerales.index',['proveedore'=>$proveedore]);;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedore)
    {
        
        $datos = $proveedore->datosGeneralesProveedor;
        
        $giro='';
      if($datos->giro_id==null){
        $giro='NO DEFINIDO';
      }else{
        $giros=Giro::where('id',$datos->giro_id);
      $giro=$giros->nombre;
      }

       $formaContacto='';
      if($datos->forma_contacto_id==null){
        $formaContacto='NO DEFINIDO';
      }else{
        $formaContactos=FormaContacto::where('id',$datos->forma_contacto_id);
      $formaContacto=$formaContactos->nombre;
      }
        

        
       
        return view('proveedores.generales.view',
        ['datos'=>$datos, 'proveedore'=>$proveedore, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedore)
    {
         
        $datos = $proveedor->datosGeneralesProveedor;
        
        $giros = Giro::get();
        
        $formaContactos = FormaContacto::get();
        return view('proveedores.generales.edit',
        ['proveedore'=>$proveedore, 'datos'=>$datos, 'giros'=>$giros, 'formaContactos'=>$formaContactos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedore, DatosGeneralesProveedor $datosgenerale)
    {
        //
        //dd($request->all());
        $datosgenerale->update($request->all());


        //$giro = Giro::findorFail($datosgenerale->giro_id);

       $giro='';
      if($request->giro_id==null){
        $giro='NO DEFINIDO';
      }else{
        $giros=Giro::where('id',$datosgenerale->giro_id);
      $giro=$giros->nombre;
      }
 
//$formaContacto = FormaContacto::findorFail($datosgenerale->
//forma_contacto_id);

 $formaContacto='';
      if($request->forma_contacto_id==null){
        $formaContacto='NO DEFINIDO';
      }else{
        $formaContactos=FormaContacto::where('id',$datosgenerale->forma_contacto_id);
      $formaContacto=$formaContactos->nombre;
      }
          
        Alert::success('Datos generales actualizados con éxito');
        return view('proveedores.generales.view',['datos'=>$datosgenerale,'proveedore'=>$proveedore, 'giro'=>$giro, 'formaContacto'=>$formaContacto]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedore)
    {
        //
    }
}
