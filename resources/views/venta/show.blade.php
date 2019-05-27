@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Venta</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('ventas.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong> Lista de Ventas</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 form-group">
                        <label class="control-label">Fecha:</label>
                        <input type="text" class="form-control" value="{{$venta->fecha}}" readonly="">
                    </div>
                    <div class="col-4 form-group">
                        <label class="control-label">Cliente:</label>
                        <input type="text" class="form-control" value="{{$venta->paciente->nombre}}" readonly="">
                    </div>
                    <div class="col-4 form-group">
                        <label class="control-label">Folio:</label>
                        <input type="number" class="form-control" value="{{$venta->id}}" readonly="">
                    </div>
                    @if ($venta->oficina_id)
                        <div class="col-4 form-group">
                            <label class="control-label">Oficina:</label>
                            <input type="text" class="form-control" value="{{$venta->oficina->nombre}}" readonly="">
                        </div>
                    @endif
                    {{-- <div class="col-4 form-group">
                        <label class="control-label">Oficina:</label>
                        <input type="text" class="form-control" value="{{$venta->oficina->nombre}}" readonly="">
                    </div> --}}
                </div>
                <div class="row">
                    <h5>Productos</h5>
                </div>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio Individual</th>
                                <th>Cantidad</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($venta->productos as $producto)
                            <tr>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->precio}}</td>
                                <td>{{$producto->pivot->cantidad}}</td>
                                <td>{{$producto->precio * $producto->pivot->cantidad}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 form-group">
                        <label class="control-label">Subtotal:</label>
                        <input type="number" class="form-control" value="{{$venta->subtotal}}" readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 form-group">
                        <label class="control-label">Descuento:</label>
                        <input type="text" class="form-control" value="{{round($venta->subtotal-$venta->total+($venta->subtotal*0.16))}}" readonly="">
                        {{-- @if ($venta->descuento)
                            @if ($venta->promocion->tipo=='E')
                                <input type="text" class="form-control" value="0" readonly="">
                            @else
                                <input type="text" class="form-control" value="{{ $venta->subtotal-$venta->total+($venta->subtotal*0.16) }}" readonly="">
                            @endif
                            
                        @else    
                            <input type="text" class="form-control" value="0" readonly="">
                        @endif --}}
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 offset-4 form-group">
                        <label class="control-label">Total:</label>
                        <input type="number" class="form-control" value="{{$venta->total}}" readonly="">
                    </div>
                </div>
            </div>
            </form>

        </div>

    </div>
</div>
@endsection