@extends('doctor.show')
@section('submodulos')
<script type="text/javascript">

    function confirmacion(doctor_id){
        swal("¿Esta seguro de eliminar este Reconocimientos/Cargos?", {
  buttons: {
    Si: true,
    cancel: "No",    
  },
})
.then((value) => {
  switch (value) {
 
    case "Si":
      swal({  
  text: "El Reconocimientos/Cargos se eliminara permanentemente",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Se ha dado de baja al Reconocimientos/Cargos", {
      icon: "success",
    });
    $("#form-premio"+doctor_id).submit()
  } else {
    swal("Se ha cancelado la baja");
  }
});
      break;     
    
  }
});
    }
</script>
    <div class="row my-5">
        <div class="col-4 px-5"><h4>Reconocimientos/Cargos</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-premios">
        <div class="col-4 px-5">
            <a class="btn btn-success" href="{{ route('doctores.premios.create', ['doctor'=>$doctor]) }}"><i class="fas fa-plus"></i><strong> Crear Reconocimientos/Cargos</strong></a>
        </div>  
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
            <thead>
                <tr class="info">
                    <th>Nombre</th>
                    <th>Institución</th>
                    <th>Otorga</th>
                    <th>Fecha</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            @foreach ($doctor->premios as $premio)
                <tr>
                    <td>{{$premio->nombre}}</td>
                    <td>{{$premio->institucion}}</td>
                    <td>{{$premio->otorga}}</td>
                    <td>{{$premio->fecha}}</td>
                    <td>

                        <div class="row">
                            <div class="col-auto pr-2">
                                <a href="{{route('doctores.premios.show', ['doctor'=>$doctor, 'premio'=>$premio->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                <a href="{{route('doctores.premios.edit', ['doctor'=>$doctor, 'premio'=>$premio->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                
                            </div>
                            <div class="col pl-0">
                                <form role="form" name="premioborrar" id="form-premio{{ $premio->id}}" method="POST" action="{{ route('doctores.premios.destroy', ['doctor'=>$doctor, 'premio'=>$premio->id]) }}" name="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-danger" id="butonBorrar" onclick="confirmacion({{$premio->id}})" ><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection