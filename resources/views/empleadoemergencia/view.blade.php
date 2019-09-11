@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="nav-link">Generales:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="nav-link">Laborales:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="nav-link active">Emergencias:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="nav-link">Vacaciones:</a></li>
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="nav-link">Administrativo:</a></li>
		</ul>
	</div>
	<div class="card">
		<div class="card-header"><h5>Emergencias:</h5></div>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-xs-4">
					<label class="control-label" for="sangre" id="sangre">Tipo de Sangre:</label>
					<dd>{{$emergencias->sangre}}</dd>
				</div>
			</div>
			<div class="row">
				{{-- Textarea enfermedades --}}
				<div class="col-12 col-md-4">
					<div class="form-group">
						<label for="enfermedades" id="lbl_enf">Enfermedades:</label>
						<textarea class="form-control" id="enfermedades" maxlength="500" disabled="disabled">{{ $emergencias->enfermedades }}</textarea>		
					</div>
				</div>
				{{-- Textarea alergias --}}
				<div class="col-12 col-md-4">
					<div class="form-group">
						<label class="control-label" for="alergias" id="lbl_alerg">Alergias:</label>
						<textarea class="form-control" id="alergias" maxlength="500" disabled="disabled">{{ $emergencias->alergias }}</textarea>
					</div>
				</div>
				{{-- Textarea operaciones --}}
				<div class="col-12 col-md-4">
					<div class="form-group">
						<label class="control-label" for="operaciones" id="lbl_oper">Operaciones:</label>
						<textarea class="form-control" id="operaciones" maxlength="500" disabled="disabled">{{ $emergencias->operaciones }}</textarea>
					</div>
				</div>
			</div>
			<div class="card-header"><h5>En caso de emergencia llamar a:</h5></div>

			<div class="row">
				{{-- Input nombre --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="nombrecontac1">Nombre:</label>
					<dd>{{ $emergencias->nombrecontac1 }}</dd>
				</div>
				{{-- Input parentezco --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="parentescocontac1">Parentesco:</label>
					<dd>{{ $emergencias->parentescocontac1 }}</dd>
				</div>
				{{-- Input telefono --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="telefonocontac1">Télefono:</label>
					<dd>{{ $emergencias->telefonocontac1 }}</dd>
				</div>
				{{-- Input telefono celular --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="movilcontac1">Telefono celular:</label>
					<dd>{{ $emergencias->movilcontac1 }}</dd>
				</div>
				{{-- Input nombre 2--}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="nombrecontac2">Nombre:</label>
					<dd>{{ $emergencias->nombrecontac2 }}</dd>
				</div>
				{{-- Input parentezco 2 --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="parentescocontac2">Parentesco:</label>
					<dd>{{ $emergencias->parentescocontac2 }}</dd>
				</div>
				{{-- Input telefono 2 --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="telefonocontac2">Télefono:</label>
					<dd>{{ $emergencias->telefonocontac2 }}</dd>
				</div>
				{{-- Input telefono celular 2 --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="movilcontac1">Telefono celular:</label>
					<dd>{{ $emergencias->movilcontac2 }}</dd>
				</div>
			{{-- Input nombre 3--}}
			<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="nombrecontac3">Nombre:</label>
					<dd>{{ $emergencias->nombrecontac3 }}</dd>
				</div>
				{{-- Input parentezco 3 --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="parentescocontac3">Parentesco:</label>
					<dd>{{ $emergencias->parentescocontac3 }}</dd>
				</div>
				{{-- Input telefono 3 --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="telefonocontac3">Télefono:</label>
					<dd>{{ $emergencias->telefonocontac3 }}</dd>
				</div>
				{{-- Input telefono celular 3 --}}
				<div class="col-12 col-sm-4 col-md-3">
					<label class="control-label" for="movilcontac3">Telefono celular:</label>
					<dd>{{ $emergencias->movilcontac3 }}</dd>
				</div>
			</div>
			<a class="btn btn-info btn-md" href="{{ route('empleados.emergencias.edit',['empleado'=>$empleado,'emergencia'=>$emergencias]) }}">Editar</a>
		</div>
	</div>
@endsection