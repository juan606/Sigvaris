@extends('principal')
@section('content')
<div class="container">

	<div class="card">
		<form role="form" method="POST" action="{{ route('puestos.update',['puesto'=>$puesto]) }}">
			<input type="hidden" name="_method" value="PUT">
			<div class="card-header">
				<h1>Editar Puesto </h1>
			</div>
			<div class="card-body">
				{{ csrf_field() }}
				<div class="row">
					<div class="form-group col-6">
						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>
							Nombre
							del Puesto:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $puesto->nombre }}"
							required autofocus>
					</div>
					<div class="form-group col-6">
						<label class="control-label" for="etiqueta">Etiqueta:</label>
						<input type="text" class="form-control" id="etiqueta" name="etiqueta"
							value="{{ $puesto->etiqueta }}">
					</div>
				</div>
			</div>
			<div class="card-footer text-muted">
				<button type="submit" class="btn btn-success btn-lg btn-block">
					<strong>Guardar</strong>
				</button>
			</div>
	</div>

	</form>
</div>

@endsection