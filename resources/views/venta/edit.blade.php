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
                        <div class="col-4 form-group">
                            <label class="control-label">✱Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" required="">
                        </div>
                        <div class="col-4 form-group">
                            <label class="control-label">✱Cantidad:</label>
                            <input type="number" name="cantidad" class="form-control" value="{{$producto->cantidad}}" required="">
                        </div>
                        <div class="col-4 form-group">
                            <label class="control-label">✱Precio:</label>
                            <input type="number" name="precio" class="form-control" value="{{$producto->precio}}" required="">
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