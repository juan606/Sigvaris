@extends('principal')
@section('content')
    <div class="container">
        <div class="card">
            {{-- TITULO DE LA SECCIÓN ACTUAL --}}
            <div class="card-header">
                <h3>Prendas vendidas por rango de fecha</h3>
            </div>
            {{-- CONTENEDOR BUSCADOR DE PACIENTES --}}
            <div class="card-body">
                <form action="{{route('reportes.3')}}" method="POST" class="form-inline">
                    @csrf
                    {{-- INPUT DE FECHA INICIAL --}}
                    <div class="form-group mr-3">
                        <label for="fechaInicial"></label>
                        <input type="date" class="form-control" name="fechaInicial" value="{{Request::old('fechaInicial')}}" id="fechaInicial" required>
                    </div>
                    {{-- INPUT DE FECHA FINAL --}}
                    <div class="form-group mr-4">
                        <label for="fechaFinal"></label>
                        <input type="date" class="form-control" name="fechaFinal" id="fechaFinal" value="{{Request::old('fechaFinal')}}" required>
                    </div>
                    <button class="btn btn-primary">Buscar</button>
                </form>
            </div>
            @if ( isset($arregloFechasConVentas) )
            {{-- LISTA DE PACIENTES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>Fecha</th>
                            <th># Pacientes</th>
                            <th># Prendas</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($ventas as $paciente_id => $ventasPorFecha) --}}
                            @for ($i = 0; $i < count($arregloFechasConVentas); $i++)
                                
                                <tr>
                                    <td>{{$arregloFechasConVentas[$i]}}</td>
                                    <td>{{$arregloTotalPacientesConUnProducto[$i]}}</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>{{$arregloFechasConVentas[$i]}}</td>
                                    <td>{{$arregloTotalPacientesConMasDeUnProducto[$i]}}</td>
                                    <td class="text-success">>1</td>
                                </tr>
                            @endfor
                        {{-- @endforeach --}}
                    </tbody>    
                </table>
            </div>
            {{-- INFORMACION GENERAL DE LA BUSQUEDA --}}
            {{-- <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Total de ventas</label>
                            <input type="text" class="form-control" readonly value="{{ count( $ventas->pluck('productos')->flatten() ) }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="">Total de días</label>
                            <input type="text" class="form-control" readonly value="{{ count( $rangoDias ) }}">
                        </div>
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

{{-- SCRIPTS PARA GRAFICAR DE TABLA --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

<script>

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext('2d');

var arregloSumaPacientes = {!! json_encode($arregloSumaPacientes) !!};
arregloSumaPacientes = Object.values(arregloSumaPacientes);

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ['Una prenda', '> Una prenda'],
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
      data: arregloSumaPacientes,
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
                     labelString: '# pacientes vs # prendas',
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