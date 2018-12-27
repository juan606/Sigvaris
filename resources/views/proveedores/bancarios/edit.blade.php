@extends('principal')
@section('content')
<div class="container" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.datosbancarios.update', ['proveedore' => $proveedore, 'bancario' => $proveedore->datosBancarios->first()]) }}" name="form">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		<div role="application" class="panel panel-group" >
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Datos del Proveedor:</h4>
						</div>
						<div class="col-sm-4 text-center">
							<a class="btn btn-success" href="{{ route('proveedores.create')}}">
								<strong>Agregar Proveedor</strong>
							</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
	    					<dd>{{ $proveedore->tipopersona }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="alias">Alias:</label>
	  						<dd>{{ $proveedore->alias }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc">RFC:</label>
	  						<dd>{{ $proveedore->rfc }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="vendedor">Vendedor:</label>
	  						<dd>{{ $proveedore->vendedor }}</dd>
	  					</div>
					</div>
					@if ($proveedore->tipopersona == "Fisica")
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="nombre">Nombre(s):</label>
	  						<dd>{{ $proveedore->nombre }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
	  						<dd>{{ $proveedore->apellidopaterno }}</dd>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
	  						<dd>{{ $proveedore->apellidomaterno }}</dd>
	  					</div>
					</div>
					@else
					<div class="row" id="permoral">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="razonsocial">Razon Social:</label>
	  						<dd>{{ $proveedore->razonsocial }}</dd>
	  					</div>
					</div>
					@endif
				</div>
			</div>
			<ul role="tablist" class="nav nav-pills">
				<li class="nav-link">
					<a href="{{ route('proveedores.show',['proveedore'=>$proveedore]) }}">Dirección Fìsica:</a>
				</li>
				<li role="presentation" tabindex="-1" class="nav-link" aria-controls="tabs-2" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false">
					<a href="{{ route('proveedores.direccionfisica.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-2">Dirección Fiscal:</a>
				</li>
				<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
					<a href="{{ route('proveedores.contacto.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Contacto:</a>
				</li>
				<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
					<a href="{{ route('proveedores.datosgenerales.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Datos Generales:</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#tab4">Datos Bancarios:</a>
				</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h5>Datos Bancarios:&nbsp;<small><small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></small></h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="banco"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Banco:</label>
	    					<select class="form-control" id="banco" name="banco_id" required="">
	    						<option>Seleccionar</option>
	    						@foreach($bancos as $banco)
	    						<option value="{{ $banco->id }}"<?php echo $bancario->banco->id == $banco->id ? ' selected=""' : '' ?>>{{ $banco->nombre }}</option>
	    						@endforeach
	    					</select>
	    				</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="cuenta"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Número de Cuenta:</label>
	  						<input type="text" class="form-control" id="cuenta" name="cuenta" required="" value="{{ $bancario->cuenta }}">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="clabe"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> CLABE:</label>
	  						<input type="text" class="form-control" id="clabe" name="clabe" required="" value="{{ $bancario->clabe }}">
	  					</div>
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="beneficiario"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Beneficiario:</label>
	  						<input type="text" class="form-control" id="beneficiario" name="beneficiario" required="" value="{{ $bancario->beneficiario }}">
	  					</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-success">
						        <strong>Guardar</strong>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection