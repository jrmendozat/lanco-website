@extends('layouts-desktop.app')

@section('content')

<!--
<div id="bg-show-wrap-1"></div>
-->

<div style="margin-top:60px">
</div>

@include('partials.slider')

   
<div class="table-responsive">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <td class="text-center" style="width:50%">
                    <a href="{{ route('go-store',[1,0])}}"><img  class="img-fluid" src="image/cintillos/cintillo1.jpg" width=100% alt="cintillo1"></a>
                </td>
                <td class="text-center" style="width:50%">
                    <a href="{{ route('go-store',[2,0])}}"><img  class="img-fluid" src="image/cintillos/cintillo2.jpg" width=100% alt="cintillo2"></a>
                </td>
            </tr>
        
        </tbody>
    </table>
</div>

<div class="blockbotones">

    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td class="text-center" style="width:33%">
                        <a href="{{ route('go-store',[1,1])}}"><img  class="img-fluid" src="image/botones/BOTON_BTN-01.png" width=100% alt="boton1"></a>
                    </td>
                    <td class="text-center" style="width:33%">
                        <a href="{{ route('go-store',[1,2])}}"><img  class="img-fluid" src="image/botones/BOTON_BTN-02.png" width=100% alt="boton1"></a>
                    </td>
                    <td class="text-center" style="width:33%">
                        <a href="{{ route('go-store',[1,3])}}"><img  class="img-fluid" src="image/botones/BOTON_BTN-03.png" width=100% alt="boton1"></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td class="text-center" style="width:33%">
                        <a href="{{ route('go-store',[1,4])}}"><img  class="img-fluid" src="image/botones/BOTON_BTN-04.png" width=100% alt="boton1"></a>
                    </td>
                    <td class="text-center" style="width:33%">
                        <a href="{{ route('go-store',[1,5])}}"><img  class="img-fluid" src="image/botones/BOTON_BTN-05.png" width=100% alt="boton1"></a>
                    </td>
                    <td class="text-center" style="width:33%">
                        <a href="{{ route('go-store',[1,6])}}"><img  class="img-fluid" src="image/botones/BOTON_BTN-06.png" width=100% alt="boton1"></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

<div class="blockfooterbanner">
    <img  class="img-fluid" src="image/slider/FAMILIA PROD-01.png" width=100% alt="bannerinferior">
</div>

<script>
/**
 * Created by aco on 2016/9/1.
 */



var data = ['http://www.lanco-website.com/image/slider/Slider1.jpg','http://www.lanco-website.com/image/slider/Slider2.jpg'];



function bgAnimation(init, interval) {

    var ele = $(init.ele);

    $.preLoad(data).then(function () {

      
        var imgChange = ele.bgChange(data, init);
        imgChange.change();
        var timer = interval(imgChange);
        var changeFlag = false;
        
        ele.on('click', function () {
            if (changeFlag)return;
            changeFlag = true;
            clearInterval(timer);
            imgChange.change();

            
            clearInterval(timer);
            timer = interval(imgChange);
        });

        ele.on('changeStart', function () {
            changeFlag = true;
        });

        
        ele.on('changeEnd', function () {
            changeFlag = false;
        });

    });
}

function interval(time) {
    return function (changeEle) {
        return setInterval(function () {
            changeEle.change();
        }, time);
    }
}

bgAnimation({ele: '#bg-show-wrap-1'}, interval(1000));


</script>


@stop


<!--
    <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 400">Montserrat</h1>
   <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 700">Montserrat</h1>
   <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 800">Montserrat</h1>
   <hr>
   <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 400; font-style: italic">Montserrat</h1>
   <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 700; font-style: italic">Montserrat</h1>
   <h1 style="font-family: 'Montserrat', sans-serif; font-weight: 800; font-style: italic">Montserrat</h1>
   <hr>
   <h1 style="font-family: 'Open Sans', sans-serif; font-weight: 400">Open Sans</h1>
   <h1 style="font-family: 'Open Sans', sans-serif; font-weight: 700">Open Sans</h1>
   <h1 style="font-family: 'Open Sans', sans-serif; font-weight: 800">Open Sans</h1>
   <hr>
   <h1 style="font-family: 'Open Sans', sans-serif; font-weight: 400; font-style: italic">Open Sans</h1>
   <h1 style="font-family: 'Open Sans', sans-serif; font-weight: 700; font-style: italic">Open Sans</h1>
   <h1 style="font-family: 'Open Sans', sans-serif; font-weight: 800; font-style: italic">Open Sans</h1>
   
    -->