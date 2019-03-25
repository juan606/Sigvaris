@extends('principal')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-6">
					<h1>Estados</h1>
				</div>
				<div class="col-6">
					<a class="btn btn-success" href="{{ route('estados.create') }}">
						<strong><i class="fa fa-plus float-right"></i></strong>
					</a>
				</div>
			</div>


		</div>
		<div class="card-body">
			@if ($estados->count() == 0)
			<label>No hay estados añadidos</label>
			@else
			<table id="precargas" class="table table-striped table-bordered table-hover">
				<thead>
					<tr class="info">
						<th>ID</th>
						<th>Estado</th>
						<th>Operación</th>
					</tr>
				</thead>
				@foreach($estados as $estado)
				<tr>
					<td>
						{{ $estado->id }}
					</td>
					<td>{{ $estado->nombre }}</td>
					<td>
						<div class="row">
							<div class="col-2">
								<a class="btn btn-warning" href="{{ route('estados.edit',['estado'=>$estado]) }}">
									<strong>
										<i class="far fa-edit"></i>
									</strong>
								</a>
							</div>
							<div class="col-2">
								<form role="form" method="POST" action="{{ route('estados.destroy',['estado'=>$estado]) }}">
									{{ csrf_field() }}
									<input type="hidden" name="_method" value="DELETE">
									<button type="submit" class="btn btn-danger" role="button">
										<strong>
											<i class="fa fa-trash"></i>
										</strong>
									</button>
								</form>
							</div>
						</div>

				</tr>
				</td>
				</tbody>
				@endforeach
			</table>
			@endif
		</div>
	</div>

</div>
<script>
	$(document).ready(function () {
		$('#precargas').DataTable({
			"language": {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible en esta tabla",
				"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			}
		});
	});
</script>

@endsection