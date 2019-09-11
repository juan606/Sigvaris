@extends('principal')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Prendas vendidas por paciente</h3>
            </div>
            {{-- Buscador de pacientes --}}
            <div class="card-body">
                <form action="{{route('reportes.2')}}" method="POST" class="form-inline">
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
            @if ( isset($ventasPorFechaPorPaciente) )
                {{-- Lista de pacientes --}}
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                        <thead>
                            <tr class="info">
                                <th>Fecha</th>
                                {{-- <th>Doctor</th> --}}
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>N° prendas</th>
                                {{-- <th>Acción</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventasPorFechaPorPaciente as $paciente_id => $ventasPorFecha)
                                @foreach ($ventasPorFecha as $fecha_venta => $ventas)
                                    <tr>
                                        <td>{{$fecha_venta}}</td>
                                        {{-- <td>{{App\Paciente::find($paciente_id)->doctor()->first()->nombre}}</td> --}}
                                        <td>{{App\Paciente::find($paciente_id)->nombre}}</td>
                                        <td>{{App\Paciente::find($paciente_id)->paterno}}</td>
                                        <td>{{App\Paciente::find($paciente_id)->materno}}</td>
                                        <td>{{$ventas->pluck('productos_count')->flatten()->sum()}}</td>
                                        {{-- <td>-</td> --}}
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>    
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection