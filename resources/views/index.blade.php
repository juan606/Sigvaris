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
</div>
@endsection