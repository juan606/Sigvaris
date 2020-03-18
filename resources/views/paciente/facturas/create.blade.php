@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-4">
                    <h4>Facturas:</h4>
                </div>
                <div class="col-4 text-center">
                    <a href="{{ route('facturas.index') }}" class="btn btn-primary">
                        <i class="fa fa-bars"></i><strong> Lista de facturas</strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <label for="">📅 FECHA</label>
                    <input type="date" name="fecha" class="form-control">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <form action="{{route('facturas.download')}}" method="POST" class="form-right mr-2">
                        @csrf
                        <button type="submit" class="btn btn-success">DESCARGAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                        $('#correo').prop('value',paciente.mail);
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