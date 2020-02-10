@extends('principal')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h4>DAMAGE</h4>
            <div class="input-group-prepend">
                <span class="input-group-text" >Sku producto</span>   
                <select class="form-control" id="Sku1" >
                    <option value="0">Selecciona...</option>
                        @foreach($Productos as $Producto)     
                            
                            <option value="{{ $Producto->sku }}">{{ $Producto->sku }}</option>
                        @endforeach
                    </select>   
                
            </div> 
        </div>
            
        <div class="card-body" id="Cuerpo" style="display: none;">
            <div class="row">
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" value="{{ $Venta->paciente->nombre." ".$Venta->paciente->paterno." ".$Venta->paciente->materno}}"required readonly>
                </div>
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">RFC: </label>
                    <input type="text" class="form-control" id="rcf"  value="{{ $Venta->paciente->rcf}}"required readonly>
                </div>
            </div>
           <div class="row">
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">sku: </label>
                    <input type="text" class="form-control" id="sku" required readonly>
                </div>
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">Descripcion: </label>
                    <input type="text" class="form-control" id="descripcion" required readonly>
                </div>
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">Precio: </label>
                    <input type="number" id="precio_publico" class="form-control" required readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">fecha: </label>
                    <input type="date" name="fecha" class="form-control" readonly="" value="{{date('Y-m-d')}}" required="">
                </div>
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">Descripcion del daño : </label>
                    <select class="form-control" name="damage" id="damage" >
                        <option value="0">Selecciona...</option>
                        <option value="defecto de fabrica">defecto de fabrica</option>
                        <option value="hilo jalado">hilo jalado</option>
                        <option value="hilos sueltos">hilos sueltos</option>
                        <option value="roto">roto</option>
                        <option value="surcidos adicionales">surcidos adicionales</option>
                        <option value="silicon">silicon</option>
                        <option value="producto no correspondo al código de caja">producto no correspondo al código de caja</option>
                        <option value="puente dañado">puente dañado</option>
                    </select>  
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2 m-auto">
                    <button class="btn btn-outline-secondary" type="button" id="reporte" >Devolver</button>
                </div>
            </div>
            

        </div>
    </div>
</div>
<script type="text/javascript">
     $(document).ready(function () {
        
        $('#Sku1').change(function(){  
            $.ajax({
             type: "POST",
            data: {"_token": $("meta[name='csrf-token']").attr("content"),
                    "sku" : $('#Sku1').val()
            },
            url:"/SerchProductoExit",

            success: function (data) {
                console.log(data.Ex);
                if (data.Ex==1) {
                    $('#Cuerpo').show();
                    $('#sku').val( $('#Sku1').val());
                    $('#descripcion').val( data.Producto.descripcion);
                    $('#precio_publico').val( data.Producto.precio_publico);
                    $('#stock').val( data.Producto.stock);
                    console.log(data.Producto.descripcion);
                    console.log(data.Producto.precio_publico);
                    console.log(data.Producto.precio_publico_iva);
                }else{
                    $('#Cuerpo').hide();
                }
                
            }
        
            });
        });
        $('.btn').click(function(){
               $.ajax({
             type: "POST",
            data: {"_token": $("meta[name='csrf-token']").attr("content"),
                    "sku" : $('#sku').val(),
                    "damage" : $('#damage').val(),
                    "id_venta" : {{ $Venta->id}}
            },
            url:"/Devolucion_Damage",

            success: function (data) {
                window.location="{{route('ventas.index')}}";
            }
        
            }); 
           });
    });

    function Devolver(){
       
    }
</script>
@endsection