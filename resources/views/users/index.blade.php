@extends('principal')
@section('content')

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
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->nombre}}</td>
                        <td>
                             <div class="col pl-0">
                                        <form role="form" name="doctorborrar" id="form-doctor" method="POST" action="{{ route('usuarios.destroy',['user'=>$user]) }}" name="form">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                        </form>
                                    </div>
                            {{-- <a href="{{ route('usuarios.destroy',['user'=>$user]) }}" role="button" class="btn btn-danger"> <strong><i class="fas fa-trash-alt "></i></strong></a> --}}</td>
                    </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
    </div>
</div>

@endsection