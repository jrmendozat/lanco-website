@extends('layouts-desktop.app')

@section('content')

<div style="margin-top:60px" class="bloquecintillo">
	@switch($categoryselect )
		@case("1")
		<img  class="img-fluid" src="/image/cintillos/BANNER_LUBRICANTES.jpg" width=100% alt="cintillolubricantes">
		@break
		@case("2")
		<img  class="img-fluid" src="/image/cintillos/BANNER_ESPECIALIDADES.jpg" width=100% alt="cintilloespecialidades">
		@break
		@default
		No definido
	@endswitch
</div>
	
<div style="margin-top:30px" class="show-products-detail response">
  <div  class="row">
    <div   class="col-sm-2">
      @switch($categoryselect )
      @case("1")
        @switch($categorytwoselect )
          @case("0")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-07.png" width=100% alt="botonlateral07">
          @break
          @case("1")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-01.png" width=100% alt="botonlateral01">
          @break
          @case("2")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-02.png" width=100% alt="botonlateral02">
          @break
          @case("3")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-03.png" width=100% alt="botonlateral03">
          @break
          @case("4")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-04.png" width=100% alt="botonlateral04">
          @break
          @case("5")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-05.png" width=100% alt="botonlateral05">
          @break
          @case("6")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-06.png" width=100% alt="botonlateral06">
          @break
          
          
          @default
            No definido
        @endswitch
      @break
      @case("2")
        @switch($categorytwoselect )
          @case("0")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-08.png" width=100% alt="botonlateral08">
          @break
          @case("7")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-09.png" width=100% alt="botonlateral09">
          @break
          @case("8")
            <img  class="img-fluid" src="/image/botones/BOTON_BTN-10.jpg" width=100% alt="botonlateral10">
          @break
          @default
            No definido
        @endswitch
      @break
      @default
        No definido
      @endswitch
     
      
      <div style="margin-top:30px" class="accordion-menu">
        <ul class="menu">
          <li><a href="{{ route('go-store',[1,0])}}">Lubricantes <i class="fa fa-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('go-store',[1,1])}}">Motores a Gasolina</a></li>
              <li><a href="{{ route('go-store',[1,2])}}">Motor a Diésel</a></li>
              <li><a href="{{ route('go-store',[1,3])}}">Motos</a></li>
              <li><a href="{{ route('go-store',[1,4])}}">Marinos</a></li>
              <li><a href="{{ route('go-store',[1,5])}}">Transmisión Automotriz</a></li>
              <li><a href="{{ route('go-store',[1,6])}}">Industrial</a></li>
            </ul>
          </li>
          <li><a href="{{ route('go-store',[2,0])}}">Especialidades<i class="fa fa-chevron-down"></i></a>
          <ul>
            <li><a href="{{ route('go-store',[2,7])}}">Liga Para Frenos</a></li>
            <li><a href="{{ route('go-store',[2,8])}}">Refrigerantes <i class="fa fa-chevron-down"></i></a>
          </ul>
        </ul>
      </div>
    </div>
    <div class="col-sm-10 text-center">
		<div  class="row" style="margin-top:30px">
      <div   class="col-sm-1">
      </div>
			<div   class="col-sm-2">
				<img class="img-fluid" src="{{URL::asset($product->image)}}" width="100%" class="stylishglass" alt="Card image">
			</div>
			<div   class="col-sm-4 text-center">
				<h4 style="font-family: 'Open Sans', sans-serif; font-weight: 700; font-style: italic; ">Descripción</h4>
				<h5 style="font-family: 'Open Sans', sans-serif; font-weight: 400; margin-top:30px">{{$product->name}}</h5>
				<h5 style="font-family: 'Open Sans', sans-serif; font-weight: 700; margin-top:10px">{{$product->sku}}</h5>
				<h5 style="font-family: 'Open Sans', sans-serif; font-weight: 400; margin-top:10px">{{$product->extract}}</h5>
				<h6 style="font-family: 'Open Sans', sans-serif; font-weight: 400; margin-top:30px">{{$product->description}}</h6>
			</div>
			<div   class="col-sm-5">
				<img class="img-fluid" src="{{URL::asset($product->image_5)}}" width="100%" class="stylishglass" alt="Card image">
			</div>
		</div>
		<hr>
		<div class="text-right">
        	<a href="{{ route('download-file',$product->download_1)}}"><img  class="img-fluid" src="/image/botones/ICON-05.png" width=10% alt="Icon-5"></a>
		</div>
    </div>
  </div> 
</div>	



<script>
	
    $(function(){
  		$(".stylishglass").imagezoomsl();
	});


    $(document).ready(function() {
		$('.menu li:has(ul)').click(function(e) {
		e.preventDefault();

		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).children('ul').slideUp();
		} else {
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('active');
			$(this).addClass('active');
			$(this).children('ul').slideDown();
		}

		$('.menu li ul li a').click(function() {
			window.location.href = $(this).attr('href');
		})
		});
	});


	

    
</script>

@stop
