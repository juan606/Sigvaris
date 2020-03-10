@extends('layouts.infoproveedor')
@section('cliente')

		<ul role="tablist" class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.show',['proveedore'=>$proveedore]) }}">Dirección Fìsica:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.direccionfisica.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-2">Dirección Fiscal:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.contacto.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosgenerales.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Datos Generales:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active"href="#tab4">Datos Bancarios:</a>
			</li>
		</ul>
		<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row">
				<div class="col-sm-4">
					<h5>Datos Bancarios:</h5>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="form-group col-sm-3">
					<label class="control-label" for="banco">Banco:</label>
					<dd>{{ $bancario->banco->nombre }}</dd>
				</div>
				<div class="form-group col-sm-3">
						<label class="control-label" for="cuenta">Número de Cuenta:</label>
					<dd>{{ $bancario->cuenta }}</dd>
					</div>
				<div class="form-group col-sm-3">
						<label class="control-label" for="clabe">CLABE:</label>
					<dd>{{ $bancario->clabe }}</dd>
					</div>
				<div class="form-group col-sm-3">
						<label class="control-label" for="beneficiario">Beneficiario:</label>
					<dd>{{ $bancario->beneficiario }}</dd>
					</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<a class="btn btn-warning" href="{{ route('proveedores.datosbancarios.edit', ['proveedore' => $proveedore, 'bancario' => $proveedore->datosBancarios->first()]) }}">
				       <strong>Editar</strong>
					</a>
				</div>
			</div>
		</div>
	</div>
@endsection