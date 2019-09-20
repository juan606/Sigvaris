@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Reporte de prendas por sku</h3>
        </div>
        {{-- Buscador de pacientes --}}
        <div class="card-body">
            <form action="{{route('reportes.4b')}}" method="POST" class="form-inline">
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
        @if ( isset($skus) )
        {{-- TABLA --}}
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                <thead>
                    <tr class="info">
                        <th># Paciente</th>
                        <th># Prendas</th>
                        <th>SKU</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($skus as $key => $sku)
                        @foreach ($arrayNumPrendasVendidasDeSkus[$key] as $key2 => $prendasVendidasDeSku)
                        <tr>
                            <td>{{$arrayNumPacientes[$key][$key2]}}</td>
                            <td>{{$prendasVendidasDeSku}}</td>
                            <td>{{$sku}}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>    
            </table>
        </div>
        {{-- INFORMACION GENERAL --}}
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
        {{-- <div class="card-body">
            <canvas id="canvas" height="280" width="600"></canvas>
        </div> --}}
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

{{-- SCRIPTS PARA GRAFICAR DE TABLA --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

<script>

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext('2d');




// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ['1','2','3'],
  datasets: [{
      label: "Numero de pacientes",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(50,200,50,0.9)",
      borderColor: "rgba(50,200,50,0.9)", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "white",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "red",
      pointHoverBorderColor: "brown",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: ['1','2','3'],
      spanGaps: true,
    }
  ]
};

// Notice the scaleLabel at the same level as Ticks
var options = {
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Número de pacientes vs compras realizadas',
                     fontSize: 20 
                  }
            }]            
        }  
};

// Chart declaration:
var myBarChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});

</script>

@endsection