@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Premios</h4></div>  
    </div>
    <div class="row">
        <div class="col-12">
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$premio->nombre}}"  autofocus readonly>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Institución:</label>
                        <input type="text" class="form-control" id="apater" name="institucion" value="{{$premio->institucion}}"  readonly>
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Quién otorga:</label>
                        <input type="text" class="form-control" id="apater" name="otorga" value="{{$premio->otorga}}" readonly >
                    </div>	
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Fecha:</label>
                        <input type="date" class="form-control" id="nombre" name="fecha" value="{{$premio->fecha}}"  autofocus readonly>
                    </div>
                </div>
                    
        </div>
    
    </div>

@endsection