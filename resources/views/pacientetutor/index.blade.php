@extends('paciente.show')
@section('submodulos')
<script type="text/javascript">

    function confirmacion(){
        swal("¿Esta seguro de eliminar al tutor?", {
  buttons: {
    Si: true,
    cancel: "No",    
  },
})
.then((value) => {
  switch (value) {
 
    case "Si":
      swal({  
  text: "La talla se eliminara al tutor",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Se ha dado de baja al tutor", {
      icon: "success",
    });
    $("#form-tutor").submit()
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
        <div class="col-4 px-5"><h4>Tutor</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-tutor"> 
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <table class="table table-striped table-bordered table-hover  mb-4" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
                <thead>
                    <tr class="info">
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Relación</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                
                @if (empty($paciente->tutor))
                <tr>
                
                    <h5>No hay ningún tutor registrado</h5>
                    <div class="col-4 offset-4 px-5">
                        <a class="btn btn-success" href="{{ route('pacientes.tutores.create', ['paciente'=>$paciente]) }}"><i class="fas fa-plus"></i><strong> Registrar Tutor</strong></a>
                    </div>
                </tr>
                @else
                    <tr>
                        <td>{{$paciente->tutor->nombre}}</td>
                        <td>{{$paciente->tutor->paterno}}</td>
                        <td>{{$paciente->tutor->materno}}</td>
                        <td>{{$paciente->tutor->relacion}}</td>
                        <td>
                        
                        
                        <div class="row">
                            <div class="col-auto pr-2">
                                <a href="{{route('pacientes.tutores.edit', ['paciente'=>$paciente, 'tutor'=>$paciente->tutor->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                
                            </div>
                            <div class="col pl-0">
                                <form role="form" name="tallaborrar" id="form-tutor" method="POST" action="{{ route('pacientes.tutores.destroy', ['paciente'=>$paciente, 'talla'=>$paciente->tutor->id]) }}" name="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-danger" id="butonBorrar" onclick="confirmacion()"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                </form>
                            </div>
                        </div>
                        </td>
                    </tr>
                @endif
                    
            </table>
        </div>
        
    </div>

@endsection