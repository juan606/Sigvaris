@extends('doctor.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Consultorios</h4></div>
        <div class="col-4 px-5">
            <a class="btn btn-success" href="{{ route('doctores.consultorios.create', ['doctor'=>$doctor]) }}">Crear nuevo</a>
        </div>   
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
            <thead>
                <tr class="info">
                    <th>Hospital</th>
                    <th>Secretaria</th>
                    <th>Teléfono</th>
                    <th>Mail</th>
                    <th>Horario</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            @foreach ($doctor->consultorios as $consultorio)
                <tr>
                    <td>{{$consultorio->nombre}}</td>
                    <td>{{$consultorio->secretaria}}</td>
                    <td>{{$consultorio->tel1}}</td>
                    <td>{{$consultorio->mail}}</td>
                    <td>{{$consultorio->desde}}/{{$consultorio->hasta}}</td>
                    <td>
                        

                        <div class="row">
                            <div class="col-auto pr-2">
                                <a href="{{route('doctores.consultorios.show', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id])}}" class="btn btn-primary">Ver</a>
                                <a href="{{route('doctores.consultorios.edit', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id])}}" class="btn btn-warning">Editar</a>
                                
                            </div>
                            <div class="col pl-0">
                                <form role="form" name="consultorioborrar" id="form-consultorio" method="POST" action="{{ route('doctores.consultorios.destroy', ['doctor'=>$doctor, 'consultorio'=>$consultorio->id]) }}" name="form">
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