<?php

namespace App\Http\Controllers;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Imports\ProductImport;
use App\Exports\ProductExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Excel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Auth;
use ErrorException;
use App\Exports\InvoicesExport;


class FileController extends Controller
{
    //
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->role->productos)
                {
                    return $next($request);
                }                
             return redirect('/inicio');
                 
            }
            return redirect('/');             
        });
    }
    public function importExportExcelORCSV() {
    	return view('excel.importar');
    }

    public function importFileIntoDB(Request $request) {
    	if($request->hasFile('sample_file')) {
    		//$path = $request->file('sample_file')->getPathName();
            //$data = \Excel::load($path, null, null, true, null)->get();

            // OBTENEMOS LOS DATOS DEL EXCEL
            $data = Excel::toArray(new ProductImport, request()->file('sample_file'));
            $Precios = $data[1];
            $data = $data[0];
            unset($Precios[0]);
            unset($data[0]);


    		if(count($data)) {
                try{
                    // OBTENEMOS LOS PRODUCTOS DEL EXCEL
                    foreach ($data as $row) {
                        $indice = $this->buscarPreciosenExcel($Precios, count($Precios), $row[0]);
                        if($indice != -1){
                            $arr[] = [
                                'sku' => $row[0],
                                'descripcion' => $row[1],
                                'line'=>$row[2],
                                'upc'=>$row[3],
                                'swiss_id'=>$row[4],
                                //'precio_distribuidor' => number_format($row->distribuidor, 2, '.', ''),
                                'precio_publico' => number_format($Precios[$indice][1], 2, '.', ''),
                                'precio_publico_iva' => number_format($Precios[$indice][2], 2, '.', ''),
                                'stock'=>$row[7],
                                'oficina_id'=>session('oficina')
                            ];
                        }
                    }
                } catch(\ErrorException $ee){
                    return redirect()->back()->withErrors(['status', 'error_create']);
                }
    			if (!empty($arr)) {
                    // dd($arr);
                    // $registros = Producto::get();
                    // foreach ($registros as $registro) {
                    //     Producto::destroy($registro->id);
                    // }
                    
                    // Producto::insert($arr);

                    foreach($arr as $producto ){
                        Producto::updateOrCreate($producto);
                    }

                    Alert::success('Archivo subido correctamente.');
    				return redirect()->back();
                } else
                    //return('Error al subir el archivo.');
    				return redirect()->back()->withErrors(['error', 'Error al subir el archivo.']);
            } else
    		return redirect()->back()->withErrors(['error', 'Error al subir el archivo.']);
        } else
    		return redirect()->back()->withErrors(['error', 'No se subio ningun archivo']);
    	return redirect()->back()->withErrors(['error', 'Error al subir el archivo.']);
    }

    public function downloadExcelFile($type) {
        if ($type === "xlsx") {
            return Excel::download(new ProductExport, 'productos.xlsx');
        }
        else {
            return Excel::download(new ProductExport, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);

        }
    }

    public function buscarPreciosenExcel($arreglo, $tamaño, $dato){
        $centro = 0;
        $inf=0;
        $sup=$tamaño-1;
        while($inf <= $sup){
            $centro=(int)(($sup - $inf) / 2) + $inf;
            if($arreglo[$centro][0] == $dato)       return $centro;
            else if($dato < $arreglo[$centro][0]) $sup = $centro-1;
            else $inf = $centro+1;
        }
        return -1;
    }

}
