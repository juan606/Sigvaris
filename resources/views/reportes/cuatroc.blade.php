@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Reporte de prendas por sku</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.4c')}}" method="POST" class="form-inline">
                @csrf
                {{-- Input de fecha inicial --}}
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Mes</div>
                    </div>
                    <input type="number" class="form-control" id="mes" name="mes" required>
                </div>
                {{-- Input fecha final --}}
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Año</div>
                    </div>
                    <input type="number" class="form-control" id="anio" name="anio" required>
                </div>
                <button class="btn btn-primary">Buscar</button>
            </form>
        </div>
        {{-- @if ( isset($pacientes_sin_compra) ) --}}
            {{-- Lista de pacientes --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>SKU</th>
                            <th>Mes 1</th>
                            <th>Mes 2</th>
                            <th>Mes 3</th>
                            <th>Mes 4</th>
                            <th>Mes 5</th>
                            <th>Mes 6</th>
                            <th>Mes 7</th>
                            <th>Mes 8</th>
                            <th>Mes 9</th>
                            <th>Mes 10</th>
                            <th>Mes 11</th>
                            <th>Mes 12</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($pacientes_sin_compra as $key => $paciente) --}}
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>                                
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>    
                </table>
            </div>
            {{-- Resumen de información --}}
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <strong>TOTAL PRENDAS</strong>
                        <input type="text" readonly value="0" class="form-control">
                    </div>
                    <div class="col-12 col-md-3">
                        <strong>TOTAL SKU</strong>
                        <input type="text" readonly value="0" class="form-control">
                    </div>
                </div>
            </div>
        {{-- @endif --}}
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