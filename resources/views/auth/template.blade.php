<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title', 'MD Perfumes Tienda Online')</title>
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-3peic20OBS+kS9351sQOOO1LJYgA7iQkz8mjQQIGqCWy+rkEEOGIIIgQrVqL88+X" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

    @if(\Session::has('message'))
		@include('Store.partials.message')
	@endif


	@yield('content')

		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="{{ asset('js/pinterest_grid.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>