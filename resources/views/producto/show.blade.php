@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Producto</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong> Lista de Productos</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 form-group">
                            <label class="control-label">✱Nombre:</label>
                            <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" readonly="">
                        </div>
                        <div class="col-6 form-group">
                            <label class="control-label">✱Precio:</label>
                            <input type="number" name="precio" class="form-control" value="{{$producto->precio}}" readonly="">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection