@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Roles</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-success" href="{{ route('roles.create') }}">
                        <strong><i class="fa fa-plus float-right"></i></strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
           <table class="table">
               <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ver</th>
                        <th>BORRAR</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->nombre}}</td>
                        <td><a href="{{route('roles.show', ['role'=>$role])}}" role="button" class="btn btn-primary"> <strong><i class="fas fa-eye "></i></strong></a></td>

                        <td>
                            <div class="col pl-0">
                                        <form role="form" name="doctorborrar" id="form-doctor{{ $role->id }}" method="POST"  action="{{route('roles.destroy', ['role'=>$role])}}" name="form">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button onclick="confirmacion({{$role->id}})" type="button" class="btn btn-danger" ><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                        </form>
                                    </div>
                            {{-- <a href="{{ url('roles/'.$role.'->id/destroy') }}" role="button" class="btn btn-danger"> <strong><i class="fas fa-trash-alt "></i></strong></a> --}}</td>
                    </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
    </div>
</div>

@endsection

<script type="text/javascript">

    function confirmacion(rol_id){
        swal("¿Esta seguro de eliminar rol?", {
  buttons: {
    Si: true,
    cancel: "No",    
  },
})
.then((value) => {
  switch (value) {
 
    case "Si":
      swal({  
  text: "El rol se eliminara permanentemente",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $("#form-doctor"+rol_id).submit()
  } else {
    swal("Se ha cancelado la eliminación");
  }
});
      break;     
    
  }
});
    }
</script>