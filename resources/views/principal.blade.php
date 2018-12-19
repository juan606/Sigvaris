<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sigvaros</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="/js/app.js"></script>
    @include('sweet::alert')
</head>

<body>
    @include('nav')
    <div class="container-fluid">
        @yield('content')
    </div>
    <div class="container-fluid">
        <iframe src="" frameborder="0" style="width: 100%; height: 100%;"></iframe>
        @include('footer')
    </div>

    <script>
        // $(document).ready(function () {
        //     swal({
        //         title: "Good job!",
        //         text: "You clicked the button!",
        //         icon: "success",
        //         button: "Aww yiss!",
        //     });
        // });
    </script>

</body>

</html>