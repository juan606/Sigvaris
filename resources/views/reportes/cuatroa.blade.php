@extends('principal')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Reporte de prendas compradas</h3>
            </div>
            {{-- Buscador de pacientes --}}
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
            @if ( isset($comprasPorCliente) )
                {{-- Lista de pacientes --}}
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                        <thead>
                            <tr class="info">
                                <th># Compras</th>
                                <th># Pacientes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($comprasPorCliente as $key => $compra)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$compra}}</td>
                                    </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
                {{-- Resumen de información --}}
                {{-- <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4"></div>
                        <div class="col-12 col-md-4"></div>
                        <div class="col-12 col-md-4">
                            <h5 class="text-center">
                                <strong>TOTAL DE PACIENTES</strong>
                                <br>
                                {{count($comprasPorCliente)}}
                            </h5>
                        </div>
                    </div>
                </div> --}}
            @endif
        </div>
    </div>

@endsection