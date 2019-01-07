<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweet::alert')
</head>

<body>
    <div class="row">
        <div class="col pr-0 mr-0">
        <img src="{{asset('img/header.jpg')}}" class="img-fluid" alt="Sigvaris.">
        </div>
        <div class="col p-0 m-0 d-sm-none d-md-block" style="background-color: #114C9A;">
        
        </div>
    </div>
    @include('nav')
    <div class="container" style="margin-top: 20px">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
</body>

</html>