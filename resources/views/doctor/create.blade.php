@extends('principal')
@section('content')
<div class="container p-5">
    <form role="form" id="form-cliente" method="POST" action="{{ route('doctores.store') }}" name="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-7">
                <h4>Doctores</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                    </div>
                    <input type="text" name="nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Apellido paterno</span>
                    </div>
                    <input type="text" name="apellidopaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Apellido materno</span>
                    </div>
                    <input type="text" name="apellidomaterno" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">telefono1</span>
                    </div>
                    <input type="text" name="telefono1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">telefono2</span>
                    </div>
                    <input type="text" name="telefono2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Hospital</span>
                    </div>
                    <input type="text" name="hospital" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Referencia</span>
                    </div>
                    <input type="text" name="referenia" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Especialidad</span>
                    </div>
                    <input type="text" name="especialidad" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
</div>
@endsection