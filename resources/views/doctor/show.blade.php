@extends('principal')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h5>Mostrar Doctor</h5>
            </div>
            <div class="col-4 text-center">
                <a href="{{ route('doctores.index') }}" class="btn btn-primary">
                    <i class="fa fa-bars"></i><strong> Lista de Doctores</strong>
                </a>
            </div>
            <div class="col-4 text-center">
                <a href="{{route('doctores.edit', ['doctor'=>$doctor])}}" class="btn btn-warning">
                    <i class="fas fa-edit"></i><strong> Editar Doctor</strong>
                </a>
            </div>
        </div>
        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-3 form-group">
                <label class="control-label">✱Nombre:</label>
                <input value="{{$doctor->nombre}}" readonly type="text" name="nombre" class="form-control" required="">
            </div>
            <div class="col-3 form-group">
                <label class="control-label">Apellido Paterno:</label>
                <input value="{{$doctor->apellidopaterno}}" readonly type="text" name="apellidopaterno" class="form-control" required="">
            </div>
            <div class="col-3 form-group">
                <label class="control-label">Apellido Materno:</label>
                <input value="{{$doctor->apellidomaterno}}" readonly type="text" name="apellidomaterno" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label class="control-label">Celular:</label>
                <input value="{{$doctor->celular}}" readonly type="number" name="celular" class="form-control" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-3 form-group">
                <label class="control-label">Correo:</label>
                <input value="{{$doctor->mail}}" readonly type="mail" name="mail" class="form-control">
            </div>
            <div class="col-3 form-group">
                <label class="control-label">Fecha nacimiento:</label>
                <input value="{{$doctor->nacimiento}}" readonly type="date" name="nacimiento" class="form-control" required="">
            </div>
            <div class="col-3 form-group">
                <label class="control-label">Pacientes que recomienda:</label>
                <input value="{{$doctor->pacientes->count()}}" readonly type="text" name="no_pacientes" class="form-control" required="">
            </div>
        </div>
        <div class="row">
            @include('doctor.subnav')
        </div>
        @yield('submodulos')
    </div>
    <script>
        $(document).ready(function(){
            let submenu = $('#submenu').val();
            $('.nav-link.submenu').removeClass('active')
            $('#'+submenu).addClass('active')
        });
    </script>
</div>
@endsection