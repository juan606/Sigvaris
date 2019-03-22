@extends('doctor.show')
@section('submodulos')
    <div class="row my-5">
        <div class="col-4 px-5"><h4>Especialidades</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-especialidades">
    </div>
    <div class="row">
        <div class="col-12">
            <form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('doctores.especialidades.update', ['doctor'=>$doctor,'especialidad'=>$especialidad]) }}" name="form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Especialidad:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$especialidad->nombre}}" required autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Cédula:</label>
                        <input type="text" class="form-control" id="apater" name="cedula" value="{{$especialidad->cedula}}" >
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Universidad:</label>
                        <input type="text" class="form-control" id="apater" name="universidad" value="{{$especialidad->universidad}}" >
                    </div>			
                </div>
                <div class="row-">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success">
                            <strong>Guardar</strong>
                        </button>
                    </div>
                </div>
                    
            </form>
        </div>
    
    </div>

@endsection