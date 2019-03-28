@extends('principal')
@section('content')
<div class="container">

    <div class="card">
        <form role="form" method="POST" action="{{ route('usuarios.store') }}">
            <div class="card-header">
                <h1>Nuevo Usuario </h1>
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-3">
                        <label class="control-label" for="name"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre
                            :</label>
                        <input type="text" class="form-control" id="name" name="name" required autofocus>
                    </div>
                    <div class="form-group col-3">
                        <label class="control-label" for="email"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Correo :</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus>
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
                                <option value="{{$role->id}}">{{$role->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    <strong>Guardar</strong>
                </button>
            </div>
    </div>

    </form>
</div>

@endsection