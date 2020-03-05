@extends('paciente.show')
@section('submodulos')
<!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="{{ asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <link href="{{ asset('themes/explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/plugins/piexif.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/sortable.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/locales/fr.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/locales/es.js')}}" type="text/javascript"></script>
	<div class="card">
		<div class="card-header">
			<h4>Expediente:</h4>
		</div>
		<div class="card-body">
			<form role="form" method="POST" action="{{ route('pacientes.expediente.store',['paciente'=>$paciente]) }}" enctype="multipart/form-data">
				@csrf
				<div class="row form-group">
					<div class="col-3 col-sm-12 col-md-3 col-xl-3 form-group text-center">
		    			<label class="control-label" for="">Receta</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="receta" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-3 col-xl-3 form-group text-center">
		    			<label class="control-label" for="">Aviso de Privacidad</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="aviso_privacidad" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-3 col-xl-3 form-group text-center">
		    			<label class="control-label" for="">Identificación</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="identificacion" data-preview-file-type="text" required>
		    		</div>
		    		<div class="col-3 col-sm-12 col-md-3 col-xl-3 form-group text-center">
		    			<label class="control-label" for="">Inapam</label>
		    			<input id="input-id" type="file" accept=".pdf, .jpg, .jpeg, .png" class="file" name="inapam" data-preview-file-type="text" required>
		    		</div>

		    	</div>
		    	
				<div class="row form-group">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-success">
						 	<strong>Guardar</strong>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection