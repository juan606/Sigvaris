@extends('principal')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Ventas de fitter </h3>
            </div>
            {{-- Buscador de pacientes --}}
            <div class="card-body">
                <form action="{{route('reportes.metas')}}" method="POST" class="form-row">
                    @csrf
                    {{-- Input de fecha inicial --}}
                    <div class="form-group col-md-2">
                        <label for="fechaInicial">Fecha inicial</label>
                        <input type="month" class="form-control" name="fechaInicial" id="fechaInicial" placeholder="2019-04"
                            pattern="2[0-9]{3,3}-((0[1-9])|(1[012]))" title="Escriba una fecha valida AAAA-MM" required>
                    </div>
                    {{-- Input fecha final --}}
                    <div class="form-group col-md-2">
                        <label for="fechaFinal">Fecha final</label>
                        <input type="month" class="form-control" name="fechaFinal" id="fechaFinal" placeholder="2019-04"
                            pattern="2[0-9]{3,3}-((0[1-9])|(1[012]))" title="Escriba una fecha valida AAAA-MM" required>
                    </div>
                    {{-- Input oficinaId --}}
                    <div class="form-group col-md-3">
                        <label for="oficina_id">Oficina</label>
                        <select name="oficinaId" class="form-control" id="selectOficina">
                            <option value="">Todas</option>
                            @foreach ($oficinas as $oficina)
                                <option value="{{$oficina->id}}">{{$oficina->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- SELECT EMPLEADOS FITTERS --}}
                    <div class="form-group col-md-3">
                        <label class="mx-3">fitter</label>
                        <select name="empleadoFitterId" class="form-control mr-4" id="selectEmpleadosFitter">
                            <option value="">Todos</option>
                            @foreach ($empleadosFitter as $empleadoFitter)
                                <option value="{{$empleadoFitter->id}}">
                                    {{$empleadoFitter->nombre}} {{$empleadoFitter->appaterno}} {{$empleadoFitter->apmaterno}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-primary my-4">Buscar</button>
                    </div>
                </form>
            </div>
            @if ( isset($fitter) )
                <div class="input-group col-md-5 my-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Nombre de la fitter</span>
                    </div>
                    <input type="text" class="form-control" @if(isset($fitter))value="{{ $fitter->nombre ." ".$fitter->appaterno ." ".$fitter->apmaterno}}" @else value="--"@endif readonly="">
                </div>
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                        <thead>
                            <tr class="info text-center">
                                <th>Mes</th>
                                <th colspan="3">Monto de venta</th>
                                <th colspan="3">Pacientes > 1 prenda</th>
                                <th colspan="3">Recompras</th>
                            </tr>
                            <tr class="info text-center">
                                <th></th>
                                <th>Cuota</th>
                                <th>Real</th>
                                <th>%</th>
                                <th>Cuota</th>
                                <th>Real</th>
                                <th>%</th>
                                <th>Cuota</th>
                                <th>Real</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datosVentasMes["montoVenta"] as $key => $row)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>${{ $row["meta"] }}</td>
                                <td>${{ number_format($row["valor"], 2) }}</td>
                                <td>{{ number_format($row["porcentaje"], 2) }}%</td>
                                <td>{{ $datosVentasMes["pacientes"][$key]["meta"] }}</td>
                                <td>{{ $datosVentasMes["pacientes"][$key]["valor"] }}</td>
                                @if($datosVentasMes["pacientes"][$key]["porcentaje"] != "-")
                                    <td>{{ $datosVentasMes["pacientes"][$key]["porcentaje"] }}%</td>
                                @else
                                    <td>{{ $datosVentasMes["pacientes"][$key]["porcentaje"] }}</td>
                                @endif
                                <td>{{ $datosVentasMes["recompras"][$key]["meta"] }}</td>
                                <td>{{ $datosVentasMes["recompras"][$key]["valor"] }}</td>
                                @if($datosVentasMes["recompras"][$key]["porcentaje"] != "-")
                                    <td>{{ $datosVentasMes["recompras"][$key]["porcentaje"] }}%</td>
                                @else
                                    <td>{{ $datosVentasMes["recompras"][$key]["porcentaje"] }}</td>
                                @endif
                            </tr>
                            @endforeach
                            <tr class="text-center">
                                <td>TOTAL</td>
                                <td>${{ $row["meta"] }}</td>
                                <td>${{ number_format($datosVentasMes["totales"]["montoVenta"]["valor"], 2) }}</td>
                                <td>{{ $datosVentasMes["totales"]["montoVenta"]["porcentaje"] }}%</td>
                                <td>{{ $datosVentasMes["pacientes"][$key]["meta"] }}</td>
                                <td>{{ $datosVentasMes["totales"]["pacientes"]["valor"] }}</td>
                                <td>{{ $datosVentasMes["totales"]["pacientes"]["porcentaje"] }}</td>
                                <td>{{ $datosVentasMes["recompras"][$key]["meta"] }}</td>
                                <td>{{ $datosVentasMes["totales"]["recompras"]["valor"] }}</td>
                                <td>{{ $datosVentasMes["totales"]["recompras"]["porcentaje"] }}</td>
                            </tr>
                        </tbody>    
                    </table>
                </div>
            @endif
        </div>
    </div>

<script src="{{ URL::asset('js/handleFitters.js') }}"></script>
<script>
    $(document).on('change', '#selectOficina', function(){
        const OFICINA_ID = $(this).val();
        actualizarOpcionesFitters(OFICINA_ID);
    });
</script>
    
@endsection