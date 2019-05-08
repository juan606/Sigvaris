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

    {{-- Forma por usb --}}
    {{-- <form action="{{ route('pembayaran.print') }}" method="POST">
            <input type="text" name="username" class="form-control">
            <input type="hidden" name="_token" class="form-control" value="{!! csrf_token() !!}">
            <button type="submit" name="submit" class="btn btn-info">Print</button
	</form> --}}

	{{-- Forma por red --}}{{-- 
	<form action="{{ url('receipt/print') }}" method="POST">
	            <input type="text" name="username" class="form-control">
	            <input type="hidden" name="_token" class="form-control" value="{!! csrf_token() !!}">
	            <button type="submit" name="submit" class="btn btn-info">Print</button
	</form>  --}}

  </div>  
</div>
@endsection