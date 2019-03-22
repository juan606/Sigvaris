@extends('principal')
@section('content')
<div class="container">
    <form method="POST" action="{{route('niveles.store')}}">
        {{ csrf_field() }}
        <div class="row">
            <h4>Crear Nivel</h4>
        </div>
        <div class="row my-5">
            <div class="col">
                <input type="text" name="nombre" class="form-control" required placeholder="Nombre">
            </div>
            <div class="col">
                <input type="text" name="etiqueta" class="form-control" required placeholder="Etiqueta">
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <input type="submit" class="btn btn-success btn-lg btn-block" value="Agregar">
            </div>
        </div>
    </form>
    @if( $niveles->count() == 0)
    <h4>No hay niveles registrados</h4>
    @else
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Etiqueta</th>
                        <th>Operacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($niveles as $nivel)
                    <tr>
                        <td>{{$nivel->nombre}}</td>
                        <td>{{$nivel->etiqueta}}</td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-warning btn-lg btn-block" href="{{route('niveles.edit', ['nivele'=>$nivel])}}">Editar</a>
                                </div>
                                <div class="col-6">
                                    <form method="POST" action="{{route('niveles.destroy', ['nivele'=>$nivel])}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">Borrar</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection