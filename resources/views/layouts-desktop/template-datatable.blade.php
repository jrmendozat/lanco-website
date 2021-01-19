<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>@yield('title', 'Lanco')</title>
	
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-3peic20OBS+kS9351sQOOO1LJYgA7iQkz8mjQQIGqCWy+rkEEOGIIIgQrVqL88+X" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>

	

	<link rel="stylesheet" type='text/css' href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

	<link rel="stylesheet" href="{{ asset('css/main.css') }}">

	
</head>
<body>
	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="{{ asset('js/jquery.sliderPro.min.js') }}"></script>
	

	@include('partials.navbar')

	@if(\Session::has('message'))
		@include('partials.message')
	@endif


	<main class="py-4">
		@yield('content')
	</main>

	@include('partials.footer')

	
	<script src="{{ asset('js/main.js') }}"></script>
		
</body>
</html>

