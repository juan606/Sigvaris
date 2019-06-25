<?php

namespace App\Imports;

use App\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class ProductImport implements ToModel, WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Producto([
            'sku' => $row[0],
            'descripcion' => $row[1],
            'line' => $row[2],
            'upc' => $row[3],
            'swiss_id' => $row[4],
            'precio_publico' => number_format((float)$row[5], 2, '.', ''),
            'precio_publico_iva' => number_format((float)$row[6], 2, '.', ''),
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s'),
        ]);
    }
}
