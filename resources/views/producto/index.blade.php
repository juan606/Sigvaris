@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h4>Productos</h4>
            </div>
            <div class="col-4">
                <a href="{{ route('productos.create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i><strong> Agregar Producto</strong>
				</a>
            </div>
        </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Descripci+on</th>
                        <th>Precio Distribuidor</th>
                        <th>Precio Público S/IVA</th>
                        <th>Precio Público C/IVA</th>
                        <th>Operación</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!$productos)
                    <h3>No hay productos registrados</h3>
                    @else
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{$producto->sku}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->precio_distribuidor}}</td>
                        <td>{{$producto->precio_publico}}</td>
                        <td>{{$producto->precio_publico_iva}}</td>
                        <td>
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <a href="{{route('productos.show', ['producto'=>$producto])}}"
                                        class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                    <a href="{{route('productos.edit', ['producto'=>$producto])}}"
                                        class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>

                                </div>
                                <div class="col pl-0">
                                    <form role="form" name="productoborrar" id="form-doctor" method="POST"
                                        action="{{ route('productos.destroy', ['producto'=>$producto]) }}" name="form">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection