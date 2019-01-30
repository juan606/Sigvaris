@extends('paciente.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Consultorios</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-tallas">
        <div class="col-4 px-5">
            <a href="{{ route('doctores.consultorios.index', ['doctor' => $doctor]) }}" class="btn btn-primary"><i class="fa fa-bars"></i><strong> Lista de Consultorios</strong></a>
        </div> 
        <div class="col-4 px-5">
            <a href="{{route('doctores.consultorios.edit', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Hospital:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$consultorio->nombre}}" required readonly autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Dirección:</label>
                        <input type="text" class="form-control" id="apater" name="direccion" value="{{$consultorio->direccion}}" required readonly>
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Secretario/a:</label>
                        <input type="text" class="form-control" id="amater" name="secretaria" value="{{$consultorio->secretaria}}" required readonly>
                    </div>		
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Teléfono 1:</label>
                        <input type="text" class="form-control" id="nombre" name="tel1" value="{{$consultorio->tel1}}" required readonly autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Teléfono 2:</label>
                        <input type="text" class="form-control" id="apater" name="tel2" value="{{$consultorio->tel2}}" required readonly>
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Teléfono 3:</label>
                        <input type="text" class="form-control" id="amater" name="tel3" value="{{$consultorio->tel3}}" required readonly>
                    </div>		
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre">Correo:</label>
                        <input type="text" class="form-control" id="nombre" name="mail" value="{{$consultorio->mail}}" required readonly autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Horario desde:</label>
                        <input type="time" class="form-control" id="apater" name="desde" value="{{$consultorio->desde}}" required readonly>
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Horario hasta:</label>
                        <input type="time" class="form-control" id="amater" name="hasta" value="{{$consultorio->hasta}}" required readonly>
                    </div>		
                </div>
                    
        </div>
    
    </div>

@endsection