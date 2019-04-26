@extends('principal')
@section('content')
<div class="container">

	<div class="card">
		<form role="form" method="POST" action="{{ route('bajas.update',['baja'=>$baja]) }}">
			<input type="hidden" name="_method" value="PUT">
			<div class="card-header">
				<h1>Editar baja </h1>
			</div>
			<div class="card-body">
				{{ csrf_field() }}
				@method('PUT')
				<div class="row">
					<div class="form-group col-6">
						<label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>
							Nombre
							de la baja:</label>
						<input type="text" class="form-control" id="nombre" name="nombre" value="{{ $baja->nombre }}"
							required autofocus>
					</div>
					<div class="form-group col-6">
						<label class="control-label" for="abreviatura">Abreviatura:</label>
						<input type="text" class="form-control" id="abreviatura" name="abreviatura"
							value="{{ $baja->abreviatura }}" required>
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