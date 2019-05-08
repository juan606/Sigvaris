@extends('principal')
@section('content')
<div class="container">

    <div class="card">
        <form role="form" method="POST" action="{{ route('usuarios.update',['usuario'=>$user])}}">
            <div class="card-header">
                <h1>Modificar al usuario {{$user->name}} </h1>
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="form-group col-3">
                        <label class="control-label" for="name"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre
                            :</label>
                        <input type="text" class="form-control" required value="{{ $user->name }}" readonly="">
                    </div>
                    <div class="form-group col-3">
                        <label class="control-label" for="email"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Correo :</label>
                        <input type="email" class="form-control" id="email" name="email" readonly="" value="{{ $user->email }}" required autofocus>
                    </div>
                    <div class="form-group col-3">
                        <label class="control-label" for="password"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Contraseña :</label>
                        <input type="password" class="form-control" id="password" name="password" required autofocus>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-group">
                            <label for="role_id">Rol</label>
                            <select class="form-control" required name="role_id" id="role_id">
                                <option value="">Seleccionar...</option>
                                @foreach($roles as $role)
                                    @if($role->nombre=='Administrador')
                                    @else
                                        @if ($user->role==$role)
                                            <option value="{{$role->id}}" selected="selected">{{$role->nombre}}</option>
                                        @else
                                            <option value="{{$role->id}}">{{$role->nombre}}</option>
                                        @endif
                                        
                                    @endif
                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    <strong>Guardar</strong>
                </button >
            </div>
    </div>

    </form>
</div>

@endsection
