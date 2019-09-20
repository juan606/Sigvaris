@extends('principal')
@section('content')
    <div class="container">
        <div class="card">
            {{-- TITULO DE LA SECCIÓN ACTUAL --}}
            <div class="card-header">
                <h3>Prendas vendidas por rango de fecha</h3>
            </div>
            {{-- CONTENEDOR BUSCADOR DE PACIENTES --}}
            <div class="card-body">
                <form action="{{route('reportes.3')}}" method="POST" class="form-inline">
                    @csrf
                    {{-- INPUT DE FECHA INICIAL --}}
                    <div class="form-group mr-3">
                        <label for="fechaInicial"></label>
                        <input type="date" class="form-control" name="fechaInicial" value="{{Request::old('fechaInicial')}}" id="fechaInicial" required>
                    </div>
                    {{-- INPUT DE FECHA FINAL --}}
                    <div class="form-group mr-4">
                        <label for="fechaFinal"></label>
                        <input type="date" class="form-control" name="fechaFinal" id="fechaFinal" value="{{Request::old('fechaFinal')}}" required>
                    </div>
                    <button class="btn btn-primary">Buscar</button>
                </form>
            </div>
            @if ( isset($arregloFechasConVentas) )
            {{-- LISTA DE PACIENTES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>Fecha</th>
                            <th># Pacientes</th>
                            <th># Prendas</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($ventas as $paciente_id => $ventasPorFecha) --}}
                            @for ($i = 0; $i < count($arregloFechasConVentas); $i++)
                                
                                <tr>
                                    <td>{{$arregloFechasConVentas[$i]}}</td>
                                    <td>{{$arregloTotalPacientesConUnProducto[$i]}}</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>{{$arregloFechasConVentas[$i]}}</td>
                                    <td>{{$arregloTotalPacientesConMasDeUnProducto[$i]}}</td>
                                    <td>>1</td>
                                </tr>
                            @endfor
                        {{-- @endforeach --}}
                    </tbody>    
                </table>
            </div>
            {{-- INFORMACION GENERAL DE LA BUSQUEDA --}}
            {{-- <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Total de ventas</label>
                            <input type="text" class="form-control" readonly value="{{ count( $ventas->pluck('productos')->flatten() ) }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Total de días</label>
                            <input type="text" class="form-control" readonly value="{{ count( $rangoDias ) }}">
                        </div>
                    </div>
                </div>
            </div> --}}
            @endif
        </div>
    </div>
@endsection