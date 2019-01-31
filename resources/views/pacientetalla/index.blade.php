@extends('paciente.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Historial Medidas</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-tallas">
        <div class="col-4 px-5">
            <a class="btn btn-success" href="{{ route('pacientes.tallas.create', ['paciente'=>$paciente]) }}"><i class="fas fa-plus"></i><strong> Crear Medidas</strong></a>
        </div>   
    </div>
    <div class="row">
        <table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
            <thead>
                <tr class="info">
                    <th>Fecha</th>
                    <th>Compresión</th>
                    <th>Estilos</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            @foreach ($paciente->tallas as $talla)
                <tr>
                    <td>{{$talla->created_at}}</td>
                    <td>{{$talla->brazo}}/{{$talla->pierna}}</td>
                    <td>Estilos</td>
                    <td>
                        

                        <div class="row">
                            <div class="col-auto pr-2">
                                <a href="{{route('pacientes.tallas.show', ['paciente'=>$paciente, 'talla'=>$talla->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i><strong> Ver</strong></a>
                                <a href="{{route('pacientes.tallas.edit', ['paciente'=>$paciente, 'talla'=>$talla->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i><strong> Editar</strong></a>
                                
                            </div>
                            <div class="col pl-0">
                                <form role="form" name="tallaborrar" id="form-talla" method="POST" action="{{ route('pacientes.tallas.destroy', ['paciente'=>$paciente, 'talla'=>$talla->id]) }}" name="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i><strong> Borrar</strong></button>
                                </form>
                            </div>
                        </div>
                        
                        
                        




                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection