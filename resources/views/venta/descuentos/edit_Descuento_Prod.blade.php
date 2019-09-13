@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        
        <form class="" action="{{route('descuentos.update',['descuento'=>$descuento])}}" method="post">
            <div class="card-header">
                <h1>Descuento</h1>
            </div>
            <div class="card-body">    
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required="" value="{{ $descuento->nombre }}">
                    </div>
                    <div class="form-group col-3">
                        <label for="inicio">De:</label>
                        <input type="date" class="form-control" name="inicio" id="inicio" required="" value="{{ $descuento->inicio }}">
                    </div>
                    <div class="form-group col-3">
                        <label for="fin">A:</label>
                        <input type="date" step="0.01" name="fin" class="form-control" id="fin" required="" value="{{ $descuento->fin }}">
                    </div>
                   
                </div>
                    <br>
                    <label>Tipo: </label>
                    @if ($descuento->promocionesProductos->count()>0)
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-check-label">Descuento en Productos: </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="descuento_deG" id="descuento_deG" value="{{ $descuento->promocionesProductos[0]->descuento }}" aria-label="Monto del descueto aplicado">
                                    <div class="input-group-append">
                                        <span class="input-group-text">{{ $descuento->promocionesProductos[0]->unidad_descuento }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>Productos Seleccionados</h3>
                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Precio Unitario + IVA</th>
                                    <th>Subtotal</th>
                                    <th>Quitar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_productos">
                                @foreach($descuento->promocionesProductos as $prod)
                                <tr>
                                    <td>{{ $prod->producto->descripcion }}</td>
                                    <td>{{ $prod->producto->precio_publico }}</td>
                                    <td>{{ $prod->producto->precio_publico_iva }}</td>
                                    <td>{{ $prod->producto->precio_publico }}</td>
                                    <td>
                                        <button onclick="quitarProducto('#producto_agregado${producto.id}')" type="button" class="btn btn-danger boton_quitar">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </form>
</div>
@endsection