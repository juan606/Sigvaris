@extends('principal')
@section('content')
<div class="container">

    <div class="card">
        <form role="form" method="POST" action="{{ route('roles.store') }}">
            <div class="card-header">
                <h2>Nuevo Rol </h2>
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-6">
                        <label class="control-label" for="nombre"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Nombre
                            del Rol:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
                    </div>
                    <div class="form-group col-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Proveedores
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[proveedores]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Pacientes
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[pacientes]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Doctores
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[doctores]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Recursos Humanos
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[recursos_humanos]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Precargas
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[precargas]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Punto de venta
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[punto_de_venta]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Productos
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[productos]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                C.R.M.
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[crm]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Tiendas
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[oficinas]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Usuarios
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[usuarios]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                             <li class="list-group-item">
                                Facturacion
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[facturacion]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                            <li class="list-group-item">
                                Roles
                                <label class="switch ">
                                    <input type="checkbox" name="permisos[roles]" value="1" class="success">
                                    <span class="slider"></span>
                                </label>
                            </li>
                        </ul>
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