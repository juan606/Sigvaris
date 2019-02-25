@extends('principal')
@section('content')
<div class="container-fluid">
	<div role="application" class="panel panel-group">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-4">
						<h4>Datos del Empleado:</h4>
					</div>
					<div class="col-4 text-center">
						<a class="btn btn-success" href="{{ route('empleados.create') }}">
							<i class="fa fa-plus" aria-hidden="true"></i><strong> Agregar Empleado</strong>
						</a>
					</div>
					<div class="col-4 text-center">
						<a class="btn btn-primary" href="{{ route('empleados.index') }}">
							<i class="fa fa-bars" aria-hidden="true"></i><strong> Lista de Empleados</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-3">
						<label class="control-label" for="appaterno">Apellido Paterno:</label>
						<dd>{{ $empleado->appaterno }}</dd>
					</div>
					<div class="col-3">
						<label class="control-label" for="apmaterno">Apellido Materno:</label>
						<dd>{{ $empleado->apmaterno }}</dd>
					</div>
					<div class="col-3">
						<label class="control-label" for="nombre">Nombre(s):</label>
						<dd>{{ $empleado->nombre }}</dd>
					</div>
					<div class="col-3">
						<label class="control-label" for="rfc">RFC:</label>
						<dd>{{ $empleado->rfc }}</dd>
					</div>
				</div>
			</div>
		</div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.show', ['empleado' => $empleado]) }}"  class="nav-link active">Generales:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.datoslaborales.index', ['empleado' => $empleado]) }}" class="nav-link">Laborales:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.estudios.index', ['empleado' => $empleado]) }}" class="nav-link">Estudios:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.emergencias.index', ['empleado' => $empleado]) }}" class="nav-link">Emergencias:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.vacaciones.index', ['empleado' => $empleado]) }}" class="nav-link">Vacaciones:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltas.index', ['empleado' => $empleado]) }}" class="nav-link">Administrativo:</a></li>
		</ul>
		<div class="panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-4">
						<h5>Datos Generales:</h5>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="telefono">Teléfono:</label>
						<dd>{{ $empleado->telefono }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="movil">Celular:</label>
						<dd>{{ $empleado->movil }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="email">Correo electrónico:</label>
						<dd>{{ $empleado->email }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="nss">NSS (IMSS):</label>
						<dd>{{ $empleado->nss }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="curp">CURP:</label>
						<dd>{{ $empleado->curp }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="infonavit">INFONAVIT:</label>
						<dd>{{ $empleado->infonavit }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="fnac">Fecha de nacimiento:</label>
						<dd>{{ $empleado->fnac }}</dd>
					</div><div class="form-group col-3">
						<label class="control-label" for="cp">Código Postal:</label>
						<dd>{{ $empleado->cp }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="calle">Calle:</label>
						<dd>{{ $empleado->calle }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="numext">Número Exterior:</label>
						<dd>{{ $empleado->numext }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="numint">Número Interior:</label>
						<dd>{{ $empleado->numint }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<dd>{{ $empleado->colonia }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<label class="control-label" for="municipio">Municipio:</label>
						<dd>{{ $empleado->municipio }}</dd>
					</div>
					<div class="col-3">
						<label class="control-label" for="estado">Estado:</label>
						<dd>{{ $empleado->estado }}</dd>
					</div>
					<div class="col-3">
						<label class="control-label" for="referencia">Entre calles:</label>
						<dd>{{ $empleado->calles }}</dd>
					</div>
					<div class="col-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $empleado->referencia }}</dd>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-12 text-center">
						<a class="btn btn-danger" href="{{ route('empleados.edit', ['empleado' => $empleado]) }}">
							<i class="fa fa-pencil" aria-hidden="true"></i><strong> Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection