@extends('layouts.infoproveedor')
@section('cliente')
		<ul role="tablist" class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.show',['proveedore'=>$proveedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.direccionfisica.index',['proveedore'=>$proveedore]) }}">Dirección Fisica:</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('proveedores.contacto.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link active" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosgenerales.index',['cliente'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosbancarios.index', ['cliente' => $proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
		<div class="panel-heading">Contacto:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
			<div class="panel-body">
				<form role="form" name="domicilio" id="form-cliente" method="POST" action="{{ route('proveedores.contacto.store', ['proveedore'=>$proveedore]) }}" name="form">
					{{ csrf_field() }}
					<input type="hidden" name="proveedor_id" value="{{$proveedore->id}}" required>
					<div class="col-xs-offset-10">
						<button type="submit" class="btn btn-success">
					<strong>Guardar</strong>	</button>
						
					</div>	
					<div class="row">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre(s):</label>
	    					<input type="text" class="form-control" id="nombre" name="nombre" value="" required autofocus>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="apater"><i class="fa fa-asterisk" aria-hidden="true"></i> Apellido paterno:</label>
	    					<input type="text" class="form-control" id="apater" name="apater" value="" required>
	  					</div>	
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	    					<label class="control-label" for="amater">Apellido materno:</label>
	    					<input type="text" class="form-control" id="amater" name="amater" value="">
	  					</div>		
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="area">Área:</label>
	  						<input type="text" class="form-control" id="area" name="area" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="puesto">Puesto:</label>
	  						<input type="text" class="form-control" id="puesto" name="puesto" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
  							<label class="control-label" for="telefono1">Telefono:</label>
	  						<input type="text" class="form-control" id="telefono1" name="telefono1" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ext1">Extensión:</label>
	  						<input type="text" class="form-control" id="ext1" name="ext1" size="6" value="">
	  					</div>
					</div>
					<div class="row" id="perfisica">
						<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="telefono2">Telefono :</label>
	  						<input type="text" class="form-control" id="telefono2" name="telefono2" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="ext2">Extensión:</label>
	  						<input type="text" class="form-control" id="ext2" name="ext2" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="telefonodir"><i class="fa fa-asterisk" aria-hidden="true"></i> Telefono directo:</label>
	  						<input type="text" class="form-control" id="telefonodir" name="telefonodir" value="" required>
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="celular1">Celular:</label>
	  						<input type="text" class="form-control" id="celular1" name="celular1" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="celular2">Celular:</label>
	  						<input type="text" class="form-control" id="celular2" name="celular2" value="">
	  					</div>
	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="email1"><i class="fa fa-asterisk" aria-hidden="true"></i> Correo electronico:</label>
	  						<input type="email" class="form-control" id="email1" name="email1" value="" required>
	  					</div>

	  					<div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
	  						<label class="control-label" for="email2">Correo electronico:</label>
	  						<input type="email" class="form-control" id="email2" name="email2" value="">
	  					</div>
					</div>
					
				</form>
			</div>
	</div>
@endsection