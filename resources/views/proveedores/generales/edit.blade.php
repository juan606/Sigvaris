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
				<a class="nav-link active" href="{{ route('proveedores.datosgenerales.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link active" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosbancarios.index', ['cliente' => $proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales:&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</a></li></div>
		<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.datosgenerales.update',['proveedore'=>$proveedore, 'datosgenerale'=>$datos]) }}" name="form">
	{{ csrf_field() }}
	<input type="hidden" name="_method" value="PUT">
	 <input type="hidden" name="proveedor_id" value="{{$proveedore->id}}">
	 	<div class="panel-body">
	 			
	 		<div class="row">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>Giro:</label>
				<select type="select" name="giro_id" class="form-control" id="giro_id">
					
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}" @if ($datos->giro_id == $giro->id)
								{{-- expr --}}
								selected="selected"
							@endif >{{$giro->nombre}}</option>
						@endforeach
				</select>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano">
						<option id="micro" value="micro" @if ($datos->tamano == "micro")
							selected="selected" 
							{{-- expr --}}
						@endif>Micro</option>
						<option id="pequeña" value="pequeña" @if ($datos->tamano == "pequeña")
							selected="selected" 
							{{-- expr --}}
						@endif>Pequeña</option>
						<option id="mediana" value="mediana" @if ($datos->tamano == "mediana")
							selected="selected" 
							{{-- expr --}}
						@endif>Mediana</option>
						<option id="grande" value="grande" @if ($datos->tamano == "grande")
							selected="selected" 
							{{-- expr --}}
						@endif>Grande</option>
					</select>
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<input type="text" class="form-control" id="web" name="web" value="{{ $datos->web }}" autofocus>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<textarea  class="form-control" rows="5" id="comentario" name="comentario">{{ $datos->comentario }}</textarea>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-xs-offset-10">
				<button type="submit" class="btn btn-success"><strong>Guardar</strong> </button>
				
			</div>
	 </form>
	</div>

	@endsection