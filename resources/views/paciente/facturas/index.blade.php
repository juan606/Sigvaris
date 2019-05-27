@extends('principal')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-4">
				<h4>Facturas</h4>
			</div>
			<div class="col-4 text-center">
				<a href="{{ route('facturas.create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i><strong> Agregar Factura</strong>
				</a>
			</div>
			<div class="search-container">
			    <form action="/pacientes">
			      <input type="text" placeholder="Search.." name="search">
			      <button type="submit"><i class="fa fa-search"></i></button>
			    </form>
			  </div>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px" id="tablaPacientes">
					<tr class="info">
						<th>#</th>
						<th>Paciente al que se facturo</th>
						<th>Nombre al que se facturo</th>
						<th>Operación</th>
					</tr>
					@isset ($facturas)
						@foreach($facturas as $factura)
							<tr>
								<td>{{ $factura->id }}</td>
								<td>{{ $factura->venta->paciente->nombre }} {{ $factura->venta->paciente->paterno }} {{ $factura->venta->paciente->materno }}</td>
								<td>{{ $factura->nombre }}</td>
								<td>


									<div class="row">
	                                    <div class="col-auto pr-2">
	                                        <a href="{{ route('facturas.show',['id'=>$factura->id]) }}" class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
	                                    </div>
	                                    
	                                </div>

									</td>
							</tr>
						@endforeach    
					@endisset
					
				</table>
				{{$facturas->links()}}
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#tablaPacientes').DataTable({
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