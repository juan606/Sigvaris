<?php

namespace App\Services\Pacientes;

use App\Imports\ProductImport;
use App\Paciente;
use ErrorException;
use Excel;
use UxWeb\SweetAlert\SweetAlert as Alert;

use App\Doctor;
use App\Hospital;
use App\Venta;
use App\Factura;
use App\Producto;

class StoreExcelPacientesService
{

    public function make($file)
    {
        // OBTENEMOS LOS DATOS DEL EXCEL
        $data = Excel::toArray(new ProductImport, $file);
        $data=$data[0];
        //dd($data);

        foreach ($data as $row) {
            if (isset($row[2])) {
            if (isset($row[5])) {
                $Doctor= array(
                    'nombre' => $row[5],
                    'apellidomaterno' => $row[7],
                    'apellidopaterno' => $row[6],
                    //'celular' => $row[1],
                    //'mail' => $row[2],
                    //'nacimiento' => $row[2],
                    //'activo' => $row[2],
                    //'deleted_at' => $row[2,]
                );
                $D=Doctor::updateOrCreate($Doctor, $Doctor);
                $ID_Doctor=$D['id'];
            }
            
            
            if (isset($row[9])) {
                $Hospital= array(
                    'nombre' => $row[9],
                    'etiqueta' => $row[9][0],
                );
                Hospital::updateOrCreate($Hospital,$Hospital);
            }

                # code...
            
            if (isset($ID_Doctor)) {
                $Paciente= array(
                'nombre' => $row[2],
                'materno' => $row[3],
                'paterno' => $row[4],
                //'nacimiento' => $row[3],
                'rfc' => $row[30],
                'celular' => $row[41],
                'telefono' => $row[40],
                'mail' => $row[39],
                'doctor_id' => $ID_Doctor,
                'nivel_id' => 1,
                'oficina_id' => 1,
                //'homoclave' => $row[11],
                'created_at' => date('Y-m-d h:m:s'),
                'updated_at' => date('Y-m-d h:m:s'),
            );
            }else{
                $Paciente= array(
                'nombre' => $row[2],
                'materno' => $row[3],
                'paterno' => $row[4],
                //'nacimiento' => $row[3],
                'rfc' => $row[30],
                'celular' => $row[41],
                'telefono' => $row[40],
                'mail' => $row[39],
                //'id_doctor' => $ID_Doctor,
                'nivel_id' => 1,
                'oficina_id' => 1,
                //'homoclave' => $row[11],
                'created_at' => date('Y-m-d h:m:s'),
                'updated_at' => date('Y-m-d h:m:s'),
            );
            }
            
            $P=Paciente::updateOrCreate((['nombre' => $row[2],'materno' => $row[3],'paterno' => $row[4]]),$Paciente);
            $Precio_public=0;
            $Precio_public_iva=0;
            for ($i=0; $i <16 ; $i++) { 
                if ( Producto::where('sku',$row[13+$i])->exists()) {
                    $Precio_public+=Producto::where('sku',$row[13+$i])->value('precio_publico');
                    $Precio_public_iva +=Producto::where('sku',$row[13+$i])->value('precio_publico_iva');
                }
            }
            if ($Precio_public>0) {
                    $Venta= array(
                        'paciente_id'=>$P['id'],
                        'fecha'=> date('Y-m-d h:m:s'),
                        'subtotal' => $Precio_public,
                        'total' => $Precio_public_iva,
                        'oficina_id' => 1,
                        'empleado_id' => 1,

                    );
                    $V=Venta::updateOrCreate($Venta,$Venta);
                     for ($i=0; $i < 16 ; $i++) {
                     if ( Producto::where('sku',$row[13+$i])->exists()) { 
                        $V->productos()->attach(
                            Producto::where('sku',$row[13+$i])->value('id'),array('cantidad'=>1,
                            'precio'=>Producto::where('sku',$row[13+$i])->value('precio_publico'), 
                            'created_at' => date('Y-m-d h:m:s'), 
                            'updated_at' => date('Y-m-d h:m:s')
                        ));
                        }
                    }
                    if (isset($row[31])) {
                        $Factura= array(
                        'venta_id'=>$V['id'],
                        'nombre'=>$row[31],
                        //'fisica'=>$row[],
                        'rfc'=>$row[30],
                        //'regimen_fiscal'=>$row[],
                        //'homoclave'=>$row[],
                        'correo'=>$row[39],
                        'calle'=>$row[32],
                        'num_ext'=>$row[33],
                        'num_int'=>$row[34],
                        'colonia'=>$row[35],
                        'cp' => $row[36],
                        //'ciudad'=>$row[],
                        'municipio'=>$row[38],
                        //'estado'=>$row[],
                        'created_at' => date('Y-m-d h:m:s'), 
                        'updated_at' => date('Y-m-d h:m:s')
                        );
                        Factura::updateOrCreate($Factura,$Factura);
                    }
                    
                
                }
            

            
        }
        /*$data = $data[0];
        
        if (!count($data)) {
            return redirect()->back()->withErrors(['error', 'Error al subir el archivo.']);
        }

        try {
            // OBTENEMOS LOS PRODUCTOS DEL EXCEL
            foreach ($data as $row) {
                $indice = $this->buscarPreciosenExcel($Precios, count($Precios), $row[0]);
                if ($indice != -1) {
                    $arr[] = [
                        'nombre' => $row[2],
                        'materno' => $row[4],
                        'paterno' => $row[3],
                        //'nacimiento' => $row[3], 
                        //'rfc' => number_format((float)$row[30], 2, '.', ''),
                        'rfc' => $row[30],
                        'celular' => $row[41],
                        'telefono' => $row[40],
                        'mail' => $row[39],
                        //'otro_doctor' => $row[8],
                        'nivel_id' => "1",
                        'oficina_id' => $row[10],
                        'homoclave' => $row[11],
                        'created_at' => date('Y-m-d h:m:s'),
                        'updated_at' => date('Y-m-d h:m:s'),
                    ];
                }
            }
        } catch (\ErrorException $ee) {
            return redirect()->back()->withErrors(['status', 'error_create']);
        }

        if (empty($arr)) {
            return redirect()->back()->withErrors(['error', 'Error al subir el archivo.']);
        }

        foreach ($arr as $producto) {
            Producto::updateOrCreate($producto, $producto);
        }
        */
    }
    }

    public function buscarPreciosenExcel($arreglo, $tamaño, $dato)
    {
        $centro = 0;
        $inf = 0;
        $sup = $tamaño - 1;
        while ($inf <= $sup) {
            $centro = (int) (($sup - $inf) / 2) + $inf;
            if ($arreglo[$centro][0] == $dato)       return $centro;
            else if ($dato < $arreglo[$centro][0]) $sup = $centro - 1;
            else $inf = $centro + 1;
        }
        return -1;
    }
}
