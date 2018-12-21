@extends('principal')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-4">
				<h4>Proveedores:</h4>
			</div>
		   <div class="col-4 text-center">
		   		<a class="btn btn-success" href="{{ route('proveedores.create') }}">
		        	<i class="fa fa-plus"></i><strong> Agregar Proveedor</strong>
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
						<th>Nombre/Razón Social</th>
						<th>Tipo de persona</th>
						<th>Alias</th>
						<th>RFC</th>
						<th>Acción</th>
					</tr>
					@foreach($provedores as $provedore)
					<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{ $provedore->id }}">
						<td>{{ $provedore->id }}</td>
						<td>
							@if($provedore->tipopersona == "Fisica")
							{{ $provedore->nombre }} {{ $provedore->apellidopaterno }} {{ $provedore->apellidomaterno }}
							@else
							{{ $provedore->razonsocial }}
							@endif
						</td>
						<td>{{ $provedore->tipopersona }}</td>
						<td>{{ $provedore->alias }}</td>
						<td>{{ strtoupper($provedore->rfc) }}</td>
						<td>
							<a class="btn btn-primary btn-sm" href="{{ route('proveedores.show', ['provedor'=>$provedore]) }}">
								<i class="fa fa-eye"></i> Ver
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('proveedores.edit', ['provedor'=>$provedore]) }}">
								<i class="fa fa-pencil" aria-hidden="true"></i> Editar
							</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

@endsection