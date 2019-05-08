@extends('principal')
@section('content')
{{-- {{ dd($productos) }} --}}
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Punto de venta</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('ventas.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong>Lista de ventas</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <form role="form" id="form-cliente" method="POST" action="{{ route('ventas.store') }}" name="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="paciente_id">✱Paciente</label>
                            <select class="form-control" name="paciente_id" id="paciente_id"  required="">
                                <option value="">Selecciona...</option>
                                @foreach($pacientes as $pacien)
                                <option {{$paciente && $paciente->id == $pacien->id ? "selected " : ""}} value="{{$pacien->id}}">{{$pacien->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 form-group">
                            <label class="control-label">Fecha:</label>
                            <input type="date" name="fecha" class="form-control" readonly="" value="{{date('Y-m-d')}}"
                                required="">
                        </div>
                        <div class="col-4 form-group">
                            <label class="control-label">Folio:</label>
                            <input type="number" name="precio" class="form-control" readonly="" value="{{$folio}}">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3>Productos Existentes</h3>
                        <div class="col-12">
                            <table class="table" id="productos">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        <input type="hidden" id="producto_a_agregar{{$loop->index}}" value="{{$producto}}">
                                        <td>{{$producto->sku}}</td>
                                        <td>{{$producto->descripcion}}</td>
                                        <td>{{$producto->precio_publico_iva}}</td>
                                        <td><button type="button" class="btn btn-success boton_agregar" onclick="agregarProducto('#producto_a_agregar{{$loop->index}}')"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <h3>Productos Seleccionados</h3>
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Precio Unitario</th>
                                        <th>Precio</th>
                                        <th>Quitar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div id="tbody_productos"></div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 offset-4 form-group">
                            <label for="descuento_id">Descuento</label>
                            <select class="form-control" name="descuento_id" id="descuento_id" >
                                <option value="">Selecciona...</option>                               
                            </select>
                             <label class="radio-inline">
                                <input type="radio" name="Aplica" value="Aplica" id="Aplica" onchange="aplica()" /> Aplica
                            </label>
                            <label class="radio-inline offset-2 ">
                                <input type="radio" name="Aplica" value="high" onchange="no_aplica()" id="NoAplica" /> No aplica
                            </label>
                        </div>
                    </div>

                    <div class="row mb-3" id="promo">
                        <div class="col-4 offset-4 form-group">
                            <label for="descuento_id">Promocion</label>
                            <select class="form-control" name="descuento_id" id="descuento_id">
                                <option value="">Selecciona...</option>                               
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sigpesos: </span>
                            </div>
                            <input type="number" class="form-control" name="sigpesos" id="sigpesos" value="0" min="1" step="0.01" readonly="">
                        </div>
                    </div>

                    
                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Subtotal: $</span>
                            </div>
                            <input type="number" required="" class="form-control" name="subtotal" id="subtotal" value="0" min="1" step="0.01" readonly="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descuentos: $</span>
                            </div>
                            <input type="number" required="" class="form-control" name="subtotal" id="subtotal" value="0" step="0.01" readonly="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Iva: $</span>
                            </div>
                            <input type="number" required="" class="form-control" name="subtotal" id="subtotal" value="0" min="1" step="0.01" readonly="">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Total: $ </span>
                            </div>
                            <input type="number" required="" class="form-control" name="total" id="total" value="0" min="1" step="0.01" readonly="">
                        </div>
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
            <div class="col-4 offset-4 text-center">
{{--                 <form action="{{ route('pembayaran.print') }}" method="POST">                
                    <input type="hidden" name="_token" class="form-control" value="{!! csrf_token() !!}"> --}}
                    <button type="submit" name="submit" class="btn btn-info">Imprimir</button>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
<script>
    function agregarProducto(p){
        let producto = JSON.parse($(p).val());
        // alert(producto);
        $('#tbody_productos')
        .append(`
        <tr id="producto_agregado${producto.id}">
            <td>

                <input class="form-control cantidad" min="1" onchange="cambiarTotal(this, '#producto_agregado${producto.id}')" type="number" name="cantidad[]" value="1">
                <input class="form-control" type="hidden" name="producto_id[]" value="${producto.id}">

            </td>
            <td>
                ${producto.descripcion}
            </td>
            <td class="precio_individual">
                ${producto.precio_publico_iva}
            </td>
            <td class="precio_total">
                ${producto.precio_publico_iva}
            </td>
            <td>
                <button onclick="quitarProducto('#producto_agregado${producto.id}')" type="button" class="btn btn-danger boton_quitar">
                    <i class="fas fa-minus"></i>
                </button>
            </td>
        </tr>`);
        cambiarTotalVenta();
    }

    function quitarProducto(p){
        $(p).remove();
        cambiarTotalVenta();
    }

    function cambiarTotalVenta(){
        let precios_total = $('td.precio_total').toArray();
        let total = 0;
        precios_total.forEach(e => {
            total += parseFloat(e.innerText);
        });
        $('#subtotal').val(total.toFixed(2));
        $('#total').val(total.toFixed(2));
    }

    function cambiarTotal(a, p){
        let cant = parseFloat(a.value);
        let ind = parseFloat($(p).find('.precio_individual').first().text());
        let total = cant*ind;
        $(p).find('.precio_total').text(total);
        cambiarTotalVenta();
    }

    $(document).ready(function () {
        $('#productos').DataTable({
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });
</script>

<script type="text/javascript">
    if(document.getElementById('Aplica').checked)
        document.getElementById("promo").style.display = "block";
    else
        document.getElementById("promo").style.display = "none";
    function aplica(){
        if(document.getElementById('Aplica').checked){
            var x = document.getElementById("promo");
            x.style.display = "block";
        }
        
    }

        function no_aplica(){
        if(document.getElementById('NoAplica').checked){
            var x = document.getElementById("promo");
            x.style.display = "none";
        }
        
    }
        
</script>
@endsection