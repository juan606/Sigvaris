@extends('principal')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h4>Datos del Prospecto:</h4>
            </div>
            <div class="col-4 text-center">
                <a href="{{ route('prospectos.index') }}" class="btn btn-primary">
                    <i class="fa fa-bars"></i><strong> Lista de Doctores</strong>
                </a>
            </div>
        </div>
    </div>
    <form role="form" id="form-cliente" method="POST" action="{{ route('prospectos.store') }}" name="form">
        {{ csrf_field() }}
        <input type="hidden" name="fechacreacion" value="{{date('Y-m-d')}}">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-3">
                    <label class="control-label">✱Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required="">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">✱Apellido Paterno:</label>
                    <input type="text" class="form-control" name="apellidopaterno" required="">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">Apellido Materno:</label>
                    <input type="text" class="form-control" name="apellidomaterno">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">✱Fecha de nacimiento:</label>
                    <input type="date" class="form-control" name="fechanacimiento" required="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-3">
                    <label class="control-label">Teléfono celular:</label>
                    <input type="text" class="form-control" name="celular">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">✱Email:</label>
                    <input type="email" class="form-control" name="mail" required="">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">✱Especialidad:</label>
                    <input type="text" class="form-control" name="especialidad" required="">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">✱Cédula</label>
                    <input type="text" class="form-control" name="especialidadcedula" required="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-3">
                    <label class="control-label">Subespecialidad</label>
                    <input type="text" class="form-control" name="subespecialidad">
                </div>
                <div class="form-group col-3">
                    <label class="control-label">Cédula</label>
                    <input type="especialidadcedula" class="form-control" name="subespecialidadcedula">
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