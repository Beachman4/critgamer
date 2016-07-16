<html class="desktop">
    <head>
        <title>CritGamer Lan Party</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-rc.2/themes/smoothness/jquery-ui.css">
        <script   src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"   integrity="sha256-55Jz3pBCF8z9jBO1qQ7cIf0L+neuPTD1u7Ytzrp2dqo="   crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
        <script src="https://use.fontawesome.com/3e84772efe.js"></script>
        <script src="http://crit.the9grounds.com:8080/socket.io/socket.io.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/css/tether.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js"></script>
    </head>
    <body>
    <login></login>
    <register></register>
    {{--<user-bar></user-bar>--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="row top-bar">
            <div class="col-lg-12">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-1 text-center" style="float: right;">
                    <div class="panels">
                        <div class="user_panel">
                            <a href="#" class="dropdown-user-panel">
                                <img style="border-radius: 50%" src="https://placehold.it/30x30">
                                <span>Test123</span>
                            </a>
                            <div class="user_panel_dropdown">
                                <div class="bottom">
                                    <a class="btn btn-default" style="float: left;">My Account</a>
                                    <a class="btn btn-default" style="float: right;">Sign Out</a>
                                </div>

                            </div>
                        </div>
                        @if (\Users::isSignedIn())
                            <div class="user_panel dropdown">
                                <a href="#" class="dropdown-user-panel dropdown-toggle" id="user_panel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <img style="border-radius: 50%" src="https://placehold.it/30x30">
                                    <span>Test123</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="user_panel">
                                    <li><a href="/account">My Account</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </div>
                        @else
                            <a href="#" class="btn btn-primary-outline" class="dropdown-user-panel" data-toggle="modal" data-target="#loginModal">Login</a>
                            <a href="#" class="btn btn-primary-outline" class="dropdown-user-panel" data-toggle="modal" data-target="#registerModal">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
        {{--<div class="row">
            <div class="col-lg-12 text-lg-center">
                <a href="/"><img src="{{ URL::asset('assets/img/better_brand.png') }}" height="125" /></a>
            </div>
        </div>
        <nav class="navbar navbar-light bg-faded">
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#crigamernav">
                &#9776;
            </button>
            <div class="collapse navbar-toggleable-xs" id="crigamernav">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lan Party <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <a href="/events" class="dropdown-item">Event List</a>
                            <a href="/events-info" class="dropdown-item">Information</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Staff</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                </ul>
            </div>
        </nav>--}}
        <menu></menu>

        <div id="app" class="container-fluid">
            <div class="container">
                @yield('content')
            </div>
        </div>
        <script>
            $(function() {
                $('.navbar-toggle').removeClass('ui-btn');
            });
        </script>
    </body>
</html>