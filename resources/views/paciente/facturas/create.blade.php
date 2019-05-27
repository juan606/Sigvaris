@extends('principal')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h4>Datos fiscales:</h4>
            </div>
            <div class="col-4 text-center">
                <a href="{{ route('facturas.index') }}" class="btn btn-primary">
                    <i class="fa fa-bars"></i><strong> Lista de facturas</strong>
                </a>
            </div>
        </div>
    </div>
    <form role="form" name="Form" {{-- onsubmit="return validateForm()" --}} id="form-cliente" method="POST" action="{{ route('facturas.store') }}" name="form">
        {{ csrf_field() }}

        <div class="card-body">
            <div class="row">
                <div class="form-group col-3">
                    <label for="paciente_id">Paciente:</label>
                    <select class="form-control" name="paciente_id" id="paciente_id">
                        <option value="">Seleccione un paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->nombre}} {{$paciente->paterno}} {{$paciente->materno}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-3" style="display: none;" id="div_ventas">
                    <label for="venta_id">Venta:</label>
                    <select class="form-control" name="venta_id" id="venta_id">                
                    </select>
                </div>
            </div>
        </div>
        

        <div class="card-body" id="formulario" style="display: none;">
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">✱Tipo de persona:</label>
                    <select name="tipo_persona">
                        <option value="">Seleccione el tipo de persona</option>
                        <option value="1">Persona fisica</option>
                        <option value="0">Persona moral</option>
                    </select>
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Nombre o razon social:</label>
                    <input type="text" name="nombre" class="form-control" required="" id="nombre">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Regimen fiscal:</label>
                    <input type="text" name="regimen_fiscal" class="form-control" required="" id="nombre">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">✱Homoclave:</label>
                    <input type="text" name="homoclave" class="form-control" required="" id="homoclave">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Correo:</label>
                    <input type="email" name="correo" class="form-control" id="correo">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">RFC:</label>
                    <input type="text" name="rfc" class="form-control" id="rfc">
                </div>          
            </div>                        
            <div class="row">                
                <div class="col-3 form-group">
                    <label class="control-label">Calle</label>
                    <input type="text" name="calle" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Numero exterior</label>
                    <input type="text" name="num_ext" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Numero interior</label>
                    <input type="text" name="num_int" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Colonia</label>
                    <input type="text" name="colonia" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Alcaldia o municipio</label>
                    <input type="text" name="municipio" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Estado</label>
                    <input type="text" name="estado" class="form-control" required="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">C.P.</label>
                    <input type="text" name="cp" class="form-control" required="">
                </div>
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

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#paciente_id').change(function() {
                var id = $('#paciente_id').val();                
                //alert(id);
                $.ajax({
                    url: "{{ url('/ventas_from') }}/"+id,
                    type: "GET",
                    dataType: "html",
                    success: function(res){
                        $('#div_ventas').show();
                        $('#venta_id').html(res);
                    },
                    error: function (){
                        //$('#estados').html('');
                    }
                });

                $.ajax({
                    url:"{{url('/get_paciente')}}/"+id,
                    type:"GET",
                    dataType: "json",
                    success:function(res){
                        var paciente=res.paciente;
                        $('#nombre').prop('value',paciente.nombre+' '+paciente.paterno+' '+paciente.materno);
                        $('#correo').prop('value',paciente.email);
                        $('#rfc').prop('value',paciente.rfc);
                    }
                });
            });

        $('#venta_id').change(function(){
            $('#formulario').show();
        });
    });
</script>

@endsection