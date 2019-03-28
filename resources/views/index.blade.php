@extends('principal')
@section('content')
<br>
<br>
<br>
<div class="card">
  <div class="card-header">
    <h5>
      Bienvenido {{auth()->user()->name}}
    </h5>
  </div>
  <div class="card-body">
    <h5 class="card-title">Página en desarrollo.</h5>
  </div>
</div>
@endsection