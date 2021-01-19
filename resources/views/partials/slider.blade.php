

<div id="sliderprincipal" class="slider-pro">
    <div class="sp-slides">
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/Slider1.jpg"
            data-retina="/image/slider/Slider1.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/Slider2.jpg"
            data-retina="/image/slider/Slider2.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/Slider3.jpg"
            data-retina="/image/slider/Slider3.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/Slider4.jpg"
            data-retina="/image/slider/Slider4.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/Slider5.jpg"
            data-retina="/image/slider/Slider5.jpg"/>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#sliderprincipal').sliderPro({
    width: 1600,
    height: 500,
    arrows: true,
    buttons: false,
    waitForLayers: true,
    thumbnailWidth: 200,
    thumbnailHeight: 100,
    thumbnailPointer: true,
    autoplay: false,
    autoScaleLayers: false,
    breakpoints: {
        500: {
            thumbnailWidth: 120,
            thumbnailHeight: 50
        }
    }
});


</script>