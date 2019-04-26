@extends('layouts.principal')
@section('content')
<div class="card text-center">
    <form method="POST" class="needs-validation" action="{{route('login')}}">
        {{ csrf_field() }}
        <div class="card-header">
            <h2>Acceso a Sigvaris</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-6 offset-3">
                    <label for="email">Correo</label>
                    <input type="email" name="email" required class="form-control" id="email"
                        placeholder="Ingresa Correo">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6 offset-3">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" required class="form-control" id="password"
                        placeholder="Contraseña">
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('¿Desea reestablecer su contraseña?') }}
        </a>
    </form>
</div>
@endsection