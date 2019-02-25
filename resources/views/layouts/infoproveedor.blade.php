@extends('principal')
	@section('content')
		<div class="container" id="tab">
			<div class="card">
				<div class="card-header">
					
					<div class="row">
						<div class="col-6">
							<div class="panel-heading"><h4>Datos del proveedor:</h4></div>
						</div>
						<div class="col-6">
							<a class="btn btn-info" href="{{ route('proveedores.create')}}">
								<strong>
									Agregar Nuevo Proveedor
								</strong>
							</a>
						</div>
					</div>
							
				</div>
				<div class="card-body">
					<div role="application" class="panel panel-group" >
						<div class="panel-default">
							
							<div class="panel-body">
								<div class="row">
									<div class="form-group col-3">
										<label class="control-label" for="tipopersona">Tipo de Persona:</label>
										<dd>{{ $proveedore->tipopersona }}</dd>
									</div>
									<div class="form-group col-3">
										<label class="control-label" for="alias">Alias:</label>
										<dd>{{ $proveedore->alias }}</dd>
									</div>
									<div class="form-group col-3">
										<label class="control-label" for="rfc">RFC:</label>
										<dd>{{ $proveedore->rfc }}</dd>
									</div>
									<div class="form-group col-3">
										<label class="control-label" for="vendedor">Vendedor:</label>
										<dd>{{ $proveedore->vendedor }}</dd>
									</div>
								</div>
							@if ($proveedore->tipopersona == "Fisica")
									{{-- true expr --}}
								<div class="row" id="perfisica">
									<div class="form-group col-3">
										<label class="control-label" for="nombre">Nombre(s):</label>
										<dd>{{ $proveedore->nombre }}</dd>
									</div>
									<div class="form-group col-3">
										<label class="control-label" for="apellidopaterno">Apellido Paterno:</label>
										<dd>{{ $proveedore->apellidopaterno }}</dd>
									</div>
									<div class="form-group col-3">
										<label class="control-label" for="apellidomaterno">Apellido Materno:</label>
										<dd>{{ $proveedore->apellidomaterno }}</dd>
									</div>
								</div>
							@else
									{{-- false expr --}}
								<div class="row" id="permoral">
									<div class="form-group col-3">

										<label class="control-label" for="razonsocial">Razon Social:</label>
										<dd>{{ $proveedore->razonsocial }}</dd>
									</div>
								</div>
							@endif
							</div>
						</div>

						@yield('cliente')
					</div>
				</div>
			</div>
			
		</div>
		<script src="{{ asset('js/sweetalert.js') }}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
	@endsection