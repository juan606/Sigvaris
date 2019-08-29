@extends('layouts.infoempleado')
@section('infoempleado')
	{{-- expr --}}
	<div>
		<ul class="nav nav-pills nav-justified">
			<li role="presentation" class="nav-item"><a href="{{ route('empleados.show',['empleado'=>$empleado]) }}"  class="nav-link">Generales:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.datoslaborales.index',['empleado'=>$empleado]) }}" class="nav-link">Laborales:</a></li>

			

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.emergencias.index',['empleado'=>$empleado]) }}" class="nav-link active">Emergencias:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.vacaciones.index',['empleado'=>$empleado]) }}" class="nav-link">Vacaciones:</a></li>

			<li role="presentation" class="nav-item"><a href="{{ route('empleados.faltas.index',['empleado'=>$empleado]) }}" class="nav-link">Administrativo:</a></li>
		</ul>
	</div>
	<div class="panel-default">
		<div class="panel-heading"><h5>Emergencias:</h5></div>
		<div class="panel-body">
			@if ($edit == true)
				{{-- true expr --}}
			<form role="form" method="POST" action="{{ route('empleados.emergencias.update',['emergencia'=>$emergencias, 'empleado'=>$empleado]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="PUT">
			@else
				{{-- false expr --}}
			<form role="form" method="POST" action="{{ route('empleados.emergencias.store',['empleado'=>$empleado]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
				
			@endif
				<div class="row">
					<div class="form-group col-xs-4">
						<label class="control-label" for="sangre" id="sangre">Tipo de Sangre:</label>
						<select type="select" name="sangre" class="form-control" id="sangre">
							<option id="1" value="O-" @if ($emergencias->sangre == "O-")
								{{-- expr --}}
								selected="selected" 
							@endif>O-</option>
							<option id="2" value="O+" @if ($emergencias->sangre == "O+")
								{{-- expr --}}
								selected="selected" 
							@endif>O+</option>
	    					<option id="3" value="AB+" @if ($emergencias->sangre == "AB+")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>AB+</option>
	    					<option id="4" value="AB-" @if ($emergencias->sangre == "AB-")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>AB-</option>
							<option id="5" value="A+" @if ($emergencias->sangre == "A+")
								{{-- expr --}}
								selected="selected" 
							@endif>A+</option>
	    					<option id="6" value="A-" @if ($emergencias->sangre == "A-")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>A-</option>
	    					<option id="7" value="B-" @if ($emergencias->sangre == "B-")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>B-</option>
	    					<option id="8" value="B+" @if ($emergencias->sangre == "B+")
	    						{{-- expr --}}
	    						selected="selected" 
	    					@endif>B+</option>
						</select>
					</div>
				</div>
				<div class="row">
					{{-- Input enfermedades --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="enfermedades" id="lbl_enf">Enfermedades:</label>
									<textarea class="form-control" id="enfermedades" name="enfermedades" maxlength="500" >{{ $emergencias->enfermedades }}</textarea>
								</div>
					</div>
					{{-- Input alergias --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="alergias" id="lbl_alerg">Alergias:</label>
									<textarea class="form-control" id="alergias" name="alergias" maxlength="500">{{ $emergencias->alergias }}</textarea>
								</div>
					</div>
					{{-- Input operaciones --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="operaciones" id="lbl_oper">Operaciones:</label>
									<textarea class="form-control" id="operaciones" name="operaciones" maxlength="500">{{ $emergencias->operaciones }}</textarea>
								</div>
					</div>
					
					
					
				</div>
				<div class="panel-heading"><h5>En caso de emergencia llamar a:</h5></div>
				{{-- <div class="col-xs-12 col-md-3"> --}}

				<div class="row">
					{{-- Input nombre --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="nombrecontac1">Nombre:</label>
									<input type="text" class="form-control" id="nombrecontac1" name="nombrecontac1" value="{{ $emergencias->nombrecontac1 }}">
								  </div>
					</div>
					{{-- Input parentezco --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="parentescocontac1">Parentesco:</label>
									<input type="text" class="form-control" id="parentescocontac1" name="parentescocontac1" value="{{ $emergencias->parentescocontac1 }}">
								  </div>
					</div>
					{{-- Input telefono --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="telefonocontac1">Télefono:</label>
									<input type="text" class="form-control" id="telefonocontac1" name="telefonocontac1" value="{{ $emergencias->telefonocontac1 }}">
								  </div>
					</div>
					{{-- Input celular --}}
					<div class="col-12 col-md-4">
						<div class="form-group">
								<label class="control-label" for="movilcontac1">Telefono celular:</label>
								<input type="text" class="form-control" id="movilcontac1" name="movilcontac1" value="{{ $emergencias->movilcontac1 }}">
								</div>
					</div>
					
					{{-- Input nombre --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="nombrecontac2">Nombre:</label>
									<input type="text" class="form-control" id="nombrecontac2" name="nombrecontac2" value="{{ $emergencias->nombrecontac2 }}">
								  </div>
					</div>
					
					{{-- Input parentezco --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="parentescocontac2">Parentesco:</label>
									<input type="text" class="form-control" id="parentescocontac2" name="parentescocontac2" value="{{ $emergencias->parentescocontac2 }}">
								  </div>
					</div>
					{{-- Input telefono --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="telefonocontac2">Télefono:</label>
									<input type="text" class="form-control" id="telefonocontac2" name="telefonocontac2" value="{{ $emergencias->telefonocontac2 }}">
								  </div>
					</div>
					{{-- Input celular --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="movilcontac2">Telefono celular:</label>
									<input type="text" class="form-control" id="movilcontac2" name="movilcontac2" value="{{ $emergencias->movilcontac2 }}">
								  </div>
					</div>
					{{-- Input nombre--}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="nombrecontac3">Nombre:</label>
									<input type="text" class="form-control" id="nombrecontac3" name="nombrecontac3" value="{{ $emergencias->nombrecontac3 }}">
								  </div>
					</div>
					{{-- input parentezco --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="parentescocontac3">Parentesco:</label>
									<input type="text" class="form-control" id="parentescocontac3" name="parentescocontac3" value="{{ $emergencias->parentescocontac3 }}">
								  </div>
					</div>
					{{-- Input telefeno --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="telefonocontac3">Télefono:</label>
									<input type="text" class="form-control" id="telefonocontac3" name="telefonocontac3" value="{{ $emergencias->telefonocontac3 }}">
								  </div>
					</div>
					{{-- Input celular --}}
					<div class="col-12 col-md-4">
							<div class="form-group">
									<label class="control-label" for="movilcontac3">Telefono celular:</label>
									<input type="text" class="form-control" id="movilcontac3" name="movilcontac3" value="{{ $emergencias->movilcontac3 }}">
								  </div>
					</div>
				</div>

					
  					
  				{{-- </div> --}}
  				{{-- <div class="col-xs-12 col-md-3"> --}}
					
  					
  				{{-- </div> --}}
  				{{-- <div class="col-xs-12 col-md-3"> --}}
					
  					
  				{{-- </div> --}}
  				{{-- <div class="col-xs-12 col-md-3"> --}}
					
  					
  				{{-- </div> --}}
  				{{-- <div class="col-xs-12 col-md-3"> --}}
					
  					
  				{{-- </div> --}}
  				{{-- <div class="col-xs-12 col-md-3"> --}}
					
  					
  				{{-- </div> --}}
  				<button type="submit" class="btn btn-success">Guardar</button>
				
			</form>
		</div>
	</div>
@endsection