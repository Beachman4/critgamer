<html>
    <head>
        <title>CRITGAMER &#8211; East Texas LAN Gaming Community</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">
        <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js"></script>
        <script src="{{ URL::asset('assets/js/scrollreveal.js') }}"></script>
    </head>
    <body>
        <style>
            #clockdiv{
                font-family: sans-serif;
                color: #fff;
                display: inline-block;
                font-weight: 100;
                text-align: center;
                font-size: 30px;
            }

            #clockdiv > div{
                padding: 10px;
                border-radius: 3px;
                background: #00BF96;
                display: inline-block;
            }

            #clockdiv div > span{
                padding: 15px;
                border-radius: 3px;
                background: #00816A;
                display: inline-block;
            }

            .smalltext{
                padding-top: 5px;
                font-size: 16px;
            }
        </style>

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 style="color: black !important;">Time until Quakecon</h1>
                <div class="center-block" id="clockdiv" style="margin-bottom: 3rem;">
                    <div>
                        <span class="days"></span>
                        <div class="smalltext">Days</div>
                    </div>
                    <div>
                        <span class="hours"></span>
                        <div class="smalltext">Hours</div>
                    </div>
                    <div>
                        <span class="minutes"></span>
                        <div class="smalltext">Minutes</div>
                    </div>
                    <div>
                        <span class="seconds"></span>
                        <div class="smalltext">Seconds</div>
                    </div>
                </div>
            </div>
        </div>

        <script>function getTimeRemaining(endtime) {
                var t = Date.parse(endtime) - Date.parse(new Date());
                var seconds = Math.floor((t / 1000) % 60);
                var minutes = Math.floor((t / 1000 / 60) % 60);
                var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                return {
                    'total': t,
                    'days': days,
                    'hours': hours,
                    'minutes': minutes,
                    'seconds': seconds
                };
            }

            function initializeClock(id, endtime) {
                var clock = document.getElementById(id);
                var daysSpan = clock.querySelector('.days');
                var hoursSpan = clock.querySelector('.hours');
                var minutesSpan = clock.querySelector('.minutes');
                var secondsSpan = clock.querySelector('.seconds');

                function updateClock() {
                    var t = getTimeRemaining(endtime);

                    daysSpan.innerHTML = t.days;
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                    if (t.total <= 0) {
                        clearInterval(timeinterval);
                    }
                }

                updateClock();
                var timeinterval = setInterval(updateClock, 1000);
            }

            var deadline = new Date(Date.parse("August 4, 2016"));
            initializeClock('clockdiv', deadline);</script>

        <div class="top-bar" id="main-menu">
            <div id="responsive-menu">
                <div class="top-bar-left text-center">
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li><a href="#">Home</a></li>
                        {{--<li><a href="#">Lan Party</a></li>--}}
                        <li>
                            <a href="#">Lan Party</a>
                            <ul class="dropdown menu" data-dropdown-menu>
                                <li><a href="/lan/events">Event List</a></li>
                                <li><a href="/lan/info">Information</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Calendar</a></li>
                        <li><a href="/twitch">Twitch - Live Stream</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="/staff">Staff</a></li>
                        <li><a href="/about">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            /*if (window.matchMedia('(min-width: 768px)')) {
                var left = $('.navbar-nav li').first().offset().left,
                        offset = left - $('.navbar-brand').width() - 45;
                $('.navbar-brand').css('position', 'relative');
                $('.navbar-brand').css('left', offset);
            } else {
                $('.navbar-brand').css('position', 'relative');
                $('.navbar-brand').css('left', '0');
            }
            $(window).resize(function() {
                if (window.matchMedia('(min-width: 768px)')) {
                    var left = $('.navbar-nav li').first().offset().left,
                            offset = left - $('.navbar-brand').width() - 45;
                    $('.navbar-brand').css('position', 'relative');
                    $('.navbar-brand').css('left', offset);
                } else {
                    $('.navbar-brand').css('position', 'relative');
                    $('.navbar-brand').css('left', '0');
                }
            });*/
            $(function() {
                $(document).foundation();
            });
        </script>
        <div class="row">
            <div class="small-12 columns wrapper">
                @yield('content')
            </div>
        </div>

    <div class="footer">
        <div class="row bottom">
            <div class="large-3 columns">
                <h4 style="text-align: center;">About Us</h4>
            </div>
            <div class="large-3 columns">
                <h4 style="text-align: center;">Important Links</h4>
            </div>
            <div class="large-3 columns">
                <h4 style="text-align: center">Stay Connected!</h4>
                <div class="row large-up-4 medium-up-2 small-up-1">
                    <div class="column">
                        <a href="https://www.facebook.com/critgamer">
                            <div class="facebook-icon">
                                <i class="fa fa-facebook fa-inverse fa-lg"></i>
                            </div>
                        </a>
                    </div>
                    <div class="column">
                        <a href="https://twitter.com/critgamer">
                            <div class="twitter-icon">
                                <i class="fa fa-twitter fa-inverse fa-lg"></i>
                            </div>
                        </a>
                    </div>
                    <div class="column">
                        <a href="https://plus.google.com/101115501024421552604">
                            <div class="google-icon">
                                <i class="fa fa-google-plus fa-inverse fa-lg"></i>
                            </div>
                        </a>
                    </div>
                    <div class="column">
                        <a href="https://www.youtube.com/user/critgamer">
                            <div class="youtube-icon">
                                <i class="fa fa-youtube fa-inverse fa-lg"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="large-3 columns">
                <div class="row">
                    <div class="large-12 columns">
                        <h4 style="text-align: center">Contact Us!</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="large-2 columns">
                        <div class="contact-us-logo">
                            <i class="fa fa-envelope fa-inverse fa-lg"></i>
                        </div>
                    </div>
                    <div class="large-10 columns">
                        <p style="font-size: 16px; line-height: 16px">info@critgamer.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            window.sr = ScrollReveal().reveal('.bottom');
           $('.facebook-icon').hover(function() {
               $(this).animate({
                   borderRadius: 0,
                   backgroundColor: 'blue'
               }, 1000);
           }, function() {
               $(this).animate({
                   borderRadius: '50%',
                   backgroundColor: '#222222'
               }, 1000);
           });
            $('.twitter-icon').hover(function() {
               $(this).animate({
                   borderRadius: 0,
                   backgroundColor: '#00aced'
               }, 1000);
           }, function() {
               $(this).animate({
                   borderRadius: '50%',
                   backgroundColor: '#222222'
               }, 1000);
           });
            $('.google-icon').hover(function() {
               $(this).animate({
                   borderRadius: 0,
                   backgroundColor: '#dd4b39'
               }, 1000);
           }, function() {
               $(this).animate({
                   borderRadius: '50%',
                   backgroundColor: '#222222'
               }, 1000);
           });
            $('.youtube-icon').hover(function() {
               $(this).animate({
                   borderRadius: 0,
                   backgroundColor: '#bb0000'
               }, 1000);
           }, function() {
               $(this).animate({
                   borderRadius: '50%',
                   backgroundColor: '#222222'
               }, 1000);
           });
        });
    </script>
    </body>
</html>