@extends('principal')
@section('content')
<div class="container p-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Mail</th>
      <th scope="col">Especialidad</th>
    </tr>
  </thead>
  <tbody>
    @foreach($prospectos as $prospecto)
    <tr>
      <th scope="row">{{$loop->index}}</th>
      <td>{{$prospecto->nombre}}</td>
      <td>{{$prospecto->apellidopaterno}}</td>
      <td>{{$prospecto->mail}}</td>
      <td>{{$prospecto->especialidad}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection