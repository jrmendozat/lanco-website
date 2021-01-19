

<div id="sliderprincipal" class="slider-pro">
    <div class="sp-slides">
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/mobile/Slider1_mobile.jpg"
            data-retina="/image/slider/mobile/Slider1_mobile.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/mobile/Slider2_mobile.jpg"
            data-retina="/image/slider/mobile/Slider2_mobile.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/mobile/Slider3_mobile.jpg"
            data-retina="/image/slider/mobile/Slider3_mobile.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/mobile/Slider4_mobile.jpg"
            data-retina="/image/slider/mobile/Slider4_mobile.jpg"/>
        </div>
        <div class="sp-slide">
          <img class="sp-image" src="/css/images/blank.gif"
            data-src="/image/slider/mobile/Slider5_mobile.jpg"
            data-retina="/image/slider/mobile/Slider5_mobile.jpg"/>
        </div>
    </div>
</div>

<script type="text/javascript">

$('#sliderprincipal').sliderPro({
    width: 800,
    height: 1200,
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