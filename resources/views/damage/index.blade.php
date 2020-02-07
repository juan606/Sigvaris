@extends('principal')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>DAMAGE</h4>
            <div class="input-group-prepend">
                <span class="input-group-text" >Sku producto</span>              
                <input type="text" class="form-control" id="Sku1" aria-describedby="basic-addon3">
            </div> 
        </div>
            
        <div class="card-body" id="Cuerpo" style="display: none;">
            <div class="row">
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">Nombre: </label>
                    <input type="text" class="form-control" id="sku" required readonly>
                </div>
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">RFC: </label>
                    <input type="text" class="form-control" id="descripcion" required readonly>
                </div>
                <div class="col-4 form-group">
                    <label for="" class="text-uppercase text-muted">Celcular: </label>
                    <input type="number" id="precio_publico" class="form-control" required readonly>
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
                        <option value="1">defecto de fabrica</option>
                        <option value="2">hilo jalado</option>
                        <option value="3">hilos sueltos</option>
                        <option value="4">roto</option>
                        <option value="5">surcidos adicionales</option>
                        <option value="6">silicon</option>
                        <option value="7">producto no correspondo al código de caja</option>
                        <option value="8">puente dañado</option>
                    </select>  
                </div>
            </div>

            <div class="row">
                <div class="col-sm-2 m-auto">
                    <button class="btn btn-outline-secondary" type="button" id="reporte">Devolver</button>
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
            url:"SerchProductoExit",

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
    });

    function Devolver(){
        $.ajax({
             type: "POST",
            data: {"_token": $("meta[name='csrf-token']").attr("content"),
                    "sku" : $('#sku').val(),
                    "damage" : $('#damage').val(),
                    "id_usuario" : $('#id_usuario').val()
            },
            url:"Devolucion_Damage",

            success: function (data) {
                
            }
        
            });
    }
</script>
@endsection