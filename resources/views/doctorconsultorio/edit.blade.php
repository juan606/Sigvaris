@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Consultorios</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-consultorios"> 
    </div>
    <div class="row">
        <div class="col-12">
            <form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('doctores.consultorios.update', ['doctor'=>$doctor, 'consultorio'=>$consultorio]) }}" name="form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Hospital:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$consultorio->nombre}}" required autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Dirección:</label>
                        <input type="text" class="form-control" id="apater" name="direccion" value="{{$consultorio->direccion}}" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Secretario/a:</label>
                        <input type="text" class="form-control" id="amater" name="secretaria" value="{{$consultorio->secretaria}}" >
                    </div>		
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Teléfono 1:</label>
                        <input type="text" class="form-control" id="nombre" name="tel1" value="{{$consultorio->tel1}}"  autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Teléfono 2:</label>
                        <input type="text" class="form-control" id="apater" name="tel2" value="{{$consultorio->tel2}}" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Teléfono 3:</label>
                        <input type="text" class="form-control" id="amater" name="tel3" value="{{$consultorio->tel3}}" >
                    </div>		
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre">Correo:</label>
                        <input type="text" class="form-control" id="nombre" name="mail" value="{{$consultorio->mail}}"  autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Horario desde:</label>
                        <input type="time" class="form-control" id="apater" name="desde" value="{{$consultorio->desde}}" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Horario hasta:</label>
                        <input type="time" class="form-control" id="amater" name="hasta" value="{{$consultorio->hasta}}" >
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