@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Premios</h4></div>  
    </div>
    <div class="row">
        <div class="col-12">
            <form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('doctores.premios.update', ['doctor'=>$doctor,'premio'=>$premio]) }}" name="form">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                <input type="hidden" name="proveedor_id" value="{{$doctor->id}}" required>
                    
                    
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$premio->nombre}}" required autofocus>
                    </div>
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Institución:</label>
                        <input type="text" class="form-control" id="apater" name="institucion" value="{{$premio->institucion}}" >
                    </div>	
                    <div class="form-group col-4">
                        <label class="control-label" for="apater">Quién otorga:</label>
                        <input type="text" class="form-control" id="apater" name="otorga" value="{{$premio->otorga}}" >
                    </div>	
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label class="control-label" for="nombre"> Fecha:</label>
                        <input type="date" class="form-control" id="nombre" name="fecha" value="{{$premio->fecha}}"  autofocus>
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