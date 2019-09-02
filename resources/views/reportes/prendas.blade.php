@extends('principal')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">REPORTE DE LAS PRENDAS</h4>
                </div>
                {{-- Busqueda por fecha --}}
                <div class="card-body">
                    <form class="form-inline" method="POST" action="{{route('reportes.2')}}">
                        @csrf
                        {{-- Input de fecha inicial --}}
                        <div class="form-group mr-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">DE:</div>
                            </div>
                            <input type="date" class="form-control input-fecha" name="fecha_inicial" id="fechaInicial">
                        </div>
                        {{-- Input de fecha final --}}
                        <div class="form-group mr-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">A:</div>
                            </div>
                            <input type="date" class="form-control input-fecha" name="fecha_final" id="fechaFinal">
                        </div>
                        {{-- Input de categoria paciente --}}
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="categorias" id="categorias1" value="paciente" checked>
                            <label class="form-check-label" for="categorias1">
                                paciente
                            </label>
                        </div>
                        {{-- Input de categoria totales --}}
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="categorias" id="categorias2" value="totales">
                            <label class="form-check-label" for="categorias2">
                                totales
                            </label>
                        </div>
                        {{-- Boton submit para fechas --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    {{-- Tabla de las prendas --}}
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaPrendas">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Prendas vendidas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pacientes as $key => $paciente)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$paciente->nombre}}</td>
                                    <td>{{$paciente->paterno}}</td>
                                    <td>{{$paciente->materno}}</td>
                                    <td>{{count($ventas)}}</td>
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <p>
                                <strong>TOTAL DE PRENDAS VENDIDAS</strong>
                                <br>
                                <h3>48</h3>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#listaPrendas').DataTable();
    } );
</script>


<script>
   $('.input-fecha').change(function(){
       alert($(this).val());
   });
</script>

@endsection