@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3> Reporte de recomendaciones de doctor</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.10')}}" method="POST" class="form-inline">
                @csrf
                {{-- Año inicial --}}
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">DE: </div>
                    </div>
                    <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" required>
                </div>
                {{-- Año final --}}
                <div class="input-group mr-3">
                    {{-- <label for="anioFinal">A: </label> --}}
                    <div class="input-group-prepend">
                        <div class="input-group-text">A: </div>
                    </div>
                    <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" required>
                </div>
                <button class="btn btn-primary">Buscar</button>
            </form>
        </div>
        @if ( count($doctores) )
            {{-- TABLA DOCTORES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered table-responsive" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th rowspan="2">Doctor</th>

                            @foreach ($mesesSolicitados as $mes)
                                <th colspan="2">{{$mesesString[$mes]}}</th>
                            @endforeach

                            <th colspan="2">Total</th>
                        </tr>
                        <tr>
                            @foreach ($mesesSolicitados as $mes)
                                <th>1° vez</th>
                                <th>Recompra</th>
                            @endforeach
                            <th>1° vez</th>
                            <th>Recompra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctores as $key => $doctor)
                        {{-- {{dd($doctores)}} --}}
                            <tr>
                                <td>{{$doctor->nombre}}</td>
                                @foreach ($mesesSolicitados as $mes)
                                    <th>
                                        {{-- {{dd($mesesSolicitados)}} --}}
                                        {{
                                            $doctor
                                                ->pacientes()
                                                ->withCount("ventas")
                                                // SOLO PACIENTES CON VENTAS EN EL RANGO DE TIEMPO
                                                ->whereHas('ventas', function(\Illuminate\Database\Eloquent\Builder $query) use($mes){
                                                    $query->where('fecha','>=','2019-'.$mes.'-1')
                                                        ->where('fecha', '<=', '2019-'.$mes.'-31');
                                                })
                                                // SOLO PACIENTES CON MENOS DE UNA VENTA
                                                ->having('ventas_count', '<=', 1)
                                                ->get()
                                                ->count()
                                        }}
                                    </th>
                                    <th>{{
                                        $doctor
                                            ->pacientes()
                                            ->withCount("ventas")
                                            ->with('ventas')
                                            // SOLO PACIENTES CON VENTAS EN EL RANGO DE TIEMPO
                                            ->whereHas('ventas', function (\Illuminate\Database\Eloquent\Builder $query) use ($mes) {
                                                $query->where('fecha', '>=', '2019-'.$mes.'-1')
                                                    ->where('fecha', '<=', '2019-'.$mes.'-31');
                                            })
                                            // SOLO PACIENTES CON MAS DE UNA VENTA
                                            ->having('ventas_count', '>=', 2)
                                            ->get()->count()
                                        }}</th>
                                @endforeach
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
            {{-- GRAFICA DE TABLA --}}
            <div class="card-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        @endif
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#listaEmpleados').DataTable();
    } );
</script>

{{-- SCRIPTS PARA GRAFICAR TABLAS --}}


@endsection