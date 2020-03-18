<?php

namespace App\Exports;

use App\Factura;
use Maatwebsite\Excel\Concerns\FromCollection;

class FacturasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Factura::get();
    }
}
