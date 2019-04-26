<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>

</head>

<body>
    <div class="row p-0 m-0">
        <div class="col-12 p-0 m-0">
            <a href="{{ url('/') }}">
                <img id="imagenHeaderid" src="{{asset('img/header.jpg')}}" class="img-fluid" alt="Sigvaris.">
            </a>
        </div>
    </div>
    <div class="container" style="margin-top: 70px">
        @yield('content')
    </div>
</body>
<div id="app"></div>
@include('sweet::alert')

</html>