@extends('principal')
@section('content')

<script type="text/javascript">

	function confirmacion(doctor_id){
		swal("¿Esta seguro de eliminar este doctor?", {
  buttons: {
  	Si: true,
    cancel: "No",    
  },
})
.then((value) => {
  switch (value) {
 
    case "Si":
      swal({  
  text: "El doctor se eliminara permanentemente",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Se ha dado de baja al doctor", {
      icon: "success",
    });
  	$("#form-doctor"+doctor_id).submit()
  } else {
    swal("Se ha cancelado la baja");
  }
});
      break;     
    
  }
});
	}
// 	function confirmacion(doctor_id){
// 		swal({
//   title: "¿Eliminar doctor?",
//   text: "¿Estas seguro de eliminar este doctor?",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   	$("#form-doctor"+doctor_id).submit()
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });
// 	}
</script>

<div class="card">
	<div class="card-header">
		<form action="doctores">
		<div class="row">
			<div class="col-4">
				<h4>Doctores</h4>
			</div>
			<div class="col-4 text-center">
				<a href="{{ route('doctores.create') }}" class="btn btn-success">
					<i class="fa fa-plus"></i><strong> Agregar Doctor</strong>
				</a>				
			</div>
			<div class="col-4">
				<div class="input-group mb-3">
			    	<input type="text" name="search" class="form-control" placeholder="search" aria-label="Recipient's username" aria-describedby="basic-addon2">
			    	<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</div>
			</div>	
		</div>
		</form>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px">
					<tr class="info">
						<th>Identificador</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Nacimiento</th>
						<th>Estatus</th>
						<th>Operación</th>
					</tr>
					@foreach($doctores as $doctor)
						<tr>
							<td>{{ $doctor->id }}</td>
							<td>{{ $doctor->nombre }}</td>
							<td>{{ $doctor->apellidopaterno }}</td>
							<td>{{ $doctor->apellidomaterno }}</td>
							<td>{{ $doctor->nacimiento }}</td>
							<td><script type="text/javascript">
								if({{ $doctor->activo }})
									document.write("Activo");
								else
									document.write("Inactivo");
							</script>
								{{-- {{ $doctor->activo }} --}}
							</td>
							<td>


								<div class="row">
                                    <div class="col-auto pr-2">
                                        <a href="{{route('doctores.show', ['doctor'=>$doctor])}}" class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                        <a href="{{route('doctores.edit', ['doctor'=>$doctor])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                        
                                    </div>
                                    
                                    <div class="col pl-0">
                                        <form role="form" name="doctorborrar" id="form-doctor{{ $doctor->id }}" method="post" action="{{ url('doctores/'.$doctor->id.'/Borrar') }}" name="form">
                                        @method('DELETE')
    									@csrf
                                            <button class="btn btn-danger {{$doctor->activo?"":"d-none"}}" type="button" id="butonBorrar" onclick="confirmacion({{$doctor->id}})"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                        </form>
                                    </div>
                                </div>

								</td>
						</tr>
					@endforeach
				</table>
			</div>
			<div class="col-12 mt-5">
				<div class="mx-auto" style="width: 200px;">
				{{ $doctores->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection