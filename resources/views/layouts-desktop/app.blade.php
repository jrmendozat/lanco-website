<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lanco-WebSite') }}</title>
  
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/lumen/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfbCiBdRiiNWvRTbHe5X9IfkezKzm0pCrZSKc7EM9mmSl/OyckwbYk3GrajL8Ngy" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Fonts -->
    
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,800|Open+Sans:400,400i,700,700i&display=swap" rel="stylesheet"> 

    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Style Touch Slider Pro -->	
		<link rel="stylesheet" type="text/css" href="{{ asset('css/SliderPro/slider-pro.min.css') }}" media="screen"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('libs/fancybox/jquery.fancybox.css') }}" media="screen"/>

    <!-- Style bgChange -->
        <link rel="stylesheet" href="{{ asset('css/bgIndex.css') }}">
    
    <!-- Stylish Glass -->
	    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css') }}">

  
</head>
<body>
    
    <!-- Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	    
    <!-- JS Touch Slider Pro -->	
		<script type="text/javascript" src="{{ asset('js/SliderPro/jquery.sliderPro.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('libs/fancybox/jquery.fancybox.pack.js') }}"></script>

    <!-- Scrip bgChange -->
        <script type="text/javascript" src="{{ asset('js/bgChange.js') }}"></script>

    <!-- Stylish Glass -->
	    <script type="text/javascript" src="{{ asset('js/zoomsl.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('js/zoomsl.js') }}"></script>

    <!-- Scrip main js -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    
    @include('partials.navbar')
    

    @if(\Session::has('message'))
        @include('partials.message')
	@endif
       
    @yield('content')

    @include('partials.footer')
          
    <!-- Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- Pinterest -->
        <script src="{{ asset('js/pinterest_grid.js') }}"></script>
       
	
    
     <!-- Scrip main js -->
        <script src="{{ asset('js/main.js') }}"></script>
	
</body>
</html>




        <!--
        font-family: 'Open Sans', sans-serif;
        font-family: 'Montserrat', sans-serif;
        -->
