@extends('principal')
@section('content')
<meta name="csrf-token" content="{{ Session::token() }}"> 
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Crear Producto</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong> Lista de Productos</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form role="form" id="form-cliente" method="POST" action="{{ route('productos.store') }}" name="form">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-3 form-group">
                            <label id="No_repetido" class="control-label">✱SKU:</label>
                            <div id="repetido" class=" text-danger" style="display: none;">
                                ✱SKU repetido, no debe coincidir con UPC ni con Swiss ID existente 
                            </div>
                            <input type="text" id="sku" name="sku" class="form-control" required="">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">Descripcion:</label>
                            <input type="text" name="descripcion" class="form-control">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">✱Precio Distribuidor:</label>
                            <input type="text" name="precio_distribuidor" class="form-control" required="">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">✱Precio público S/IVA:</label>
                            <input type="text" name="precio_publico" class="form-control" required="" id="precio">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">✱Stock:</label>
                            <input type="number" name="stock" class="form-control" step="1" required="" id="stock">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">✱Precio público C/IVA:</label>
                            <input type="number" name="precio_publico_iva" class="form-control" step="0.01" required="" id="precio_iva" readonly="">
                        </div>
                        <input type="hidden" name="oficina_id" value="{{session('oficina')}}">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-4 offset-4 text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> Guardar
                            </button>
                        </div>
                        <div class="col-4 text-right text-danger">
                            ✱Campos Requeridos.
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#precio').change(function(){
        $('#precio_iva').val((parseFloat($(this).val())*0.16)+parseFloat($(this).val()));

        
    });
    $('#sku').change( function() {
            $.ajax({
                url:"getProductoExists",
                type:'POST',
                data: {"_token": $("meta[name='csrf-token']").attr("content"),
                    "sku":$("#sku").val()
                },
                dataType:'json',
                success: function(res){
                    if(res){
                        $('#repetido').show();
                        $('#No_repetido').hide();
                    }else{
                        $('#repetido').hide();
                        $('#No_repetido').show();
                    }
                },
                error: function(e){
                    alert(e);
                    console.log(e);
                    
                }
            });
        });
</script>

@endsection