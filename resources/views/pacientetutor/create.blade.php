@extends('paciente.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>tutores</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-tutor">
    </div>
    <div class="row">
        <div class="col-12">
            <form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('pacientes.tutores.store', ['paciente'=>$paciente]) }}" name="form">
                    {{ csrf_field() }}
                    
                <div class="row">
                    <div class="form-group col-3">
                        <label class="control-label" for="nombre"><i class="fa fa-asterisk"></i> Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="" required autofocus>
                    </div>
                    <div class="form-group col-3">
                        <label class="control-label" for="paterno"><i class="fa fa-asterisk"></i> Apellido Paterno:</label>
                        <input type="text" class="form-control" id="paterno" name="paterno" value="" required>
                    </div>	
                    <div class="form-group col-3">
                        <label class="control-label" for="materno"><i class="fa fa-asterisk"></i> Apellido Materno:</label>
                        <input type="text" class="form-control" id="materno" name="materno" value="" required>
                    </div>
                    <div class="form-group col-3">
                        <label class="control-label" for="relacion"><i class="fa fa-asterisk"></i> Relación:</label>
                        <input type="text" class="form-control" id="relacion" name="relacion" value="" required>
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