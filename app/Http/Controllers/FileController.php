<?php

namespace App\Http\Controllers;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel;

class FileController extends Controller
{
    //
    public function importExportExcelORCSV() {
    	return view('excel.importar');
    }

    public function importFileIntoDB(Request $request) {
    	if($request->hasFile('sample_file')) {
    		$path = $request->file('sample_file')->getPathName();
            $data = \Excel::load($path, null, null, true, null)->get();
    		if($data->count()) {
                foreach ($data as $sheet) {
                        $arr[] = [
                            'sku' => $sheet->sku,
                            'descripcion' => $sheet->descripcion,
                            'precio_distribuidor' => number_format($sheet->distribuidor, 2, '.', ''),
                            'precio_publico' => number_format($sheet->public_sin_iva, 2, '.', ''),
                            'precio_publico_iva' => number_format($sheet->publico_con_iva, 2, '.', ''),
                            'created_at' => date('Y-m-d h:m:s'),
                            'updated_at' => date('Y-m-d h:m:s'),
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