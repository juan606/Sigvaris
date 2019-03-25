@extends('principal')
@section('content')
<div class="container">
    <form method="POST" action="{{route('niveles.update', ['nivele'=>$nivel])}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="row">
            <h4>Editar Nivel</h4>
        </div>
        <div class="row my-5">
            <div class="col">
                <label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre
							del Nivel:</label>
                <input type="text" name="nombre" class="form-control" required placeholder="Nombre" value="{{$nivel->nombre}}">
            </div>
            <div class="col">
            <label class="control-label" for="etiqueta">Etiqueta:</label>
                <input type="text" name="etiqueta" class="form-control" required placeholder="Etiqueta" value="{{$nivel->etiqueta}}">
            </div>
        </div>
        <div class="row">
            <div class="col-4 offset-4">
                <input type="submit" class="btn btn-success btn-lg btn-block" value="Guardar">
            </div>
        </div>
    </form>
    
</div>
@endsection