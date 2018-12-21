@extends('principal')
@section('content')
<div class="container p-5">
    <div class="row">
        <div class="col-6">
            <h4>Alta Doctor</h4>
        </div>
    </div>
    <form role="form" id="form-cliente" method="POST" action="{{ route('prospecto.store') }}" name="form">
    {{ csrf_field() }}
    <div class="row">
        <div class="form-group col-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre">
        </div>
        <div class="form-group col-4">
            <label for="apellidopaterno">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellidopaterno" id="apellidopaterno" placeholder="apellidopaterno">
        </div>
        <div class="form-group col-4">
            <label for="apellidomaterno">Apellido Materno</label>
            <input type="text" class="form-control" name="apellidomaterno" id="apellidomaterno" placeholder="apellidomaterno">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-5 offset-1">
            <label for="celular">Celilar</label>
            <input type="text" class="form-control" name="celular" id="celular" placeholder="celular">
        </div>
        <div class="form-group col-5">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="mail" id="email" placeholder="email">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-5 offset-1">
            <label for="celular">Especialidad</label>
            <input type="text" class="form-control" name="especialidad" id="celular" placeholder="celular">
        </div>
        <div class="form-group col-5">
            <label for="email">Cédula</label>
            <input type="text" class="form-control" name="especialidadcedula" id="email" placeholder="email">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-5 offset-1">
            <label for="celular">Subespecialidad</label>
            <input type="text" class="form-control" name="subespecialidad" id="celular" placeholder="celular">
        </div>
        <div class="form-group col-5">
            <label for="email">Cédula</label>
            <input type="especialidadcedula" class="form-control" name="subespecialidadcedula" id="email" placeholder="email">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-5 offset-1">
            <label for="celular">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fechanacimiento" id="celular" placeholder="celular">
        </div>
        <input type="hidden" name="fechacreacion" value="{{date('Y-m-d')}}">
        <div class="form-group pt-4 col-5">
            <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
        </div>
    </div>
    </form>
    
</div>
@endsection