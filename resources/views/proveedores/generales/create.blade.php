@extends('layouts.infoproveedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.show',['proveedore'=>$proveedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.direccionfisica.index',['proveedore'=>$proveedore]) }}">Dirección Fisica:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.contacto.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Contacto:</a>
			</li>
			<li class="active">
				<a href="{{ route('proveedores.datosgenerales.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link active" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosbancarios.index', ['cliente' => $proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
		<br><br>
	<div class="panel panel-default">
	 	<div class="panel-heading">Datos Generales: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
		<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.datosgenerales.store',['proveedore'=>$proveedore]) }}" name="form">
			{{ csrf_field() }}
	 		<input type="hidden" name="proveedor_id" value="{{$proveedore->id}}">
	 	<div class="panel-body">
	 		<br><br>	
	 		<div class="row">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Giro:</label>
	 			<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getGiros()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
				<select type="select" name="giro_id" class="form-control" id="giro_id" required>
							<option id="sin_definir" value="">Sin Definir</option>
						@foreach ($giros as $giro)
							<option id="'{{$giro->id}}'" value="{{$giro->id}}">{{$giro->nombre}}</option>
						@endforeach
				</select>
				 </div>
	 			</div>
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 			<label class="control-label" for="nombre">Tamaño de la empresa:</label>
					<select type="select" name="tamano" class="form-control" id="tamano" required>
						<option value="">Elija el tamaño de la empresa</option>
						<option id="micro" value="micro">Micro</option>
						<option id="pequeña" value="pequeña">Pequeña</option>
						<option id="mediana" value="mediana">Mediana</option>
						<option id="grande" value="grande">Grande</option>
					</select>
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="web">Sitio web:</label>
	 				<input type="url" class="form-control" id="web" name="web" onblur="checkURL(this)" value="" autofocus>
	 			</div>

	 			<div class="form-group col-lg-4 col-md-3 col-sm-6 col-xs-12">
	 				<label class="control-label" for="comentario">Comentarios:</label>
	 				<textarea  class="form-control" rows="5" id="comentario" name="comentario"></textarea>
	 			</div>
	 		</div>
	 	</div>
	 	<div class="col-xs-offset-10">
				<button type="submit" class="btn btn-success">
				<strong>Guardar</strong> </button>
				
			</div>
	 	{{-- <div class="panel-heading jumbotron" style="color: black;">Datos Bancarios: &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</div>
	 	<div class="panel-body">
	 	  <div class="row">
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="banco"> <i class="fa fa-asterisk" aria-hidden="true"></i>Banco</label>
	 	  		<div class="input-group">
  						<span class="input-group-addon" id="basic-addon3" onclick='getBancos()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
					<select type="select" name="banco" class="form-control" id="banco">
						<option id="sin_definir" value="sin_definir">Sin Definir</option>
						@foreach($bancos as $banco)
						<option id="{{$banco->id}}" value="{{$banco->id}}">{{$banco->nombre}}</option>
						@endforeach
					</select>
				</div>
	 	  	</div>
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="cuenta"> <i class="fa fa-asterisk" aria-hidden="true"></i>Número de Cuenta</label>
	 	  		<input type="text" name="cuenta" id="cuenta" class="form-control">
	 	  	</div>
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="clabe"> <i class="fa fa-asterisk" aria-hidden="true"></i>CLABE</label>
	 	  		<input type="text" name="clabe" id="clabe" class="form-control">
	 	  	</div>
	 	  	<div class="col-sm-3">
	 	  		<label class="control-label" for="beneficiario"> <i class="fa fa-asterisk" aria-hidden="true"></i>Beneficiario</label>
	 	  		<input type="text" name="beneficiario" id="beneficiario" class="form-control">
	 	  	</div>
	 	  </div>	
	 	</div> --}}
	 	</form>
	 	</div>
	</div>

		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	<script type="text/javascript">
	
		function getBancos(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getbancos') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#banco").html(resultado);
			});
		}

		function getGiros(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getgiros') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#giro_id").html(resultado);
			});
		}

		function getContacto(){
			$.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
			});
			$.ajax({
				url: "{{ url('/getcontacto') }}",
			    type: "GET",
			    dataType: "html",
			}).done(function(resultado){
			    $("#forma_contacto_id").html(resultado);
			});
		}


	</script>
	@endsection
	<script type="text/javascript">
		// input type url agree http:// in automatic
		function checkURL (abc) {
  			var string = abc.value;
  			if (!~string.indexOf("http")) {
    			string = "http://" + string;
  			}
  			abc.value = string;
  			return abc
		}
	</script>