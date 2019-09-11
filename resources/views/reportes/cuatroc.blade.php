@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Reporte de prendas vendidas</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.4c')}}" method="POST" class="form">
                @csrf
                {{-- Boton restar inputs --}}
                <button type="button" id="restarInput" class="btn btn-danger mr-1 mb-2"><i class="fas fa-minus"></i></button>
                {{-- Boton añadir inputs --}}
                <button type="button" id="agregarInput" class="btn btn-success mr-3 mb-2"><i class="fas fa-plus"></i></button>
                <div class="row" id="contenedorInputs">
                    {{-- Input de fecha mes --}}
                    <div class="col-3 contenedorMes mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Mes</div>
                            </div>
                            <input type="number" class="form-control" name="mes[]" required min="1" max="12" required>
                        </div>
                    </div>
                    {{-- Input fecha año --}}
                    <div class="col-3 contenedorAnio mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Año</div>
                            </div>
                            <input type="number" class="form-control" name="anio[]" required min="2000" max="2100" required>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-primary">Buscar</button>
            </form>
        </div>
        @if ( isset($anios) )
            {{-- Lista de pacientes --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>SKUS</th>
                            @for ($i = 0; $i < count($anios); $i++)
                                <th>{{sprintf("%02d", $meses[$i])}}-{{sprintf("%02d", $anios[$i])}}</th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skus as $sku)
                            <tr>
                                <td>{{$sku}}</td>
                                @for ($i = 0; $i < count($anios); $i++)
                                    <td>
                                        {{
                                            count(
                                                App\Venta::
                                                whereYear('fecha',$anios[$i])->
                                                whereMonth('fecha',$meses[$i])->
                                                with('productos')->
                                                get()->
                                                pluck('productos')->
                                                flatten()->
                                                where('sku',$sku)
                                            )
                                        }}
                                    </td>
                                @endfor                              
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
            {{-- Resumen de información --}}
            {{-- <div class="card-body">
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
            </div> --}}
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

<script>

const inputs =  `{{-- Input de fecha mes --}}
                    <div class="col-3 contenedorMes mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Mes</div>
                            </div>
                            <input type="number" class="form-control" name="mes[]" required>
                        </div>
                    </div>
                    {{-- Input fecha año --}}
                    <div class="col-3 contenedorAnio mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Año</div>
                            </div>
                            <input type="number" class="form-control" name="anio[]" required>
                        </div>
                    </div>`;

$("#agregarInput").click(function(){  
    $("#contenedorInputs").append(inputs);  
});

$("#restarInput").click(function(){  
    $('#contenedorInputs .contenedorMes').last().remove();
    $('#contenedorInputs .contenedorAnio').last().remove();
});

</script>

@endsection