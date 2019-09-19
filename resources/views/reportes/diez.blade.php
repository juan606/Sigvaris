@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3> Reporte de recomendaciones de doctor</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.10')}}" method="POST" class="form-inline">
                @csrf
                {{-- Año inicial --}}
                <div class="input-group mr-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">DE: </div>
                    </div>
                    <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" required>
                </div>
                {{-- Año final --}}
                <div class="input-group mr-3">
                    {{-- <label for="anioFinal">A: </label> --}}
                    <div class="input-group-prepend">
                        <div class="input-group-text">A: </div>
                    </div>
                    <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" required>
                </div>
                <button class="btn btn-primary">Buscar</button>
            </form>
        </div>
        {{-- @if ( isset($pacientes_sin_compra) ) --}}
            {{-- TABLA DOCTORES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>Médico</th>
                            <th># recomendados</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctores as $key => $pacientes)
                        {{-- {{dd($doctores)}} --}}
                            <tr>
                                <td>{{ !App\Doctor::find($key) ? : App\Doctor::find($key)->nombre }} {{ !App\Doctor::find($key) ? : App\Doctor::find($key)->apellidopaterno }} {{ !App\Doctor::find($key) ? : App\Doctor::find($key)->apellidomaterno }}</td>
                                <td>{{count($pacientes)}}</td>
                            </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
            {{-- GRAFICA DE TABLA --}}
            <div class="card-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        {{-- @endif --}}
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#listaEmpleados').DataTable();
    } );
</script>

{{-- SCRIPTS PARA GRAFICAR TABLAS --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>
var url = "{{url('stock/chart')}}";
var Years = <?php echo json_encode($nombresDoctores) ?>;
var Labels = new Array("l1", "l2", "l3");
var Prices = <?php echo json_encode($numRecomendadosPorDoctor) ?>;
var doctores = <?php echo json_encode($doctores) ?>;

$(document).ready(function(){
    // $.get(url, function(response){
    // response.forEach(function(data){
    //     Years.push(data.stockYear);
    //     Labels.push(data.stockName);
    //     Prices.push(data.stockPrice);
    // });

    console.log(doctores);

    for (const key in doctores) {
        if (doctores.hasOwnProperty(key)) {
            const element = doctores[key];
            Years.push(element.length);
        }
    }

    console.log(Years);

    var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:Years,
                datasets: [{
                    label: 'Total de pacientes',
                    data: Prices,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    // });
});
</script>


@endsection