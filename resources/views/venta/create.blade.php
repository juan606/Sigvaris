@extends('principal')
<meta name="csrf-token" content="{{ csrf_token() }}" />
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
                            {{-- <input type="text" id="busqueda" placeholder="buscar productos.."> --}}
                            <table class="table" id="productos">
                                <thead>
                                    <tr>
                                        <th>SKU</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Precio con iva</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        <input type="hidden" id="producto_a_agregar{{$loop->index}}" value="{{$producto}}">
                                        <td>{{$producto->sku}}</td>
                                        <td>{{$producto->descripcion}}</td>
                                        <td>${{$producto->precio_publico}}</td>
                                        <td>${{$producto->precio_publico_iva}}</td>
                                        <td><button type="button" class="btn btn-success boton_agregar" onclick="agregarProducto('#producto_a_agregar{{$loop->index}}')"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{$productos->links()}} --}}
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
                                        <th>Precio Unitario + IVA</th>
                                        <th>Subtotal</th>
                                        <th>Quitar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_productos">
                                    {{-- <div id="tbody_productos"></div> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4 offset-4 form-group">
                            <label for="descuento_id">Descuento</label>
                            <select class="form-control" name="descuento_id" id="descuento_id" >
                                <option value="">Selecciona...</option>
                                @foreach ($descuentos as $descuento)
                                    <option value="{{$descuento->id}}">{{$descuento->nombre}}</option>
                                @endforeach

                            </select>                            
                        </div>
                    </div>

                    <div class="row mb-3" id="promo">
                        <div class="col-4 offset-4 form-group">
                            <label for="promo_id">Promocion</label>
                            <select class="form-control" name="promo_id" id="promo_id">
                                <option value="">Selecciona...</option>                               
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sigpesos ganados: </span>
                            </div>
                            <input type="number" class="form-control" name="sigpesos" id="sigpesos" value="0" min="1" step="0.01" readonly="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sigpesos a usar: </span>
                            </div>
                            <input type="number" class="form-control" name="sigpesos_usar" id="sigpesos_usar" value="0" min="1" step="0.01" readonly="">
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
                                <span class="input-group-text">Descuento: $</span>
                            </div>
                            <input type="number" required="" class="form-control" name="descuento" id="descuento" value="0" step="0.01" readonly="">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 offset-4 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Iva: $</span>
                            </div>
                            <input type="number" required="" class="form-control" name="iva" id="iva" value="0" min="1" step="0.01" readonly="">
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
                ${producto.precio_publico}
            </td>
            <td>${producto.precio_publico_iva}</td>
            <td class="precio_total">
                ${producto.precio_publico}
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
        $('#promo_id option:eq(0)').prop('selected',true);
        $('#descuento').val(0);
        $('#sigpesos').val(0);
        $('#subtotal').val(total.toFixed(2));
        $('#iva').val($('#subtotal').val()*0.16);
        var sigpesos=parseInt($('#sigpesos_usar').val());
        var subtotal=parseFloat($('#subtotal').val())
        var iva=parseFloat($('#iva').val())
        var des=parseFloat($('#descuento').val());
        // console.log(des);       
        $('#total').val(subtotal+iva-des-sigpesos);
        // $('#total').val('ola');
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#productos').DataTable();


        $('#descuento_id').change(function(){            
            var id=$('#descuento_id').val();
            $('#descuento').val(0);
            $('#sigpesos').val(0);
            var subtotal=parseFloat($('#subtotal').val());
            var iva=parseFloat($('#iva').val());
            var des=parseFloat($('#descuento').val());
            var sigpesos=parseInt($('#sigpesos_usar').val());
            $('#total').val(subtotal+iva-des-sigpesos);
            $.ajax({
                url:"{{ url('/get_promos') }}/"+id,
                type:'GET',
                dataType:'html',
                success: function(res){
                    $('#promo_id').html(res);

                }
            });
        });

        $('#promo_id').change(function(){
            var id=$('#promo_id').val();
            if(!id)
            {
                $('#descuento').val(0);
                $('#sigpesos').val(0);
            }
            var paciente_id=$('#paciente_id').val();
            var total_productos=parseInt(0);
            var subtotal=parseFloat($('#subtotal').val());
            var iva=parseFloat($('#iva').val());
            var des=parseFloat($('#descuento').val());
            var sigpesos=parseInt($('#sigpesos_usar').val());
            $('#total').val(subtotal+iva-des-sigpesos);
            var productos_id=[];
            var cantidad_id=[];
            $('[name="cantidad[]"]').each(function(){
                total_productos+=parseInt($(this).val());
                cantidad_id.push($(this).val());
            });

            $('[name="producto_id[]"]').each(function(){
                productos_id.push($(this).val());
            }); 
            $.ajax({
                url:"{{ url('/calcular_descuento') }}/"+id,
                type:'POST',
                data: {"_token": "{{CSRF_TOKEN()}}",
                    "subtotal":$("#subtotal").val(),
                    "paciente_id":paciente_id,
                    "total_productos":total_productos,
                    "productos_id":productos_id,
                    "cantidad_id":cantidad_id
                },
                dataType:'json',
                success: function(res){                    
                    if(res.status){                       
                        $('#descuento').val(res.total);
                        $('#sigpesos').val(res.sigpesos);
                        des=parseFloat($('#descuento').val());
                        $('#total').val(subtotal+iva-des-sigpesos);
                        if($('#total').val()<0)
                        {
                            $('#total').val(0);
                        }
                        //$('#total').val()
                    }
                    else
                    {
                        swal("No aplica el descuento");
                        $('#promo_id option:eq(0)').prop('selected',true);
                    }
                }

            });
        });
       
        $('#paciente_id').change(function(){
            var id=$(this).val();
            $('#promo_id option:eq(0)').prop('selected',true);
            $('#descuento').val(0);
            $('#sigpesos').val(0);
            var subtotal=parseFloat($('#subtotal').val());
            var iva=parseFloat($('#iva').val());
            var des=parseFloat($('#descuento').val());
            $.ajax({
                url:"{{ url('/obtener_sigpesos') }}/"+id,
                type:'GET',
                dataType:'text',
                success: function(res){                    
                    var sigpesos=$('#sigpesos_usar').val(parseInt(res));
                }

            });
            if((subtotal+iva-des)<sigpesos)
            {
                $('#total').val(0);
            }
            else
            {
                $('#total').val(subtotal+iva-des-sigpesos);
            }
            
        });

        // $('#subtotal').change(function(){
        //     console.log('cambio subtotal');
        //     $('#iva').val($('#subtotal').val()*0.16);
        // });
    });

   
</script>
@endsection