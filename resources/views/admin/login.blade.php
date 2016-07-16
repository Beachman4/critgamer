<html>
    <head>
        <title>Critgamer Admin</title>
        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="/css/AdminLTE.min.css">
        <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-rc.2/themes/smoothness/jquery-ui.css">
        <script   src="https://code.jquery.com/ui/1.12.0-rc.2/jquery-ui.min.js"   integrity="sha256-55Jz3pBCF8z9jBO1qQ7cIf0L+neuPTD1u7Ytzrp2dqo="   crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/css/tether.min.css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
        <script src="https://use.fontawesome.com/3e84772efe.js"></script>
        <script src="http://crit.the9grounds.com:8080/socket.io/socket.io.js"></script>
        <script src="/js/admin.js"></script>
    </head>
    <body>
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><img src="http://www.critgamer.com/wp-content/uploads/2014/07/CG_SiteLogo-300x68.png" width="320" /></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to view the fuckin admin</p>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('loginMessage'))
                <div class="alert alert-danger">
                    {{ session()->get('loginMessage') }}
                </div>
            @endif

            <form method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username_email" class="form-control" placeholder="Email or Username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success-outline btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                {{ csrf_field() }}
            </form>

        </div>
    </div>
    </body>
</html>