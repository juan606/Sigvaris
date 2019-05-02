@extends('principal')
@section('content')

<script type="text/javascript">

    function confirmacion(user_id){
        swal("¿Esta seguro de eliminar este usuario?", {
  buttons: {
    Si: true,
    cancel: "No",    
  },
})
.then((value) => {
  switch (value) {
 
    case "Si":
      swal({  
  text: "El usuario se eliminara permanentemente",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Se ha dado de baja al usuario", {
      icon: "success",
    });
    $("#form-doctor"+user_id).submit()
  } else {
    swal("Se ha cancelado la baja");
  }
});
      break;     
    
  }
});
    }
</script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Usuarios</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-success" href="{{ route('usuarios.create') }}">
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
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Borrar</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach($users as $user)
                    <tr>
                      @if(Auth::user()->role->nombre=='Administrador')
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->nombre}}</td>
                        <td>
                             <div class="col pl-0">
                                      @if ($user->role->nombre=='Administrador')
                                        {{-- expr --}}
                                      @else
                                        <form role="form" name="doctorborrar" id="form-doctor{{ $user->id}}" method="POST" action="{{ route('usuarios.destroy',['user'=>$user]) }}" name="form">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="button" class="btn btn-danger" onclick="confirmacion({{$user->id}})"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                        </form>
                                      @endif
                                        
                                    </div>
                            {{-- <a href="{{ route('usuarios.destroy',['user'=>$user]) }}" role="button" class="btn btn-danger"> <strong><i class="fas fa-trash-alt "></i></strong></a> --}}</td>
                        @else
                          @if($user->role->nombre=='Administrador')
                          @else
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role->nombre}}</td>
                            <td>
                                 <div class="col pl-0">
                                          @if ($user->role->nombre=='Administrador')
                                            {{-- expr --}}
                                          @else
                                            <form role="form" name="doctorborrar" id="form-doctor{{ $user->id}}" method="POST" action="{{ route('usuarios.destroy',['user'=>$user]) }}" name="form">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-danger" onclick="confirmacion({{$user->id}})"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                            </form>
                                          @endif
                                            
                                        </div>
                                {{-- <a href="{{ route('usuarios.destroy',['user'=>$user]) }}" role="button" class="btn btn-danger"> <strong><i class="fas fa-trash-alt "></i></strong></a> --}}</td>
                          @endif
                        @endif
                    </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
    </div>
</div>

@endsection