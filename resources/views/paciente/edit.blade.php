@extends('principal')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h4>Datos del Paciente:</h4>
            </div>
            <div class="col-4 text-center">
                <a href="{{ route('pacientes.index') }}" class="btn btn-primary">
                    <i class="fa fa-bars"></i><strong> Lista de Pacientes</strong>
                </a>
            </div>
        </div>
    </div>
    <form role="form" id="form-cliente" method="POST" action="{{ route('pacientes.update', ['paciente'=>$paciente]) }}" name="form">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="card-body">
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">✱Nombre:</label>
                    <input value="{{$paciente->nombre}}" type="text" name="nombre" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Apellido Paterno:</label>
                    <input value="{{$paciente->paterno}}" type="text" name="paterno" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Apellido Materno:</label>
                    <input value="{{$paciente->materno}}" type="text" name="materno" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Celular:</label>
                    <input value="{{$paciente->celular}}" type="number" name="celular" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">Correo:</label>
                    <input value="{{$paciente->mail}}" type="email" name="mail" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Fecha nacimiento:</label>
                    <input value="{{$paciente->nacimiento}}" type="date" name="nacimiento" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱RFC:</label>
                    <input value="{{$paciente->rfc}}" type="text" name="rfc" class="form-control" required="">
                </div>
                <div class="form-group col-3">
                    <label for="nivel">Nivel:</label>
                    <select class="form-control" name="nivel_id" id="nivel">
                        @foreach($niveles as $nivel)
                            <option value="{{$nivel->id}}">{{$nivel->etiqueta}}/{{$nivel->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">Teléfono:</label>
                    <input value="{{$paciente->telefono}}" type="text" name="telefono" class="form-control">
                </div>
            </div>
            <div class="row">
                @include('paciente.subnav')
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

<script>
$('#otro_doctor').hide();
    $('#doctor_id').change(function () {
        if($(this).val() == 'otro'){
            $(this).attr('name', 'doctor_id_falsa');
            $('#otro_doctor').show();
            $('#otro_doctor').find('input').val('');
            $('#otro_doctor').find('input').attr('required', 'true');
        }else{
            $(this).attr('name', 'doctor_id');
            $('#otro_doctor').hide();
            $('#otro_doctor').find('input').val('');
            $('#otro_doctor').find('input').removeAttr('required');
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ url('/getDoctores') }}",
        type: "GET",
        dataType: "html",
    }).done(function (resultado) {
        $("#doctor_id").html(resultado);
    });
</script>

@endsection