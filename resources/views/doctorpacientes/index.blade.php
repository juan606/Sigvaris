@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Pacientes</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-pacientes">
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
            <thead>
                <tr class="info">
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                </tr>
            </thead>
            @foreach ($doctor->pacientes as $paciente)
                <tr>
                    <td>{{$paciente->nombre}}</td>
                    <td>{{$paciente->paterno}}</td>
                    <td>{{$paciente->materno}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection