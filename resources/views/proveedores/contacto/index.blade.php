@extends('layouts.infoproveedor')
	@section('cliente')
		<ul role="tablist" class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.show',['proveedore'=>$proveedore]) }}">Dirección Fìsica:</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('proveedores.direccionfisica.index',['proveedore'=>$proveedore]) }}">Dirección Fisica:</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('proveedores.contacto.index',['proveedore'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link active" id="ui-id-3">Contacto:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosgenerales.index',['cliente'=>$proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-3">Datos Generales:</a>
			</li>
			<li role="presentation" tabindex="-1" class="nav-item" aria-controls="tabs-3" aria-labelledby="ui-id-4" aria-selected="false" aria-expanded="false">
				<a href="{{ route('proveedores.datosbancarios.index', ['cliente' => $proveedore]) }}" role="presentation" tabindex="-1" class="nav-link" id="ui-id-4">Datos Bancarios:</a>
			</li>
		</ul>
	<div class="panel panel-default">
		<div class="panel-heading">
			Contactos:
		</div>
		<div class="panel-body">
			<div class="form-group col-lg-offset-11">
				<a type="button" class="btn btn-success" href="{{ route('proveedores.contacto.create',['proveedore'=>$proveedore]) }}">
			<strong>Agregar</strong>	</a>
			</div>
		@if ($contactos->count() == 0)
			<h3>Aún no tienes contactos</h3>
		@endif
		@if ($contactos->count() !=0)
			
		<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
				<thead>
					<tr class="info">
						<th>Nombre del contacto</th>
						<th>Telefono Directo</th>
						<th>Celular</th>
						<th>Correo Electronico</th>
						<th>Operaciones</th>
					</tr>
				</thead>
				@foreach ($contactos as $contacto)
					<tr class="active">
						<td>{{ $contacto->nombre }} {{$contacto->apater}} {{$contacto->amater}}</td>
						<td>{{$contacto->telefonodir}}</td>
						<td>{{$contacto->celular1}}</td>
						<td>{{$contacto->email1}}</td>
						<td>
							<a class="btn btn-success btn-sm" href="{{ route('proveedores.contacto.show',['proveedore'=>$proveedore,'contacto'=>$contacto]) }}">
						<strong>Ver</strong>	</a>
							<a class="btn btn-info btn-sm" href="{{ route('proveedores.contacto.edit',['proveedore'=>$proveedore,'contacto'=>$contacto]) }}">
						<strong>Editar</strong>	</a>
					</tr>
						</td>
					</tbody>
				@endforeach
			</table>
		@endif
		
		</div>
	</div>
		@endsection