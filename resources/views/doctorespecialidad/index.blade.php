@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Especialidades</h4></div>
        <div class="col-4 px-5">
            <a class="btn btn-success" href="{{ route('doctores.especialidades.create', ['doctor'=>$doctor]) }}">Crear nuevo</a>
        </div>   
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
            <thead>
                <tr class="info">
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            @foreach ($doctor->especialidades as $especialidad)
                <tr>
                    <td>{{$especialidad->nombre}}</td>
                    <td>{{$especialidad->cedula}}</td>
                    <td>


                        <div class="row">
                            <div class="col-auto pr-2">
                                <a href="{{route('doctores.especialidades.show', ['doctor'=>$doctor, 'especialidad'=>$especialidad->id])}}" class="btn btn-primary">Ver</a>
                                <a href="{{route('doctores.especialidades.edit', ['doctor'=>$doctor, 'especialidad'=>$especialidad->id])}}" class="btn btn-warning">Editar</a>
                                
                            </div>
                            <div class="col pl-0">
                                <form role="form" name="especialidadborrar" id="form-especialidad" method="POST" action="{{ route('doctores.especialidades.destroy', ['doctor'=>$doctor, 'especialidad'=>$especialidad->id]) }}" name="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">Borrar</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection