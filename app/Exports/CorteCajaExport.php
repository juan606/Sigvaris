<?php

namespace App\Exports;

use App\Venta;
use App\Factura;
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
            //->pluck('productos')
            ->flatten()
            ->map(function ($Venta) {
                //dd($Venta->productos()->pluck('cantidad')->sum());
                return collect([
                    date('Y-m-d'),
                    $Venta->id,
                    $Venta->id,
                    $Venta->paciente->nombre." ".$Venta->paciente->paterno." ".$Venta->paciente->materno,
                    $Venta->paciente->doctor != null ? $Venta->paciente->doctor->nombre : "",
                    $Venta->id,
                    $Venta->empleado != null ? $Venta->empleado->nombre : "",
                    $Venta->productos != null ? $Venta->productos()->pluck('cantidad')->sum():"",
                    $Venta->total,
                    $Venta->PagoEfectivo,
                    $Venta->banco,
                    $Venta->PagoTarjeta,
                    $Venta->digitos_targeta,
                    Factura::where('venta_id',$Venta->id)->exists()? "Si":"No"

                ]);
            });
    }

    public function headings(): array
    {
        return [
            'Fecha',
            'Folio',
            'Partida',
            'DETALLE PACIENTE',
            'NOMBRE DEL MÉDICO QUE ENVÍA',
            'NOTA DE REMISION',
            'CIERRE VENTA',
            'PZAS POR PACIENTE',
            'TOTAL VENTA',
            'PAGO EFECTIVO',
            'NOMBRE BANCO',
            'PAGO TARJETA ',
            'DIGITOS 4 ULTIMOS ',
            'FACTURA'


        ];
    }
}
