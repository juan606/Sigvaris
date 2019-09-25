@extends('principal')
@section('content')

    <div class="container">
        <div class="card">
            {{-- TITULO DEL REPORTE --}}
            <div class="card-header">
                <h3>Reporte de prendas compradas</h3>
            </div>
            {{-- BUSCADOR PACIENTES --}}
            <div class="card-body">
                <form action="{{route('reportes.4a')}}" method="POST" class="form-inline">
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
            @if ( isset($comprasPorCliente) )
            {{-- TABLA PACIENTES --}}
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                    <thead>
                        <tr class="info">
                            <th># Compras</th>
                            <th># Pacientes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comprasPorCliente as $key => $compra)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$compra}}</td>
                                </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
            {{-- RESUMEN INFORMACIÓN --}}
            {{-- <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4"></div>
                    <div class="col-12 col-md-4">
                        <h5 class="text-center">
                            <strong>TOTAL DE PACIENTES</strong>
                            <br>
                            {{count($comprasPorCliente)}}
                        </h5>
                    </div>
                </div>
            </div> --}}
            {{-- GRAFICA DE LA TABLA --}}
            <div class="card-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
            {{-- BOTÓN DE DESCARGA PDF --}}
            <div class="card-body">
                <button class="btn btn-success" id="download-pdf">Descargar PDF</button>
            </div>
            @endif
        </div>
    </div>

{{-- SCRIPT PARA DESCARGAR EN PDF --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

{{-- SCRIPTS PARA GRAFICAR DE TABLA --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

<script>

var canvas = document.getElementById("canvas");
var ctx = canvas.getContext('2d');
ctx.fillStyle = "#FFFFFF";

var comprasPorClienteArray = {!! json_encode($comprasPorCliente) !!};
comprasPorClienteArray = Object.values(comprasPorClienteArray);

var numeroPrendasArray = {!! json_encode($comprasPorCliente) !!};
numeroPrendasArray = Object.keys(numeroPrendasArray);

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
  labels: numeroPrendasArray,
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
      data: comprasPorClienteArray,
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

//add event listener to 2nd button
document.getElementById('download-pdf').addEventListener("click", downloadPDF2);

//download pdf form hidden canvas
function downloadPDF2() {
	var newCanvas = document.querySelector('#canvas');

  //create image from dummy canvas
	var newCanvasImg = newCanvas.toDataURL("image/png", 1.0);
  
  	//creates PDF from img
	var doc = new jsPDF('landscape');
	doc.setFontSize(20);
	doc.text(15, 15, "Prendas vendidas");
	doc.addImage(newCanvasImg, 'PNG', 10, 10, 280, 150 );
	doc.save('prendas-vendidas.pdf');
 }

</script>

@endsection