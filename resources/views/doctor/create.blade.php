@extends('principal')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h4>Datos del Doctor:</h4>
            </div>
            <div class="col-4 text-center">
                <a href="{{ route('doctores.index') }}" class="btn btn-primary">
                    <i class="fa fa-bars"></i><strong> Lista de Doctores</strong>
                </a>
            </div>
        </div>
    </div>
    <form role="form" id="form-cliente" method="POST" action="{{ route('doctores.store') }}" name="form">
        {{ csrf_field() }}
        <div class="card-body">
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">✱Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Apellido Paterno:</label>
                    <input type="text" name="apellidopaterno" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Apellido Materno:</label>
                    <input type="text" name="apellidomaterno" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Teléfono 1:</label>
                    <input type="text" name="telefono1" class="form-control" required="">
                </div>
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">Teléfono 2:</label>
                    <input type="text" name="telefono2" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Hospital:</label>
                    <input type="text" name="hospital" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Referencia:</label>
                    <input type="text" name="referenia" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Especialidad:</label>
                    <input type="text" name="especialidad" class="form-control" required="">
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
                <div class="col-sm-4 text-right text-danger">
                    ✱Campos Requeridos.
                </div>
            </div>
        </div>
    </form>
</div>

@endsection