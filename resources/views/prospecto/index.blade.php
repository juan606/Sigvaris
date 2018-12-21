@extends('principal')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-4">
				<h4>Prospectos Médicos:</h4>
			</div>
			<div class="col-4 text-center">
				<a href="{{ route('prospectos.create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i><strong> Agregar Prospecto</strong>
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
					<tr class="info">
						<th>Identificador</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Mail</th>
						<th>Especialidad</th>
					</tr>
					@foreach($prospectos as $prospecto)
						<tr>
							<td>{{ $prospecto->id }}</td>
							<td>{{ $prospecto->nombre }}</td>
							<td>{{ $prospecto->apellidopaterno }}</td>
							<td>{{ $prospecto->mail }}</td>
							<td>{{ $prospecto->especialidad }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

<div class="container p-5">
	<table class="table">
</div>

@endsection