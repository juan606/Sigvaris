@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Pacientes por año y mes</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.5')}}" method="POST" class="form-inline">
                @csrf
                {{-- Año inicial --}}
                <label for="anioInicial">DE: </label>
                <div class="input-group mr-3 ml-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Año</div>
                    </div>
                    <input type="number" class="form-control" id="anioInicial" name="anioInicial" required min="2010" max="2100">
                </div>
                {{-- Año final --}}
                <label for="anioFinal">A: </label>
                <div class="input-group mr-3">
                    {{-- <label for="anioFinal">A: </label> --}}
                    <div class=" ml-3 input-group-prepend">
                        <div class="input-group-text">Año</div>
                    </div>
                    <input type="number" class="form-control" id="anioFinal" name="anioFinal" required min="2010" max="2100">
                </div>
                {{-- Selección de tipo --}}
                <div class="btn-group btn-group-toggle mr-3" data-toggle="buttons">
                    <label class="btn btn-success active">
                        <input type="radio" name="opciones" value="primeraVez" id="option1" autocomplete="off" checked> 1° vez
                    </label>
                    <label class="btn btn-success">
                        <input type="radio" name="opciones" value="recompra" id="option3" autocomplete="off"> Recompra
                    </label>
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
                            <th>mes</th>
                            @foreach ($anios as $anio)
                                <th>{{$anio}}</th>
                            @endforeach
                        </tr>
                        
                    </thead>
                    <tbody>
                        
                            @foreach ($meses as $mes)
                                <tr>
                                    <td>{{$mes}}</td>
                                    @foreach($anios as $key => $anio)
                                    {{--  --}}
                                    @if ($opcion == "primeraVez")
                                    <td>{{count(App\Paciente::whereYear('created_at',$anio)->whereMonth('created_at',$mes)->has('ventas')->get())}}</td>
                                    @else
                                    <td>{{count(App\Paciente::whereYear('created_at',$anio)->whereMonth('created_at',$mes)->doesnthave('ventas')->get())}}</td>
                                    @endif
                                    
                                    @endforeach
                                </tr>
                            @endforeach

                            
                        
                    </tbody>    
                </table>
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