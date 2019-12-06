@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        
            <div class="card-header">
                <h1>Descuento</h1>
            </div>
            <div class="card-body">    
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required="" value="{{ $descuento->nombre }}" readonly="">
                    </div>
                    <div class="form-group col-3">
                        <label for="inicio">De:</label>
                        <input type="date" class="form-control" name="inicio" id="inicio" required="" value="{{ $descuento->inicio }}" readonly="">
                    </div>
                    <div class="form-group col-3">
                        <label for="fin">A:</label>
                        <input type="date" step="0.01" name="fin" class="form-control" id="fin" required="" value="{{ $descuento->fin }}" readonly="">
                    </div>
                   
                </div>
                    <br>
                    <label>Tipo: </label>
                    @if ($descuento->promociones->where('tipo','A')->first())
                        <div class="form-group col-10">
                            <label>Compra: </label>
                            <label type="text">{{ $descuento->promociones->where('tipo','A')->first()->compra_min }}</label>
                            <label> Llevate: </label>
                            <label type="text">{{ $descuento->promociones->where('tipo','A')->first()->descuento_de }}</label>
                        </div>
                    @endif 
                    
                    @if ($descuento->promociones->where('tipo','B')->first())
                        <div class="form-group col-10">
                            <label>Monto minimo de compra: </label>
                            <label><b>${{ $descuento->promociones->where('tipo','B')->first()->compra_min }}</b></label>
                            <label> por un descuento de: </label>
                            <label><b>{{ $descuento->promociones->where('tipo','B')->first()->descuento_de }}</b></label>
                            <label><b>{{ $descuento->promociones->where('tipo','B')->first()->unidad_descuento }}</b></label>
                        </div>  
                    @endif
                    @if ($descuento->promociones->where('tipo','C')->first())
                        <div class="form-group col-10">
                            <label>Descuento por cumpleaños </label>
                            <label><b>{{ $descuento->promociones->where('tipo','C')->first()->descuento_de }}</b></label>
                            <label><b>{{ $descuento->promociones->where('tipo','C')->first()->unidad_descuento }}</b></label>
                        </div>
                    @endif

                    @if ($descuento->promociones->where('tipo','D')->first())
                        <div class="form-group col-10">
                            <label>Monto minimo de prendas: </label>
                            <label><b>{{ $descuento->promociones->where('tipo','D')->first()->compra_min }}</b></label>
                            <label> por un descuento de: </label>
                            <label><b>{{ $descuento->promociones->where('tipo','D')->first()->descuento_de }}</b></label>
                            <label><b>{{ $descuento->promociones->where('tipo','D')->first()->unidad_descuento }}</b></label>
                        </div>
                    @endif
                        
                    @if ($descuento->promociones->where('tipo','E')->first())
                        <div class="form-group col-10">
                            <label>Monto minimo de prendas: </label>
                            <label><b>{{ $descuento->promociones->where('tipo','E')->first()->compra_min }}</b></label>
                            <label> por: </label>
                            <label><b>{{ $descuento->promociones->where('tipo','E')->first()->descuento_de }}</b></label>
                            <label>sigpesos</label>
                        </div>
                    @endif

                    @if ($descuento->promociones->where('tipo','F')->first())
                        <div class="row">
                            <div class="col-2 pr-0">
                                <label>Descuento de empleado: </label>
                                <input type="text" class="form-control" name="descuento_deF" id="descuento_deF" value="{{ $descuento->promociones->where('tipo','F')->first()->descuento_de }}" readonly="">
                            </div>
                            <div class="col-1 pl-0">
                                <input type="text" class="form-control" value="{{ $descuento->promociones->where('tipo','F')->first()->unidad_descuento }}" readonly="">
                            </div>
                        </div>
                    @endif
                    @if ($descuento->promocionesProductos->count()>0)
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="form-check-label">Descuento en Productos: </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="descuento_deG" id="descuento_deG" value="{{ $descuento->promocionesProductos[0]->descuento }}" readonly="" aria-label="Monto del descueto aplicado">
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
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio Unitario</th>
                                    <th scope="col">Precio Unitario + IVA</th>
                                    <th scope="col">Subtotal</th>
                                    <!--<th>Quitar</th>-->
                                </tr>
                            </thead>
                            <tbody id="tbody_productos">
                                @foreach($descuento->promocionesProductos as $prod)
                                <tr>
                                    <td>{{ $prod->producto->descripcion }}</td>
                                    <td>{{ $prod->producto->precio_publico }}</td>
                                    <td>{{ $prod->producto->precio_publico_iva }}</td>
                                    <td>{{ $prod->producto->precio_publico }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
</div>
@endsection