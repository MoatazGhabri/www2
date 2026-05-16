<style>
    @media only screen and (max-width: 600px) {
        .hero-background {
            background-size: contain !important;
            margin-top: -290px !important;
        }
        .hero-section {
            height: 50vh;
        }
        .owl-stage-outer{
            height: 50vh;
        }
        .hero-slider {
            height: 50vh;
        }
        .owl-stage{
            height: 50vh;
        }
        .owl-item{
            height: 50vh;
        }
        .hero-single::before{
            height: 50vh;
        }
    }
    .hero-background {
        height: 1000px;
    }
    
    @media only screen and (min-width: 1201px) {
        .hero-background {
            height: 1500px;
        }
    }
    .owl-nav { display: none !important; }
</style>
<div class="hero-section ">
    <div class="hero-slider owl-carousel owl-theme">
        @foreach ($sliders as $item)
            <a href="{{ $item->url ? $item->url : '#' }}" target="_blank" style="display:block;width:100%;height:100%;">
                <div class="hero-single hero-background slider-item"
                    style="background:url({{ asset('uploads/sliders/' . $item->alt) }});"
                    data-id="{{ $item->id }}">
                </div>
            </a>
        @endforeach
    </div>
</div>
<script>
$(document).ready(function(){
    $('.hero-slider').owlCarousel({
        items:1,
        loop:true,
        nav:false, // Arrows removed
        dots:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true
    });
});
</script>