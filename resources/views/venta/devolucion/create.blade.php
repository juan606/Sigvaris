@extends('principal')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-uppercase text-muted">
                DEVOLUCIÓN DE PRODUCTO
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{route('ventas.devoluciones.store', ['venta'=>$venta])}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="col-lg-4">
                                    <label for="" class="text-uppercase text-muted">OPCION</label>
                                    <select name="opcion" class="form-control">
                                        <option value="servicio">Servicio</option>
                                        <option value="cliente enojado">Cliente enojado</option>
                                        <option value="amenaza">Amenaza</option>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Seleccionar</th>
                                                    <th>Sku</th>
                                                    <th>Descripción</th>
                                                    <th>Cantidad</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($venta->productos as $producto)
                                                <tr>
                                                    <td>
                                                        <input type="checkbox" name="idProductosSeleccionados[]"
                                                            value="{{$producto->id}}">
                                                    </td>
                                                    <td>{{$producto->sku}}</td>
                                                    <td>{{$producto->descripcion}}</td>
                                                    <td>{{$producto->pivot->cantidad}}</td>
                                                    <td>{{$producto->pivot->precio * $producto->pivot->cantidad}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">Devolver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection