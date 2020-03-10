@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="nav-link">Generales:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="nav-link">Laborales:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.certificaciones.index',['empleado'=>$empleado]) }}" class="nav-link ">Estudios:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="nav-link">Emergencias:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="nav-link">Vacaciones:</a></li>
			
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltasDH.index',['empleado'=>$empleado]) }}" class="nav-link">Faltas:</a></li>
			
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.permisos.index',['empleado'=>$empleado]) }}" class="nav-link ">Permisos:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="nav-link active">Administrativo:</a></li>
		</ul>
	</div>
	<div class="card">
		<div class="card-header"><h5>Administrativo:
		&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-asterisk" aria-hidden="true"></i>Campos Requeridos</h5></div>
		<div class="card-body">
			<form role="for" method="POST" action="{{ route('empleados.faltas.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="empleado_id" value="{{$empleado->id}}">

				<div class="row">
					{{-- Input fecha --}}
					<div class="col-12 col-md-4">
						<div class="form-group">
							<label class="control-label" for="fecha" id="lbl_fecha"><i class="fa fa-asterisk" aria-hidden="true"></i>Fecha:</label>
							<input type="date" class="form-control" id="id_fecha" name="fecha">
						</div>
					</div>
					{{-- Input tipo de falta --}}
					<div class="col-12 col-md-4">
							<div class="form-group col-xs-3">
									<label class="control-label" for="tipofalta" id="lbl_falta"><i class="fa fa-asterisk" aria-hidden="true"></i>Tipo de falta:</label>
									 <div class="input-group">
										 <span class="input-group-addon" id="basic-addon3" onclick='getFaltas()'><i class="fa fa-refresh" aria-hidden="true"></i></span>
											<select type="select" name="tipofalta" class="form-control" id="tipofalta" required>
												<option id="Sin Definir" value="" selected="selected">Sin Definir</option>
												@foreach($faltasp as $falta)
												<option id="{{$falta->id}}" value="{{$falta->nombre}}">{{$falta->nombre}}</option>
												@endforeach
										  </select>
									</div>
								</div>
					</div>
					{{-- Input quien lo reporto --}}
					<div class="col-12 col-md-4">
							<div class="form-group col-xs-4">
									<label class="control-label" for="reporto"> <i class="fa fa-asterisk" aria-hidden="true"></i>Quién lo reportó:</label>
									<input type="text" class="form-control" id="reporto" name="reporto" required>
							  </div>
					</div>
					{{-- Input comentario --}}
					<div class="col-12 col-md-6">
							<div class="form-group">
									<label class="control-label" for="comentarios" id="lbl_comen">Comentarios:</label>
									<textarea class="form-control" id="id_coment" name="comentarios" maxlength="500"></textarea>
								</div>
					</div>
					{{-- Input problema --}}
					<div class="col-12 col-md-6">
							<div class="form-group col-xs-3">
									<label class="control-label" for="problema" id="lbl_problema"><i class="fa fa-asterisk" aria-hidden="true"></i>Problema:</label>
									<textarea class="form-control" id="id_problema" name="problema" maxlength="500"></textarea>
								</div>
					</div>
				</div>
	  			<button type="submit" class="btn btn-success">Guardar</button>
				
			</form>
			<br>
			<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
						<thead>
							<tr class="info">
								<th>Fecha:</th> 
								<th>Tipo:</th>
								<th>Quién Reporto:</th>
								<th>Problema:</th>
								<th>Comentarios:</th>
							</tr>
						</thead>
						@foreach ($faltas as $falta)
							{{-- expr --}}
							<tr class="active">
								<td>{{$falta->fecha}}</td>
								<td>{{$falta->tipofalta}}</td>
								<td>{{$falta->reporto}}</td>
								<td>{{$falta->problema}}</td>
								<td>{{$falta->comentarios}}</td>
							</tr>
						@endforeach
			</table>
			</div>
				<script type="text/javascript">
		function getFaltas()
		{
		  $.ajaxSetup({
		    headers: {
		      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		  });
		  $.ajax({
		    url: "{{ url('/getfaltas') }}",
		    type: "GET",
		    dataType: "html",
		  }).done(function(resultado){
		    $("#tipofalta").html(resultado);
		  });
		}
				</script>
@endsection