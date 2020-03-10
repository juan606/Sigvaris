@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Consultorios</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-consultorios">
    </div>
    <div class="row">
        <div class="col-12">
            <form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('doctores.consultorios.store', ['doctor'=>$doctor]) }}" name="form">
                    {{ csrf_field() }}
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="hospital_id"><i class="fa fa-asterisk" aria-hidden="true"></i> Hospital:</label>
                        <select type="select" class="form-control" name="hospital_id" id="hospital">
							<option value="">Sin Definir</option>
							@foreach ($hospitals as $hospital)
								<option value="{{ $hospital->id }}">{{ $hospital->nombre }}/{{ $hospital->etiqueta }}</option>
							@endforeach
						</select>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Dirección:</label>
                        <input type="text" class="form-control" id="apater" name="direccion" value="" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Secretario/a:</label>
                        <input type="text" class="form-control" id="amater" name="secretaria" value="" >
                    </div>		
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Teléfono 1:</label>
                        <input type="text" class="form-control" id="nombre" name="tel1" value=""  autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Teléfono 2:</label>
                        <input type="text" class="form-control" id="apater" name="tel2" value="" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Días de consulta:</label>
                        <input type="text" class="form-control" id="amater" name="tel3" value="" >
                    </div>		
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre">Correo:</label>
                        <input type="text" class="form-control" id="nombre" name="mail" value=""  autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Horario desde:</label>
                        <input type="time" class="form-control" id="apater" name="desde" value="" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="amater">Horario hasta:</label>
                        <input type="time" class="form-control" id="amater" name="hasta" value="" >
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