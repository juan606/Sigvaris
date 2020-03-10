@extends('principal')
@section('content')

<div class="container" id="tab">
	<div role="application" class="card " >
			<div class="card-header">
				<div class="row">
					<div class="col-sm-6">
						<h4>Datos del proveedor:</h4>
					</div>
					<div class="col-sm-6 ">
						<a class="btn btn-info" href="{{ route('proveedores.create')}}">
							<strong>Agregar Proveedor</strong>
						</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
  					<div class="form-group col-3">
    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
    					<dd>{{ $proveedore->tipopersona }}</dd>
  					</div>
  					<div class="form-group col-3">
  						<label class="control-label" for="alias">Alias:</label>
  						<dd>{{ $proveedore->alias }}</dd>
  					</div>
  					<div class="form-group col-3">
  						<label class="control-label" for="rfc">RFC:</label>
  						<dd>{{ $proveedore->rfc }}</dd>
  					</div>
  					<div class="form-group col-3">
  						<label class="control-label" for="vendedor">Vendedor:</label>
  						<dd>{{ $proveedore->vendedor }}</dd>
  					</div>
				</div>
				@if ($proveedore->tipopersona == "Fisica")
				<div class="row" id="perfisica">
					<div class="form-group col-3">
  						<label class="control-label" for="nombre">Nombre(s):</label>
  						<dd>{{ $proveedore->nombre }}</dd>
  					</div>
  					<div class="form-group col-3">
  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
  						<dd>{{ $proveedore->apellidopaterno }}</dd>
  					</div>
  					<div class="form-group col-3">
  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
  						<dd>{{ $proveedore->apellidomaterno }}</dd>
  					</div>
				</div>
				@else
				<div class="row" id="permoral">
					<div class="form-group col-3">
  						<label class="control-label" for="razonsocial">Razon Social:</label>
  						<dd>{{ $proveedore->razonsocial }}</dd>
  					</div>
				</div>
				@endif
			</div>
		</div>
		<ul role="tablist" class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link active" href="#tab1">Dirección Física:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.direccionfisica.index',['cliente'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-2">Dirección Fiscal:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.contacto.index',['cliente'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosgenerales.index',['cliente'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosbancarios.index', ['cliente' => $proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
		<div role="application" class="card " >
			<div class="card-header">
				<div class="row">
					<div class="col-sm-4">
						<h5>Dirección Física:</h5>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="calle">Calle:</label>
						<dd>{{ $proveedore->calle }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="numext">Numero exterior:</label>
						<dd>{{ $proveedore->numext }}</dd>
					</div>	
					<div class="form-group col-3">
						<label class="control-label" for="numinter">Numero interior:</label>
						<dd>{{ $proveedore->numinter }}</dd>
					</div>	
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-3">
							<label class="control-label" for="colonia">Colonia:</label>
							<dd>{{ $proveedore->colonia }}</dd>
						</div>
						<div class="form-group col-3">
							<label class="control-label" for="municipio">Delegación o Municipio:</label>
							<dd>{{ $proveedore->municipio }}</dd>
						</div>
						<div class="form-group col-3">
							<label class="control-label" for="ciudad">Ciudad:</label>
							<dd>{{ $proveedore->ciudad }}</dd>
						</div>
						<div class="form-group col-3">
							<label class="control-label" for="estado">Estado:</label>
							<dd>{{ $proveedore->estado }}</dd>
						</div>
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-3">
						<label class="control-label" for="calle1">Entre calle:</label>
						<dd>{{ $proveedore->calle1 }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<dd>{{ $proveedore->calle2 }}</dd>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<dd>{{ $proveedore->referencia }}</dd>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<a class="btn btn-warning" href="{{ route('proveedores.edit', ['proveedore'=>$proveedore]) }}">
					       <strong>Editar</strong>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection