<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MD Perfumes / Panel Administración') }}</title>

	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfbCiBdRiiNWvRTbHe5X9IfkezKzm0pCrZSKc7EM9mmSl/OyckwbYk3GrajL8Ngy" crossorigin="anonymous">
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type='text/css' href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One|Lobster+Two|Tangerine:Serif|Serif:bold' rel='stylesheet' type='text/css'>
	
	
	<link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
	
</head>
<body>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
   
	    
	@if(\Session::has('message'))
		@include('admin.partials.message')
	@endif
	
	@include('admin.partials.nav')

	@yield('content')

	@include('admin.partials.footer')
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	
	<script src="{{ asset('admin/js/main.js') }}"></script>

	<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

	<script>
    	$('#edit').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var name = button.data('productname') 
			var visible = button.data('productvisible')
			var stock = button.data('productstock')
			var price = button.data('productprice')
			var product_id = button.data('productid') 
			var modal = $(this)

			modal.find('.modal-body #visible').val(visible);
			modal.find('.modal-body #stock').val(stock);
			modal.find('.modal-body #price').val(price);
			modal.find('.modal-body #product_id').val(product_id);
		})
	</script>

	
</body>
</html>

