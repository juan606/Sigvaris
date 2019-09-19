@extends('principal')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Prendas vendidas por paciente</h3>
            </div>
            {{-- Buscador de pacientes --}}
            <div class="card-body">
                <form action="{{route('reportes.4d')}}" method="POST" class="form-inline">
                    @csrf
                    {{-- INPUT AÑO INICIAL --}}
                    <label for="anioInicial" class="mr-2">de: </label>
                    <div class="input-group mr-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">AÑO: </div>
                        </div>
                    <input type="number" min="2000" max="2100" class="form-control" id="anioInicial" name="anioInicial" value="{{ old('anioInicial') }}" required>
                    </div>
                    {{-- INPUT AÑO FINAL --}}
                    <label for="anioInicial" class="mr-2">a: </label>
                    <div class="input-group mr-3">
                        {{-- <label for="anioFinal">A: </label> --}}
                        <div class="input-group-prepend">
                            <div class="input-group-text">AÑO: </div>
                        </div>
                        <input type="number" min="2000" max="2100" class="form-control" id="anioFinal" name="anioFinal" required value="{{old('anioFinal')}}">
                    </div>
                    <button class="btn btn-primary">Buscar</button>
                </form>
            </div>
            @if ( isset($anioInicial) )
                {{-- TABLA DE PACIENTES --}}
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                        <thead>
                            <tr class="info text-center">
                                <th>mes</th>
                                @for ($anio = $anioInicial; $anio <= $anioFinal; $anio++)
                                <th>{{$anio}}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meses as $mesNumerico => $mesTextual)
                                <tr>
                                    <td>{{$mesTextual}}</td>
                                    @for ($anio = $anioInicial; $anio <= $anioFinal; $anio++)
                                    <td>{{count(App\Venta::whereYear('fecha',$anio)->whereMonth('fecha',$mesNumerico)->get()->pluck('productos')->flatten())}}</td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
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

var datasets = new Array();

var aniosSolicitados = {!! json_encode($aniosSolicitados) !!};
var productosPorAnio = {!! json_encode($productosPorAnio) !!};
var aniosYProductosPorMes = {!! json_encode($aniosYProductosPorMes) !!};
console.log(aniosSolicitados);
console.log('aniosYProductosPorMes',Object.values(aniosYProductosPorMes[0])[0]);

for (const i in aniosSolicitados) {
    if (aniosSolicitados.hasOwnProperty(i)) {
        
        const anio = aniosSolicitados[i];
       
        console.log('anio',anio);

        const color = getRandomColor();    
        
        const objeto = {
            label: aniosSolicitados[i],
            fill: false,
            lineTension: 0.1,
            backgroundColor: color,
            borderColor: color, // The main line color
            borderCapStyle: 'square',
            borderDash: [], // try [5, 15] for instance
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "black",
            pointBackgroundColor: "white",
            pointBorderWidth: 1,
            pointHoverRadius: 8,
            pointHoverBackgroundColor: color,
            pointHoverBorderColor: "brown",
            pointHoverBorderWidth: 2,
            pointRadius: 4,
            pointHitRadius: 10,
            // notice the gap in the data and the spanGaps: true
            data: Object.values(aniosYProductosPorMes[i])[0],
            spanGaps: true,
        };

        datasets.push(objeto);
        
    }
}

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

console.log(datasets);

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: datasets
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
                     labelString: 'Moola',
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