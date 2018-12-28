@extends('principal')
@section('content')

<div class="card mb-5">
	<div class="card-header">
		<div class="row">
			<div class="col-4">
				<h4>Datos del Proveedor:</h4>
			</div>
			<div class="col-4 text-center">
				<a class="btn btn-primary" href="{{ route('proveedores.index') }}">
					<i class="fa fa-bars"></i><strong> Lista de Proveedores</strong>
				</a>
			</div>
		</div>
	</div>
	<form method="POST" action="{{ route('proveedores.store') }}">
		{{ csrf_field() }}
		<div class="card-body">
			<div class="row">
				<div class="form-group col-4">
					<label class="control-label" for="tipopersona">Tipo de Persona:</label>
					<select required type="select" name="tipopersona" class="form-control" id="tipopersona" onchange="persona(this)">
						<option value="">Seleccionar</option>
						<option id="Fisica" value="Fisica">Fisica</option>
						<option id="Moral" value="Moral">Moral</option>
					</select>
				</div>
				<div class="form-group col-4">
					<label class="control-label" for="alias">✱Alias:</label>
					<input type="text" class="form-control" id="alias" name="alias" required autofocus>
				</div>
				<div class="form-group col-4">
					<label class="control-label" for="rfc">✱RFC:</label>
					<input type="text" class="form-control" id="varrfc" name="rfc" required minlength="12" maxlength="13" pattern="^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}" placeholder="Ingrese 13 caracteres" title="Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres">
				</div>
			</div>
			<div id="perfisica" class="row">
				<div class="form-group col-4">
					<label class="control-label" for="nombre">✱Nombre:</label>
					<input type="text" class="form-control" id="idnombre" name="nombre" required>
				</div>
				<div class="form-group col-4">
					<label class="control-label" for="apellidopaterno">✱Apellido Paterno:</label>
					<input type="text" class="form-control" id="apellidopaterno" name="apellidopaterno" required>
				</div>
				<div class="form-group col-4">
					<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
					<input type="text" class="form-control" id="apellidomaterno" name="apellidomaterno">
				</div>
			</div>
			<div id="permoral" class="row" style="display: none;">
				<div class="form-group col-4">
					<label class="control-label" for="razonsocial">Razon Social:</label>
					<input type="text" class="form-control" id="razonsocial" name="razonsocial">
				</div>
			</div>
		</div>
		<div class="card-body"></div>
	    <div class="card-footer">
	        <div class="row">
	            <div class="col-4 offset-4 text-center">
	                <button type="submit" class="btn btn-success">
	                    <i class="fa fa-check"></i> Guardar
	                </button>
	            </div>
	            <div class="col-sm-4 text-right text-danger">
	                ✱Campos Requeridos.
	            </div>
	        </div>
	    </div>
	</form>
</div>

<div class="container p-4" id="tab">
	<form role="form" id="form-cliente" method="POST" action="{{ route('proveedores.store') }}" name="form">
		{{ csrf_field() }}
		<div role="application" class="panel panel-group" >
			<div class="panel-default">
				<div class="panel-heading"><h4>Datos del Proveedor:
					</h4>
				</div>
				<div class="panel-body">
					<div class="col-xs-4 col-xs-offset-8">
						<button type="submit" 
						class="btn btn-success">
						<strong>Guardar</strong>
					</button>
					&nbsp;&nbsp;&nbsp;&nbsp;

				</div>	<br><br><br>

			</div>
		</div>
		
		<ul class="nav nav-pills">
			<li class="nav-item"><a class="nav-link active" href="#/">Dirección Fisica:</a></li>
			<li class="nav-item"><a class="nav-link disabled" href="#/">Dirección Fiscal:</a></li>
			<li class="nav-item"><a class="nav-link disabled" href="#/">Contacto:</a></li>
			<li class="nav-item"><a class="nav-link disabled" href="#/">Datos Generales:</a></li>
			<li class="nav-item"><a class="nav-link disabled" href="#/">Datos Bancarios:</a></li>
		</ul>

		<div class="panel panel-default">
			<div class="panel-heading">Dirección Fisica:
				&nbsp;&nbsp;&nbsp;&nbsp; Campos Requeridos
			</div>
			<div class="panel-body">
				<div class="col-xs-2 col-xs-offset-10">


				</div>	
				<div class="row">
					<div class="form-group col-3">
						<label class="control-label" for="calle">Calle:</label>
						<input type="text" class="form-control" id="calle" name="calle" required>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="numext">Numero exterior:</label>
						<input type="text" class="form-control" id="numext" name="numext" required>
					</div>	
					<div class="form-group col-3">
						<label class="control-label" for="numinter">Numero interior:</label>
						<input type="text" class="form-control" id="numinter" name="numinter">
					</div>

				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-3">
						<label class="control-label" for="colonia">Colonia:</label>
						<input type="text" class="form-control" id="colonia" name="colonia" required>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="municipio">Delegación o Municipio:</label>
						<input type="text" class="form-control" id="municipio" name="municipio" required>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="ciudad">Ciudad:</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad" required>
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="estado">Estado:</label>
						<input type="text" class="form-control" id="estado" name="estado" required>
					</div>
				</div>
				<div class="row" id="perfisica">
					<div class="form-group col-3">
						<label class="control-label" for="calle1">Entre calle:</label>
						<input type="text" class="form-control" id="calle1" name="calle1">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="calle2">Y calle:</label>
						<input type="text" class="form-control" id="calle2" name="calle2">
					</div>
					<div class="form-group col-3">
						<label class="control-label" for="referencia">Referencia:</label>
						<input type="text" class="form-control" id="referencia" name="referencia">
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
<script>
// $(document).ready(function(){
// 	$('#tipopersona').change(function(){
// 		if($(this).val() == 'Fisica'){

// 		}
// 		if($(this).val() == 'Moral'){

// 		}
// 	});
// });
function persona(elemento) {
	$("#idnombre").prop('required', false);
	$("#apellidopaterno").prop('required', false);
	$("#razonsocial").prop('required', false);
	$("#idnombre").val('');
	$("#apellidopaterno").val('');
	$("#apellidomaterno").val('');
	$("#razonsocial").val('');
	if(elemento.value == "Fisica") {
		$('#perfisica').show();
		$('#permoral').hide();
		document.getElementById('varrfc').pattern = "^[A-Za-z]{4}[0-9]{6}[A-Za-z0-9]{3}";
		document.getElementById('varrfc').placeholder = "Ingrese 13 caracteres";
		document.getElementById('varrfc').title = "Siga el formato 4 letras seguidas por 6 digitos y 3 caracteres";
		$("#idnombre").prop('required', true);
		$("#apellidopaterno").prop('required', true);
	} else if(elemento.value == "Moral") {
		
		$('#perfisica').hide();
		$('#permoral').show();
		document.getElementById('varrfc').pattern = "^[A-Za-z]{3}[0-9]{6}[A-Za-z0-9]{3}";
		document.getElementById('varrfc').placeholder = "Ingrese 12 caracteres";
		document.getElementById('varrfc').title = "Siga el formato 3 letras seguidas por 6 digitos y 3 caracteres";
		$("#razonsocial").prop('required', true);
		$("#idnombre").prop('required', false);
		$("#apellidopaterno").prop('required', false);
	}
}

</script>
@endsection

