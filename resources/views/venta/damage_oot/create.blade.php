@extends('principal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-upper-case text-muted">
                DAMAGE OOT
            </h4>
            <div class="card">
                <form action="{{route('ventas.damage-oot.store',['venta'=>$venta->id])}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <label for="" class="text-uppercase text-muted">CAMBIOS DEL PACIENTE</label>
                                <input type="text" class="form-control" readonly value="{{$totalCambiosDePaciente}}">
                            </div>
                            <div class="col-12 mt-2">
                                <h5 class="text-center text-uppercase text-muted">PRODUCTOS COMPRADOS</h5>
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
                                                    <input type="checkbox" name="idProductosSeleccionados[]" value="{{$producto->id}}">
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
                                <button type="submit" class="btn btn-success">DEVOLVER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection