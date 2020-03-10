@extends('principal')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-6">
				<h4>Proveedores:</h4>
			</div>
		   <div class="col-6 text-center">
		   		<a class="btn btn-info" href="{{ route('proveedores.create') }}">
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
					@foreach($proveedores as $proveedore)
					<tr class="active" title="Has Click Aquì para Ver" style="cursor: pointer" href="#{{ $proveedore->id }}">
						<td>{{ $proveedore->id }}</td>
						<td>
							@if($proveedore->tipopersona == "Fisica")
							{{ $proveedore->nombre }} {{ $proveedore->apellidopaterno }} {{ $proveedore->apellidomaterno }}
							@else
							{{ $proveedore->razonsocial }}
							@endif
						</td>
						<td>{{ $proveedore->tipopersona }}</td>
						<td>{{ $proveedore->alias }}</td>
						<td>{{ strtoupper($proveedore->rfc) }}</td>
						<td>
							<a class="btn btn-primary btn-sm" href="{{ route('proveedores.show', ['proveedor'=>$proveedore]) }}">
								<i class="fa fa-eye"></i> Ver
							</a>
							<a class="btn btn-warning btn-sm" href="{{ route('proveedores.edit', ['proveedor'=>$proveedore]) }}">
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