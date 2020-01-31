<?php

namespace App\Exports;

use App\Venta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CorteCajaExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Venta::where('fecha', '>=', date('Y-m-d'))
            ->get()
            ->pluck('productos')
            ->flatten()
            ->map(function ($producto) {
                return collect([
                    $producto->sku,
                    $producto->pivot->cantidad,
                    $producto->pivot->precio,
                    $producto->pivot->precio * $producto->pivot->cantidad,
                    $producto->pivot->precio * $producto->pivot->cantidad * 1.16,
                ]);
            });
    }

    public function headings(): array
    {
        return [
            'SKU',
            'CANTIDAD',
            'PRECIO',
            'TOTAL',
            'TOTAL + IVA'
        ];
    }
}
