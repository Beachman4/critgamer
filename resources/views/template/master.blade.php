<html>
    <head>
        <title>CRITGAMER &#8211; East Texas LAN Gaming Community</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </head>
    <body>
        <style>
            @media (min-width: 768px) {
                .navbar .navbar-nav, .navbar .navbar-brand {
                    display: inline-block !important;
                    float: none !important;
                    vertical-align: top !important;
                }

                .navbar .navbar-collapse, .navbar .navbar-header {
                    text-align: center !important;
                }
                .navbar-brand {
                    margin: 0 auto;
                }
            }
        </style>

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand" style="padding: 0;">
                        <img src="{{ URL::asset('assets/img/better_brand.png') }}" width="150"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Lan Party</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Twitch - Live Stream</a></li>
                        <li><a href="#">Gallery</a></li>
                        <li><a href="#">Staff</a></li>
                        <li><a href="#">About Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <script type="text/javascript">
            if ($(document).width() > 768) {
                var left = $('.navbar-nav li').first().offset().left,
                        offset = left - $('.navbar-brand').width() - 45;
                $('.navbar-brand').css('position', 'relative');
                $('.navbar-brand').css('left', offset);
            } else {

            }
        </script>

        @yield('content')
    </body>
</html>