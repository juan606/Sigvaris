@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Reporte de pacientes que no compraron</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.1')}}" method="POST" class="form-inline">
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
        @if ( isset($pacientes_sin_compra) )
            {{-- Lista de pacientes --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes_sin_compra as $key => $paciente)
                            <tr>
                                <td>{{$paciente->created_at}}</td>
                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->paterno}}</td>
                                <td>{{$paciente->materno}}</td>
                                <td><button class="btn btn-warning">Ver</button></td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
            {{-- Resumen de información --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4">
                        <h5 class="text-center">
                            <strong>TOTAL DE PACIENTES</strong>
                            <br>
                            {{count($pacientes_sin_compra)}}
                        </h5>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#listaEmpleados').DataTable();
    } );
</script>

@endsection