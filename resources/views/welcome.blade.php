@extends('layouts.app')

@section('content')


<div id="bg-show-wrap-1">

 
</div>

<div class="container-whois">
   <h1>Hola</h1>
</div>

<script>
/**
 * Created by aco on 2016/9/1.
 */



var data = ['http://www.lanco-website.com/image/home/LANCOP1.jpg','http://www.lanco-website.com/image/home/BANNERP2.jpg','http://www.lanco-website.com/image/home/BANNERP3.jpg'];



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


bgAnimation({ele: '#bg-show-wrap-1'}, interval(10000));




</script>


@stop
