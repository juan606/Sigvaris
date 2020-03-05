@extends('paciente.show')
@section('submodulos')
	@php
	$receta = explode(".", $expediente->receta);
	$receta = $receta[1];
	$aviso_privacidad = explode(".", $expediente->aviso_privacidad);
	$aviso_privacidad = $aviso_privacidad[1];
	$identificacion = explode(".", $expediente->identificacion);
	$identificacion = $identificacion[1];
	$inapam = explode(".", $expediente->inapam);
	$inapam = $inapam[1];
	@endphp
	<div class="card">
		<div class="card-header">
			<h4>Expediente:</h4>
		</div>
		<div class="card-body">
			<div class="card-deck">	
				@if($receta != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->receta) }}" alt="">
					</a>
					<div class="desc">Receta</div>
				</div>
				@endif
				@if($aviso_privacidad != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->aviso_privacidad) }}" alt="">
					</a>
					<div class="desc">Aviso de privacidad</div>
				</div>
				@endif
				@if($identificacion != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->identificacion) }}" alt="">
					</a>
					<div class="desc">Identificación</div>
				</div>
				@endif
				@if($inapam != "pdf")
				<div class="Portfolio m-3">
					<a href="#!">
						<img class="card-img" src="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->inapam) }}" alt="">
					</a>
					<div class="desc">inapam</div>
				</div>
				@endif
				

				<!-- ######## BOTONES PARA VER PDF  ###########-->

				<div class="row">
					@if($receta == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->receta) }}">
								ver Hoja Palco
							</a>
						</div>
					</div>
					@endif
					@if($aviso_privacidad == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->aviso_privacidad) }}">
								ver Aviso de privacidad
							</a>
						</div>
					</div>
					@endif
					@if($identificacion == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->identificacion) }}">
								ver Identificación
							</a>
						</div>
					</div>
					@endif
					@if($inapam == "pdf")
					<div class="row m-3 my-auto">
						<div class="col-md-12 text-center">
							<a class="btn btn-info" target="_blank" href="{{ url('/expedientes/'.$paciente->id.'/'.$expediente->inapam) }}">
								ver inapam
							</a>
						</div>
					</div>
					@endif
					
				</div>
			</div>
		</div>
	</div>
@endsection
