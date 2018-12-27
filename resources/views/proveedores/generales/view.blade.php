@extends('layouts.infoproveedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.show',['proveedore'=>$proveedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.direccionfisica.index',['proveedore'=>$proveedore]) }}">Dirección Fisica:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.contacto.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Contacto:</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('proveedores.datosgenerales.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link active" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosbancarios.index', ['cliente' => $proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales:</div>
	 	<div class="panel-body">
	 		<div class="row">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<dd>{{$datos->tamano}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Giro de la empresa:</label>
	 				@if($datos->giro_id == null)
	 				<dd>No tiene giro</dd>
	 				@else
					<dd>{{$giro->nombre}}</dd>
					@endif
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="nombre">Forma de contacto:</label>
	 				@if($datos->forma_contacto_id == null)
	 				<dd>No tiene forma de contacto</dd>
	 				@else
	 				<dd>{{$formaContacto->nombre}}</dd>
	 				@endif
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<dd><a href="{{$datos->web}}" target="_blank">{{$datos->web}}</a></dd>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<dd>{{$datos->comentario}}</dd>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="fechacontacto">Fecha de contacto:</label>
	 				<dd>{{$datos->fechacontacto}}</dd>
	 				
	 			</div>
	 		</div>
 		<a class="btn btn-info" href="{{ route('proveedores.datosgenerales.edit',['proveedores'=>$proveedore,'datosgenerale'=>$datos]) }}">
 	<strong>Editar</strong>	</a>
	 	</div>
	</div>
	@endsection