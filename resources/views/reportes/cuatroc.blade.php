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
            {{-- TABLA DE PACIENTES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>SKUS</th>
                            @for ($i = 0; $i < count($anios); $i++)
                            <th>{{sprintf("%02d", $meses[$i])}}-{{sprintf("%02d", $anios[$i])}}</th>
                            @endfor
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skus as $sku)
                            <tr class="text-center">
                                <td>{{$sku}}</td>
                                @for ($i = 0; $i < count($anios); $i++)
                                <td>{{count(App\Venta::whereYear('fecha',$anios[$i])->whereMonth('fecha',$meses[$i])->with('productos')->get()->pluck('productos')->flatten()->where('sku',$sku))}}</td>
                                @endfor
                                <td class="text-success">{{count(App\Venta::with('productos')->get()->pluck('productos')->flatten()->where('sku',$sku))}}</td>                          
                            </tr>
                        @endforeach
                            <tr class="text-center">
                                <td><strong>TOTAL</strong></td>
                                @for ($i = 0; $i < count($anios); $i++)
                                <td class="text-success">{{count(App\Venta::whereYear('fecha',$anios[$i])->whereMonth('fecha',$meses[$i])->with('productos')->get()->pluck('productos')->flatten())}}</td>
                                @endfor
                                <td></td>
                            </tr>
                    </tbody>    
                </table>
            </div>
            {{-- INFORMACION GENERAL TABLA --}}
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
            {{-- GRAFICA DE TABLA --}}
            <div class="card-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        @endif
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

{{-- SCRIPTS PARA GRAFICAR DE TABLA --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

<script>

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext('2d');

var arrayMesesYAnios = {!! json_encode($arrayMesesYAnios) !!};
arrayMesesYAnios = Object.values(arrayMesesYAnios);

var totalVentasPorMesYAnio = {!! json_encode($totalVentasPorMesYAnio) !!};
totalVentasPorMesYAnio = Object.values(totalVentasPorMesYAnio);

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: arrayMesesYAnios,
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
      data: totalVentasPorMesYAnio,
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