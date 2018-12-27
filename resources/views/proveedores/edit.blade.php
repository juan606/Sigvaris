@extends('principal')
@section('content')
<div class="container" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.update', ['proveedore' => $proveedore]) }}" name="form">
		{{ csrf_field() }}
		<input type="hidden" name="_method" value="PUT">
		<div role="application" class="panel panel-group" >
			<div class="panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h4>Datos del Proveedor:&nbsp;<small><small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></small></h4>
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
	    					<label class="control-label" for="tipopersona"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de Persona:</label>
	    					<select type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
	    						<option id="Fisica" value="Fisica" @if ($proveedore->tipopersona == "Fisica")
	    							{{-- expr --}}
	    							selected="selected" 
	    						@endif>Fisica</option>
	    						<option id="Moral" value="Moral" @if ($proveedore->tipopersona == "Moral")
	    							{{-- expr --}}
	    							selected="selected" 
	    						@endif>Moral</option>
	    					</select>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="alias"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Alias:</label>
	  						<input type="text" class="form-control" id="alias" name="alias" value="{{ $proveedore->alias }}" required autofocus>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="rfc"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> RFC:</label>
	  						<input type="text" class="form-control" id="rfc" name="rfc" value="{{ $proveedore->rfc }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="vendedor">Vendedor:</label>
	  						<input type="text" class="form-control" id="vendedor" name="vendedor" value="{{ $proveedore->vendedor }}">
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="nombre"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Nombre(s):</label>
	  						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proveedore->nombre }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidopaterno"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Apellido Paterno:</label>
	  						<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" value="{{ $proveedore->apellidomaterno }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
	  						<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno" value="{{ $proveedore->apellidomaterno }}">
	  					</div>
					</div>
					<div class="row" id="permoral" style="display:none;">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="razonsocial"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Razon Social:</label>
	  						<input type="text" class="form-control" id="razonsocial" name="razonsocial" value="{{ $proveedore->razonsocial }}">
	  					</div>
					</div>
				</div>
			</div>
			<ul role="tablist" class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link active" href="#tab1">Dirección Fìsica:</a>
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
				<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
					<a href="{{ route('proveedores.datosbancarios.index', ['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
				</li>
			</ul>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-4">
							<h5>Dirección Física:&nbsp;<small><small><i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</small></small></h5>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-sm-3">
	    					<label class="control-label" for="calle"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Calle:</label>
	    					<input type="text" class="form-control" id="calle" name="calle" value="{{ $proveedore->calle }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numext"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Numero exterior:</label>
	    					<input type="text" class="form-control" id="numext" name="numext" value="{{ $proveedore->numext }}" required>
	  					</div>	
	  					<div class="form-group col-sm-3">
	    					<label class="control-label" for="numinter">Numero interior:</label>
	    					<input type="text" class="form-control" id="numinter" name="numinter" value="{{ $proveedore->numinter }}">
	  					</div>	
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="colonia"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Colonia:</label>
	  						<input type="text" class="form-control" id="colonia" name="colonia" value="{{ $proveedore->colonia }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="municipio"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Delegación o Municipio:</label>
	  						<input type="text" class="form-control" id="municipio" name="municipio" value="{{ $proveedore->municipio }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="ciudad"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Ciudad:</label>
	  						<input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $proveedore->ciudad }}" required>
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="estado"><small><small><i class="fa fa-asterisk" aria-hidden="true"></i></small></small> Estado:</label>
	  						<input type="text" class="form-control" id="estado" name="estado" value="{{ $proveedore->estado }}" required>
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle1">Entre calle:</label>
	  						<input type="text" class="form-control" id="calle1" name="calle1" value="{{ $proveedore->calle1 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="calle2">Y calle:</label>
	  						<input type="text" class="form-control" id="calle2" name="calle2" value="{{ $proveedore->calle2 }}">
	  					</div>
	  					<div class="form-group col-sm-3">
	  						<label class="control-label" for="referencia">Referencia:</label>
	  						<input type="text" class="form-control" id="referencia" name="referencia" value="{{ $proveedore->referencia }}">
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