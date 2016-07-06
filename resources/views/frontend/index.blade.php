@extends('frontend.templates.master')
@section('content')
    <script src="{{ URL::asset('assets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.simplr.smoothscroll.min.js') }}"></script>
    <link rel="stylesheet" href="https://rawgit.com/pixedelic/Camera/master/css/camera.css">
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://rawgit.com/pixedelic/Camera/master/scripts/jquery.easing.1.3.js"></script>
    <script src="https://rawgit.com/pixedelic/Camera/master/scripts/camera.min.js"></script>
    <script src="{{ URL::asset('assets/js/jquery.rd-parallax.js') }}"></script>

    </div>
    </div>
    <div class="camera_wrap">
        <div data-src="https://i.imgur.com/Jznk84E.jpg">
            <div class="camera_info fadeIn camera_affected">
                <h1>Lan Party</h1>
                <p>You bring the computer, we'll do the rest.</p>
            </div>
        </div>
        <div data-src="https://i.imgur.com/hiC4wtU.jpg">
            <div class="camera_info fadeIn camera_affected">
                <h1>Infrastrucgture</h1>
                <p>We have an impressive network and power system to make sure you are gaming during the entire party.</p>
            </div>
        </div>
        <div data-src="https://i.imgur.com/fhKGKN6.jpg">
            <div class="camera_info fadeIn camera_affected">
                <h1>Community</h1>
                <p>We care about our gamers.  We offer several tournaments with prizes and giveaways.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" style="padding: 3rem">
                    <h1>What we do</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                </div>
            </div>
            </div>
            </div>
            <div class="parallax parallax1" data-parallax-speed="-0.4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Like What You See?</h2>
                            <p>We implore you to check out our calendar of events and sign up for our next Lan Event!</p>
                            <a href="/lan-party/events">Lan Events</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>News</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                        <h5 class="text-right"><a href="#">Read More</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                        <h5 class="text-right"><a href="#">Read More</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Lorem ipsum</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis dapibus ex. Maecenas et elementum quam, id maximus tortor. Nullam porttitor, urna ut consectetur consequat, dui quam porta sem, sit amet mollis diam ligula at quam. Mauris lacus arcu, suscipit posuere molestie et, vestibulum et sapien. Praesent accumsan tellus viverra arcu fringilla vehicula. In dictum tortor egestas, imperdiet tellus vitae, laoreet mauris. Vivamus iaculis urna porttitor nulla aliquet gravida.</p>
                        <h5 class="text-right"><a href="#">Read More</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1>Sponsors</h1>
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="http://www.gunnars.com/" target="_blank"><img src="{{ URL::asset('assets/img/gunnar.png') }}"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="https://www.inwin-style.com/" target="_blank"><img src="{{ URL::asset('assets/img/InWinBetter.png') }}"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="http://groupm7.com" target="_blank"><img src="{{ URL::asset('assets/img/groupm7-logo-light.png') }}"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="https://www.computerpoweruser.com/home" target="_blank"><img src="{{ URL::asset('assets/img/cpu.png') }}"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="http://ocz.com/us/" target="_blank"><img height="130" src="{{ URL::asset('assets/img/ocz.png') }}"></a>
                            </div>
                            <div class="col-lg-4">
                                <a href="http://wardesports.com/" target="_blank"><img src="{{ URL::asset('assets/img/ward.png') }}"></a>
                            </div>
                        </div>
                    </div>
                </div>
    <script>
        $('.camera_wrap').camera({
            height: '40.2%',
            autoAdvance: true,
            pagination: false,
            playPause: false,
            hover: false
        });
    </script>
    <script>
            $.srSmoothscroll({
                step: 150,
                speed: 800
            });
        </script>
@stop