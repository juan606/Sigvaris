@extends('principal')
@section('content')

<div class="container-fluid">
	@if($edit)
		<form role="form" method="POST" action="{{ route('empleados.update', ['empleado' => $empleado]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
	@else
		<form role="form" id="form-empleado" method="POST" action="{{ route('empleados.store') }}" name="form">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{ $empleado->id }}">
	@endif
	<div role="application" class="panel panel-group">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-4">
						<h4>Datos del Empleado:</h4>
					</div>
					<div class="col-4 text-center">
						<a href="{{ route('empleados.index') }}" class="btn btn-primary">
							<i class="fa fa-bars" aria-hidden="true"></i><strong> Lista de Empleados</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				@if (session('error'))
					<div class="row">
						<div class="col-12">
							<div class="alert alert-danger">
								{{session('error')}}
							</div>
						</div>
					</div>
				@endif
				<div class="row">
					<div class="col-3">
						<label class="control-label" for="appaterno">✱Apellido Paterno:</label>
						<input type="text" class="form-control" id="appaterno" name="appaterno" required="" value="{{ $empleado->appaterno }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="apmaterno">✱Apellido Materno:</label>
						<input type="text" id="apmaterno" class="form-control" name="apmaterno" required="" value="{{ $empleado->apmaterno }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="nombre">✱Nombre(s):</label>
						<input type="text" class="form-control" id="nombre" name="nombre" required="" value="{{ $empleado->nombre }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="nombre">✱RFC:</label>
						<input type="text" class="form-control" id="rfc" name="rfc" required="" value="{{ $empleado->rfc }}">
					</div>
					
				</div>
			</div>
		</div>
		@if($edit)
		<div>
			<ul class="nav nav-pills nav-justified">
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.show', ['empleado' => $empleado]) }}"  class="nav-link active">Generales:</a></li>
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.datoslaborales.index', ['empleado' => $empleado]) }}" class="nav-link">Laborales:</a></li>
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.estudios.index', ['empleado' => $empleado]) }}" class="nav-link">Estudios:</a></li>
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.emergencias.index', ['empleado' => $empleado]) }}" class="nav-link">Emergencias:</a></li>
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.vacaciones.index', ['empleado' => $empleado]) }}" class="nav-link">Vacaciones:</a></li>
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltasDH.index',['empleado'=>$empleado]) }}" class="nav-link">Faltas:</a></li>
			
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.permisos.index',['empleado'=>$empleado]) }}" class="nav-link ">Permisos:</a></li>
				<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltas.index', ['empleado' => $empleado]) }}" class="nav-link">Administrativo:</a></li>
			</ul>
		</div>
		@endif

		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-4">
						<h4>Datos generales:</h4>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="telefono">Teléfono:</label>
						<input type="text" class="form-control" name="telefono" id="telefono" value="{{ $empleado->telefono }}">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="movil">Celular:</label>
						<input type="text" class="form-control" name="movil" id="movil" value="{{ $empleado->movil }}">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="email">✱Correo electrónico:</label>
						<input type="email" class="form-control" name="email" id="email" value="{{ $empleado->email }}" required="">
					</div><div class="form-group col-3">
						<label class="control-label" for="nss">Número de Seguro Social:</label>
						<input type="text" class="form-control" name="nss" id="nss" value="{{ $empleado->nss }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="curp">CURP.:</label>
						<input type="text" class="form-control" name="curp" id="curp" value="{{ $empleado->curp }}">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="infonavit">Número de INFONAVIT:</label>
						<input type="text" class="form-control" name="infonavit" id="infonavit" value="{{ $empleado->infonavit }}">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="fnac">✱Fecha de nacimiento:</label>
						<input type="date" class="form-control" name="fnac" id="fnac" value="{{ $empleado->fnac }}" required="">
					</div><div class="form-group col-3">
						<label class="control-label" for="cp">Código Postal:</label>
						<input type="text" class="form-control" name="cp" id="cp" value="{{ $empleado->cp }}">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="calle">Calle:</label>
						<input type="text" class="form-control" name="calle" id="calle" value="{{ $empleado->calle }}">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="numext">Número Exterior:</label>
						<input type="text" class="form-control" name="numext" id="numext" value="{{ $empleado->numext }}">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="numint">Número Interior:</label>
						<input type="text" class="form-control" name="numint" id="numint" value="{{ $empleado->numint }}">
					</div><div class="form-group col-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<input type="text" class="form-control" name="colonia" id="colonia" value="{{ $empleado->colonia }}">
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label class="control-label" for="municipio">Municipio:</label>
						<input type="text" class="form-control" name="municipio" id="municipio" value="{{ $empleado->municipio }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="estado">Estado:</label>
						<input type="text" class="form-control" name="estado" id="estado" value="{{ $empleado->estado }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="calles">Entre calles:</label>
						<input type="text" class="form-control" name="calles" id="calles" value="{{ $empleado->calles }}">
					</div>
					<div class="col-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<input type="text" class="form-control" name="referencia" id="referencia" value="{{ $empleado->referencia }}">
					</div>
				</div>
				<div class="row my-3">
					<div class="col-4 offset-4">
						<label class="control-label" for="oficina_id">✱ Oficina:</label>
						<select class="custom-select" required name="oficina_id" id="oficina_id">
							<option value="">Seleccionar...</option>
							@foreach($oficinas as $oficina)
							<option value="{{$oficina->id}}">{{$oficina->nombre}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-4 offset-4 text-center">
						<button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Guardar</button>
					</div>
					<div class="col-4 text-right text-danger">
						<h5>✱Campos Requeridos</h5>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#rfc').change(function(event) {
			if ($('#rfc').val().length ==13 ){

			}else{
				alert("RFC Incorrecto");
				$('#rfc').val("");
			}
		});
	});
	
</script>
@endsection