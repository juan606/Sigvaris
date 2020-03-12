@extends('doctor.show')
@section('submodulos')
<script type="text/javascript">

    function confirmacion(doctor_id){
        swal("¿Esta seguro de eliminar el consultorio?", {
  buttons: {
    Si: true,
    cancel: "No",    
  },
})
.then((value) => {
  switch (value) {
 
    case "Si":
      swal({  
  text: "El consultorio se eliminara permanentemente",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Se ha dado de baja el consultorio", {
      icon: "success",
    });
    $("#form-consultorio"+doctor_id).submit()
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
        <div class="col-4 px-5"><h4>Consultorios</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-consultorios">
        <div class="col-4 px-5">
            <a class="btn btn-success" href="{{ route('doctores.consultorios.create', ['doctor'=>$doctor]) }}"><i class="fas fa-plus"></i><strong> Crear Consultorio</strong></a>
        </div>   
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
            <thead>
                <tr class="info">
                    <th>Hospital</th>
                    <th>Secretaria</th>
                    <th>Teléfono</th>
                    <th>Mail</th>
                    <th>Horario</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            @foreach ($doctor->consultorios as $consultorio)
                <tr>
                    <td>{{$consultorio->hospital->etiqueta}}/{{$consultorio->hospital->nombre}}</td>
                    <td>{{$consultorio->secretaria}}</td>
                    <td>{{$consultorio->tel1}}</td>
                    <td>{{$consultorio->mail}}</td>
                    <td>{{$consultorio->desde}}/{{$consultorio->hasta}}</td>
                    <td>
                        

                        <div class="row">
                            <div class="col-auto pr-2">
                                <a href="{{route('doctores.consultorios.show', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                <a href="{{route('doctores.consultorios.edit', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                
                            </div>
                            <div class="col pl-0">
                                <form role="form" name="consultorioborrar" id="form-consultorio{{$consultorio->id}}" method="POST" action="{{ route('doctores.consultorios.destroy', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id]) }}" name="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-danger" id="butonBorrar" onclick="confirmacion({{$consultorio->id}})"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                </form>
                            </div>
                        </div>
                        
                        
                        




                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection