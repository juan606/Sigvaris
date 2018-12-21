@extends('principal')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-4">
				<h4>Doctores</h4>
			</div>
			<div class="col-4 text-center">
				<a href="{{ route('doctores.create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i><strong> Agregar Doctor</strong>
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
						<th>Nobre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Especialidad</th>
					</tr>
					@foreach($doctores as $doctor)
						<tr>
							<td>{{ $doctor->id }}</td>
							<td>{{ $doctor->nombre }}</td>
							<td>{{ $doctor->apellidopaterno }}</td>
							<td>{{ $doctor->apellidomaterno }}</td>
							<td>{{ $doctor->especialidad }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

@endsection