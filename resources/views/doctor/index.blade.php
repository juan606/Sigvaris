@extends('principal')
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-4">
				<h4>Doctores</h4>
			</div>
			<div class="col-4 text-center">
				<a href="{{ route('doctores.create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i><strong> Agregar Doctor</strong>
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
						<th>Nobre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Nacimiento</th>
						<th>Operación</th>
					</tr>
					@foreach($doctores as $doctor)
						<tr>
							<td>{{ $doctor->id }}</td>
							<td>{{ $doctor->nombre }}</td>
							<td>{{ $doctor->apellidopaterno }}</td>
							<td>{{ $doctor->apellidomaterno }}</td>
							<td>{{ $doctor->nacimiento }}</td>
							<td>


								<div class="row">
                                    <div class="col-auto pr-2">
                                        <a href="{{route('doctores.show', ['doctor'=>$doctor])}}" class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                        <a href="{{route('doctores.edit', ['doctor'=>$doctor])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                        
                                    </div>
                                    <div class="col pl-0">
                                        <form role="form" name="doctorborrar" id="form-doctor" method="POST" action="{{ route('doctores.destroy', ['doctor'=>$doctor]) }}" name="form">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                        </form>
                                    </div>
                                </div>

								</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

@endsection