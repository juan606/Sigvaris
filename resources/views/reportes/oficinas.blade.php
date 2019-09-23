@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        {{-- ENCABEZADO DE LA SECCIÓN --}}
        <div class="card-header">
            <h3>Reporte de ventas por oficina</h3>
        </div>
        {{-- BUSCADOR --}}
        <div class="card-body">
            <form action="">
                <div class="row">
                    {{-- INPUT FECHA INICIAL --}}
                    <div class="col-12 col-md-3 mt-3">
                        <label for="fechaInicial"><strong>Fecha inicial</strong></label>
                        <div class="input-group mr-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">DE: </div>
                            </div>
                            <input type="date" class="form-control" id="fechaInicial" name="fechaInicial" required>
                        </div>
                    </div>
                    {{-- INPUT FECHA FINAL --}}
                    <div class="col-12 col-md-3 mt-3">
                        <label for="fechaInicial"><strong>Fecha final</strong></label>
                        <div class="input-group mr-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">A: </div>
                            </div>
                            <input type="date" class="form-control" id="fechaInicial" name="fechaFinal" required>
                        </div>
                    </div>
                    {{-- INPUT OFICINA --}}
                    <div class="col-12 col-md-3 mt-3">
                        <label for="fechaInicial"><strong>Oficina</strong></label>
                        <select name="oficinaId" class="form-control" required>
                            <option value="">Seleccionar</option>
                            @foreach ($oficinas as $oficina)
                            <option value="{{$oficina->id}}">{{$oficina->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- BOTON PARA BUSCAR --}}
                    <div class="col-12 col-md-3 mt-3">
                        <br>
                        <button type="submit" class="btn btn-success">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        {{-- TABLA DE VENTAS --}}
        @if ( count($ventasPorDia) )
            {{-- Lista de pacientes --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th>DIA</th>
                            <th># productos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arregloDiasQueVendieron as $key => $dia)
                            <tr>
                                <td>{{$dia}}</td>
                                <td>{{$ventasPorDia[$key]}}</td>
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

var ventasPorDia = {!! json_encode($ventasPorDia) !!};
var arregloDiasQueVendieron = {!! json_encode($arregloDiasQueVendieron) !!};
var sucursal = {!! json_encode($oficina_nombre) !!};

console.log(ventasPorDia);

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

var color = getRandomColor();

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: arregloDiasQueVendieron,
  datasets: [{
            label: 'Ventas de '+sucursal,
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
            data: ventasPorDia,
            spanGaps: true,
        },]
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