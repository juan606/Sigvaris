<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweet::alert')
</head>

<body>
    <div  class="row p-0 m-0">
        <div class="col-12 p-0 m-0">
			<a href="/">
				<img id="imagenHeaderid" src="{{asset('img/header.jpg')}}" class="img-fluid" alt="Sigvaris.">
			</a>
        </div>
    </div>
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
            @include('nav')
        </div>
    </div>
    
    <div class="container-fliud" style="margin-top: 20px">
        <!-- <iframe src="{{ route('doctores.create') }}" style="width: 100%; overflow:auto; height:1000px;" frameborder="0"></iframe> -->
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
</body>
<div id="app"></div>
<script>

</script>
</html>