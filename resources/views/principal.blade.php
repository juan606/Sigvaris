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
    <div class="row fixed-top imagenHeader">
        <div class="col-12 p-0 m-0">
			<a href="/">
				<img src="{{asset('img/header.jpg')}}" class="img-fluid" alt="Sigvaris." >
			</a>
        </div>
    </div>
    <div class="row imagenHeader m-0 p-0 d-none d-md-block" style="max-height:168px">
        <div class="col-12 mb-0 mx-0 p-0" style="margin-top: 165px"></div>
    </div>
    <div class="row m-0 p-0 sticky-top">
        <div class="col-12 m-0 p-0">
            @include('nav')
        </div>
    </div>
    
    <div class="container" style="margin-top: 20px">
        @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
    <script>
        $(window).scroll(function() {
        	if ($(this).scrollTop()>0) {
        		$('.imagenHeader').hide(200);
				$('.imagenHeader-i').show(200);
        	} else {
       			$('.imagenHeader').show(200);
				$('.imagenHeader-i').hide(200);
        	}
	}	);
    </script>
</body>

</html>