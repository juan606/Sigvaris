@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Editar Producto</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong> Lista de Productos</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form role="form" id="form-cliente" method="POST" action="{{ route('productos.update', ['producto'=>$producto]) }}" name="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row">
                    <div class="col-2 form-group">
                            <label class="control-label">✱SKU:</label>
                            <input type="text" name="sku" class="form-control" value="{{$producto->sku}}" required="">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">Descripción:</label>
                            <input type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}">
                        </div>
                        <div class="col-2 form-group">
                            <label class="control-label">✱Precio Distribuidor:</label>
                            <input type="text" name="precio_distribuidor" class="form-control" value="{{$producto->precio_distribuidor}}" required="">
                        </div>
                        <div class="col-2 form-group">
                            <label class="control-label">✱Precio público S/IVA:</label>
                            <input type="text" name="precio_publico" class="form-control" value="{{$producto->precio_publico}}" required="">
                        </div>
                        <div class="col-3 form-group">
                            <label class="control-label">✱Precio público C/IVA:</label>
                            <input type="number" name="precio_publico_iva" class="form-control" step="0.01" value="{{$producto->precio_publico_iva}}" required="">
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

@endsection