@extends('principal')
@section('content')
<div class="col-12">
  <h4>Doctores</h4>
</div>
<div class="container p-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nobre</th>
      <th scope="col">Paterno</th>
      <th scope="col">Materno</th>
      <th scope="col">Especialidad</th>
    </tr>
  </thead>
  <tbody>
    @foreach($doctores as $doctor)
    <tr>
      <th scope="row">{{$loop->index}}</th>
      <td>{{$doctor->nombre}}</td>
      <td>{{$doctor->apellidopaterno}}</td>
      <td>{{$doctor->apellidomaterno}}</td>
      <td>{{$doctor->especialidad}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection