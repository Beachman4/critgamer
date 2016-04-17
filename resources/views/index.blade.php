@extends('template.master')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/nivo-slider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/default.css') }}">
    <script src="{{ URL::asset('assets/js/nivo.js') }}"></script>
    <div class="row">
        <div class="large-8 columns">
            <h3>CritGamer Slideshow</h3>
            <div class="nivoSlider theme-default" id="slider">
                <img src="https://placehold.it/1170x320">
                <img src="https://placehold.it/1170x320">
                <img src="https://placehold.it/1170x320">
                <img src="https://placehold.it/1170x320">
            </div>
        </div>
        <div class="large-4 columns">
            <h4>Join us on Discord!</h4>
            <iframe src="https://discordapp.com/widget?id=99687636041474048&amp;theme=dark" width="375" height="396" allowtransparency="true" frameborder="0"></iframe>
        </div>
    </div>
    <script>
        $(window).load(function() {
            $('#slider').nivoSlider({
                effect: 'random',
                slices: 15,
                boxCols: 8,
                boxRows: 4,
                animSpeed: 500,
                pauseTime: 3000,
                startSlide: 0,
                directionNav: true,
                controlNav: true,
                controlNavThumbs: false,
                pauseOnHover: true,
                manualAdvance: false,
                prevText: 'Prev',
                nextText: 'Next',
                randomStart: false,
                beforeChange: function(){},
                afterChange: function(){},
                slideshowEnd: function(){},
                lastSlide: function(){},
                afterLoad: function(){}
            });
        });
    </script>
@stop