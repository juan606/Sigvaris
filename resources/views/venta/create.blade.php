@extends('principal')
@section('content')
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
            <form role="form" id="form-cliente" method="POST" action="{{ route('productos.store') }}" name="form">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="paciente_id">✱Paciente</label>
                            <select class="form-control" name="paciente_id" id="paciente_id">
                                <option value="">Selecciona...</option>
                                @foreach($pacientes as $paciente)
                                <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
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
                            <input type="number" name="precio" class="form-control" readonly="" value="{{$folio}}"
                                required="">
                        </div>
                    </div>
                    <div class="row">
                        <h3>Productos Existentes</h3>
                        <div class="col-12">
                            <table class="table" id="productos">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productos as $producto)
                                    <tr>
                                        <td>{{$producto->nombre}}</td>
                                        <td>{{$producto->precio}}</td>
                                        <td><button type="button" class="btn btn-success boton_agregar"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                <tbody id="tbody_productos">
                                    
                                </tbody>
                            </table>
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
        </div>
    </div>
</div>
<script>
    function agregarProducto(producto){
        $('#tbody_productos').append('<tr><td><input type="number" name="cantidad" value="1"></td><td>nombre</td><td>$12.23</td><td>$12.23</td><td><button type="button" class="btn btn-danger boton_quitar"><i class="fas fa-minus"></i></button></td></tr>');
    }

    function quitarProdcuto(){

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
@endsection