<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.0/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-3peic20OBS+kS9351sQOOO1LJYgA7iQkz8mjQQIGqCWy+rkEEOGIIIgQrVqL88+X" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    
    <link rel="stylesheet" type='text/css' href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    
    

	
</head>
<body>
    	
	     
	@if(\Session::has('message'))
		@include('admin.partials.message')
	@endif
	
	@include('admin.partials.nav')

	@yield('content')

	@include('admin.partials.footer')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="{{ asset('admin/js/main.js') }}"></script>
</body>
</html>