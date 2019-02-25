@extends('principal') 
	@section('content')
	<div class="container">
		<form role="form" method="POST" action="{{ route('faltas.update',['falta'=>$falta]) }}">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="PUT">
			<div class="panel panel-default">
				<div class="panel-heading">
					Editar Falta&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos
				</div>
				<div class="panel-body">
					<div class="form-group col-6">
						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>  Nombre de Falta:</label>
	  					<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $falta->nombre }}" required autofocus>
					</div>
					<div class="form-group col-6">
						<label class="control-label" for="etiqueta">Etiqueta:</label>
	  					<input type="text" class="form-control" id="etiqueta" name="etiqueta" value="{{ $falta->etiqueta }}">
					</div>
				</div>
				<div class="panel-body">
					<button type="submit" class="btn btn-success">
				<strong>Guardar</strong>	</button>
					
				</div>
			</div>
		</form>
	</div>
	@endsection  