@extends('principal')
@section('content')

<div class="container">
	<div class="card mb-5">
		{{-- ENCABEZADO DE LA SECCIÓN --}}
		<div class="card-header">
			<div class="row">
				<div class="col-4">
					<h4>Excel:</h4>
				</div>
			</div>
		</div>
		{{-- MENSAJE EN CASO DE ERROR --}}
		@if($errors->any())
		<div class="alert alert-danger" role="alert">
			Error al subir el Archivo. Formato incorrecto
		</div>
		@endif
		{{-- CONTENEDOR PARA SUBIR ARCHIVOS DE EXCEL --}}
		<div class="card-body">
			<div class="row">
				{{-- BOTONES PARA DESCARGAR EXCEL --}}
				<div class="col-12 form-group">
					<a class="btn btn-info" href="{{ route('excel-file',['type'=>'xlsx']) }}">Descargar XSLS</a>
					<a class="btn btn-info" href="{{ route('excel-file',['type'=>'csv']) }}"><i class="fa fa-download" aria-hidden="true"></i> Descargar en CSV</a>
				</div>
			</div>
			<form role="form" method="POST" action="{{ route('import-csv-excel') }}" accept-charset="UTF-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-sm-3 form-group">
						<label for="sample_file">Seleccionar archivo a importar:</label>
					</div>
					<div class="col-sm-9 form-group">
						<input class="form-control" name="sample_file" type="file" id="sample_file" accept=".xls, .xlsx, .csv">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 text-center">
						<input class="btn btn-success" type="submit" value="Importar">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection