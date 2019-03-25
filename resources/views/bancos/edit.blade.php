@extends('principal')
@section('content')
<div class="container">

	<div class="card">
		<form role="form" method="POST" action="{{ route('bancos.update',['banco'=>$banco]) }}">
			<input type="hidden" name="_method" value="PUT">
			<div class="card-header">
				<h1>Editar Banco </h1>
			</div>
			<div class="card-body">
				{{ csrf_field() }}
				<div class="row">
					<div class="form-group col-6">
						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>
							Nombre
							del Banco:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $banco->nombre }}"
							required autofocus>
					</div>
					<div class="form-group col-6">
						<label class="control-label" for="etiqueta">Etiqueta:</label>
						<input type="text" class="form-control" id="etiqueta" name="etiqueta" required
							value="{{ $banco->etiqueta }}">
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