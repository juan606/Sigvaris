@extends('principal')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
    </div>
    <div class="card rounded-0">
        <div class="card-header rounded-0">
            <h5 class="text-center m-0">
                <strong class="text-upppercase">CERTIFICACIONES</strong>
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <a href="{{route('certificaciones.create')}}" class="btn btn-success rounded-0">Crear</a>
                </div>
            </div>
            <br>
            <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">¿Certificado?</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Duración</th>
                    <th scope="col">Instructor</th>
                    <th scope="col">Quien certifica</th>
                    <th scope="col">Eliminar</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                    <tr>
                        <th scope="row">{{$curso->nombre}}</th>
                        <td>{{$curso->es_certificado}}</td>
                        <td>{{$curso->calificacion}}</td>
                        <td>{{$curso->fecha}}</td>
                        <td>{{$curso->duracion}}</td>
                        <td>{{$curso->instructor}}</td>
                        <td>{{$curso->certificador}}</td>
                        <td>
                            <form action="{{route('certificaciones.destroy',['id'=>$curso->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-0">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection