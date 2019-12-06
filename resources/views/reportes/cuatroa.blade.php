@extends('principal')
@section('content')

    <div class="container">
        <div class="card">
            {{-- TITULO DEL REPORTE --}}
            <div class="card-header">
                <h3>Reporte de prendas compradas</h3>
            </div>
            {{-- BUSCADOR PACIENTES --}}
            <div class="card-body">
                <form action="{{route('reportes.4a')}}" method="POST" class="form-inline">
                    @csrf
                    {{-- Input de fecha inicial --}}
                    <div class="form-group mr-3">
                        <label for="fechaInicial"></label>
                        <input type="date" class="form-control" name="fechaInicial" id="fechaInicial" required>
                    </div>
                    {{-- Input fecha final --}}
                    <div class="form-group mr-4">
                        <label for="fechaFinal"></label>
                        <input type="date" class="form-control" name="fechaFinal" id="fechaFinal" required>
                    </div>
                    <button class="btn btn-primary">Buscar</button>
                </form>
            </div>
            @if ( isset($pacientesConCompra) )
            {{-- TABLA PACIENTES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>Paciente</th>
                            <th># prendas</th>
                            <th>Porcentaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientesConCompra as $key => $paciente)
                                <tr>
                                    <td>{{$paciente->nombre . " " . $paciente->paterno . " " . $paciente->materno}}</td>
                                    <td>
                                        {{
                                            $paciente
                                                ->ventas
                                                ->where('fecha','>=',$rangoFechas["inicio"])
                                                ->where('fecha', '<=',$rangoFechas["fin"])
                                                ->pluck('productos')
                                                ->flatten()
                                                ->pluck('pivot')
                                                ->flatten()
                                                ->pluck('cantidad')->sum()
                                        }}</td>
                                    <td>
                                        {{ round($paciente
                                            ->ventas
                                            ->where('fecha','>=',$rangoFechas["inicio"])
                                            ->where('fecha', '<=',$rangoFechas["fin"])
                                            ->pluck('productos')
                                            ->flatten()
                                            ->pluck('pivot')
                                            ->flatten()
                                            ->pluck('cantidad')->sum() / $totalProductosCompras * 100, 2) }}%
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>    
                </table>
                <div class="row mt-3">
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    <div class="col-3"></div>
                    <div class="col-3">
                        <label for="totalCompras" class="text-uppercase"><strong>Compras totales</strong></label>
                        <input type="text" readonly value="{{$totalProductosCompras}}" class="form-control">
                    </div>
                </div>
            </div>

            @endif
        </div>
    </div>

@endsection