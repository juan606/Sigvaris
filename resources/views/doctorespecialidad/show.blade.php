@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Especialidades</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-especialidades">
        <div class="col-4 px-5">
            <a href="{{ route('doctores.especialidades.index', ['doctor' => $doctor]) }}" class="btn btn-primary"><i class="fa fa-bars"></i><strong> Lista de Especialidades</strong></a>
        </div> 
        <div class="col-4 px-5">
            <a href="{{route('doctores.especialidades.edit', ['doctor'=>$doctor, 'especialidad'=>$especialidad->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-6">
                        <label class="control-label" for="nombre"></i> Especialidad:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$especialidad->nombre}}" readonly  >
                    </div>
                    <div class="form-group col-6">
                        <label class="control-label" for="apater">Cédula:</label>
                        <input type="text" class="form-control" id="apater" name="cedula" value="{{$especialidad->cedula}}" readonly >
                    </div>		
                </div>
                    
        </div>
    
    </div>

@endsection