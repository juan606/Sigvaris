@extends('principal')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')

<div class="container">

    
    <div class="card">
        <div class="card-header">
            <h4>Historial Ventas</h4>
        </div>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Desde</span>              
                    <input type="date" class="form-control" id="desde" aria-describedby="basic-addon3">
                </div>            
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">Hasta</span>
                    <input type="date" class="form-control" id="hasta" aria-describedby="basic-addon3">
                    <button class="btn btn-outline-secondary" type="button" id="reporte">Buscar</button>
                </div>                
            </div>        
            <table class="table">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Descuento</th>
                        <th>Fecha</th>
                        <th>Operación</th>
                    </tr>
                </thead>
                <tbody id="ventas">
                    @if(!$ventas)
                    <h3>No hay ventas registrados</h3>
                    @else
                     @php
                        $sumatoria_ventas=0;
                        $sumatoria_pacientes=[];
                    @endphp
                    @foreach($ventas as $venta)
                        @php
                           $sumatoria_ventas+=$venta->total;
                           $val=1;
                           foreach ($sumatoria_pacientes as $p) {
                               if($p==$venta->paciente->id)
                               {
                                    $val=0;
                               }
                           }
                           if($val)
                           {
                                array_push($sumatoria_pacientes,$venta->paciente->id);
                           }
                        @endphp
                        <tr>
                            <td>{{$venta->id}}</td>
                            <td>{{$venta->paciente->nombre}}</td>
                            <td>{{$venta->total}}</td>
                            @if($venta->descuento)
                                <td>{{$venta->descuento->nombre}}</td>
                            @else
                                <td></td>
                            @endif
                            <td>{{$venta->fecha}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-auto pr-2">
                                        <a href="{{route('ventas.show', ['venta'=>$venta])}}"
                                            class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <thead>
                        <tr>
                            <th>Total ventas</th>
                            <th>Total clientes</th>
                            <th>Total $</th>
                        </tr>
                    </thead>
                    <tbody id="resultados">
                        <tr>
                            <td>{{count($ventas)}}</td>
                            <td>{{count($sumatoria_pacientes)}}</td>
                            <td>${{$sumatoria_ventas}}</td>
                        </tr>
                    </tbody>                          
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#reporte').click(function(){        
        $.ajax({
            url:"{{ url('/get_ventas') }}",
            type: "POST",
            data:{
                "_token": "{{CSRF_TOKEN()}}",
                "desde":$('#desde').val(),
                "hasta":$('#hasta').val()
            },
            dataType:"json",
            success:function(res){
                $('tbody').find("tr").remove();
                var ventas_total=0;
                var total_realizadas=0;
                var total_clientes=[];
                var val=1;
                $.each(res,function(i,item){
                    //console.log(item.id);
                    val=1;
                   $('#ventas').append(`
                    <tr>
                        <td>`+item.id+`</td>
                        <td>`+item.paciente.nombre+`</td>
                        <td>`+item.total+`</td>
                        <td>`+(item.descuento_id?item.descuento.nombre:``)+`</td>
                        <td>`+item.fecha+`</td>
                        <td>
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <a href="{{ url('/ventas') }}/`+item.id+`"
                                        class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    `); 
                    ventas_total+=parseFloat(item.total);
                    total_realizadas++;
                    $.each(total_clientes,function(e,element){
                        if(element==item.paciente_id)
                        {
                            val=0;
                        }
                    });
                    if(val)
                    {
                        total_clientes.push(item.paciente_id);
                    }
                });
                $('#resultados').append(`
                    <tr>
                        <td>`+total_realizadas+`</td>
                        <td>`+total_clientes.length+`</td>
                        <td>$`+ventas_total+`</td>
                    </tr>
                    `);
                // var count = Object.keys(res).length;
                // console.log(count);
                //console.log(res[0]);
            },
            error:function(error){
                console.log("error");
            }
        });
    });
</script>
@endsection