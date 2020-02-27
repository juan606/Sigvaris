@extends('principal') 
@section('content')

<div class="container-fluid">
	<div role="application" class="panel panel-group">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h4>Datos del Empleado:</h4>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-success" href="{{ route('empleados.create') }}">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar Empleado</strong>
						</a>
					</div>
					<div class="col-sm-4 text-center">
						<a class="btn btn-primary" href="{{ route('empleados.index') }}">
							<i class="fa fa-bars" aria-hidden="true"></i><strong> Lista de Empleados</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" ><strong>N° Usuario</strong></label>
						<input class="form-control" type="number" id="NUsuario" min="0">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label class="control-label" for="appaterno"><strong>Apellido Paterno:</strong></label>
						<dd id="appaterno"></dd>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="apmaterno"><strong>Apellido Materno:</strong></label>
						<dd id="apmaterno"></dd>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="nombre"><strong>Nombre(s):</strong></label>
						<dd id="nombre"></dd>
					</div>
					<div class="col-sm-3">
						<label class="control-label" for="rfc"><strong>RFC:</strong></label>
						<dd id="rfc"></dd>
					</div>
				</div>
			</div>
		</div>
		@yield('infoempleadoSerch')
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#NUsuario').change(function(){
			if($('#NUsuario').val()>=0){  
	            $.ajax({
	             	type: "POST",
		            data: {"_token": $("meta[name='csrf-token']").attr("content"),
		                    "id" : $('#NUsuario').val()
		            },
		            url:"/SerchEmpleado",

		            success: function (data) {
		                console.log(data);
		                
		                $('#empleado_id').val($('#NUsuario').val());
		                $('#appaterno').html(data.appaterno);
		                $('#apmaterno').html(data.apmaterno);
		                $('#nombre').html(data.nombre);
		                $('#rfc').html(data.rfc);
		            }
            	});
	        }
        });
	});
</script>
@endsection