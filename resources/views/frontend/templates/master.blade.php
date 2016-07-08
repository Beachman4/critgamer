<html class="desktop">
    <head>
        <title>CritGamer Lan Party</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-rc.2/themes/smoothness/jquery-ui.css">
        <script   src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"   integrity="sha256-55Jz3pBCF8z9jBO1qQ7cIf0L+neuPTD1u7Ytzrp2dqo="   crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="//code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
        <script src="https://use.fontawesome.com/3e84772efe.js"></script>
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    </head>
    <body>
    <login></login>
    {{--<register></register>--}}
    <div class="container-fluid">
        <div class="row top-bar">
            <div class="col-lg-12">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-1 text-center" style="float: right;">
                    <div class="panels">
                        {{--<div class="user_panel">
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
                        </div>--}}
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
                            <a href="#" class="dropdown-user-panel" data-toggle="modal" data-target="#loginModal">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="/"><img src="{{ URL::asset('assets/img/better_brand.png') }}" height="125" /></a>
            </div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="critgamer-navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="critgamer-navbar">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lan Party <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/events">Event List</a></li>
                                <li><a href="/events/info">Information</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Staff</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>

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