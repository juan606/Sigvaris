<?php

namespace App\Http\Controllers;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;


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
    		$path = $request->file('sample_file')->getPathName();
            $data = \Excel::load($path, null, null, true, null)->get();
            //dd($data);
    		if($data->count()) {
                foreach ($data as $sheet) {
                    //dd($sheet->)
                        $arr[] = [
                            'sku' => $sheet->sku,
                            'descripcion' => $sheet->description,
                            'precio_distribuidor' => number_format($sheet->distribuidor, 2, '.', ''),
                            'precio_publico' => number_format($sheet->precio_sin_iva, 2, '.', ''),
                            'precio_publico_iva' => number_format($sheet->precio_con_iva, 2, '.', ''),
                            'created_at' => date('Y-m-d h:m:s'),
                            'updated_at' => date('Y-m-d h:m:s'),
                            'line'=>$sheet->line,
                            'upc'=>$sheet->upc,
                            'swiss_id'=>$sheet->swiss_id
                        ];
                }
    			if (!empty($arr)) {
                    // dd($arr);
                    Producto::insert($arr);
                    Alert::success('Archivo subido correctamente.');
    				return redirect()->back();
                } else
                    return('Error al subir el archivo.');
    				return redirect()->back()->with('error', 'Error al subir el archivo.');
            } else
            return('Error al subir el archivo.');
    			return redirect()->back()->with('error', 'Error al subir el archivo.');
        } else
            return('No se subio ningun archivo');
    		return redirect()->back()->with('error', 'No se subio ningun archivo');

        return('Error al subir el archivo.');
    	return redirect()->back()->with('error', 'Error al subir el archivo.');
    }

    public function downloadExcelFile($type) {
    	$products = Producto::get()->toArray();
    	return \Excel::create('productos', function($excel) use($products) {
			$excel->sheet('sheet name', function($sheet) use($products) {
				$sheet->fromArray($products);
			});
    	})->download($type);
    }

}