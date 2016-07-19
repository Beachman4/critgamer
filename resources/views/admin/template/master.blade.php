<html>
    <head>
        <title>Critgamer Admin</title>
        <link rel="stylesheet" href="/css/admin.css">
        <link rel="stylesheet" href="/css/AdminLTE.min.css">
        <link rel="stylesheet" href="/css/skins/skin-black.min.css">
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script   src="http://code.jquery.com/jquery-1.12.4.min.js"   integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="   crossorigin="anonymous"></script>--}}
        <!-- Latest compiled and minified JavaScript -->
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
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
        <script src="/js/admin.js"></script>
    </head>
    <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
        <style>
            .nav > li > a {
                position: relative;
                display: block;
                padding: 10px 15px;
            }
        </style>

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">CG</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Critgamer</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" style="padding: 0;">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" style="padding-bottom: 0;padding-top: 13px;" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="nav-item dropdown user user-menu">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

                                <span>{{ $user->username }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-primary-outline btn-block">Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" style="padding-top: 15px;padding-bottom: 15px;" class="nav-link" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/assets/img/better_brand.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ $user->username }}</p>
                    </div>
                </div>
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="User Search">
                        <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                    </div>
                </form>
                <ul class="sidebar-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Users</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/users"><i class="fa fa-circle-o"></i> Users</a></li>
                            <li><a href="/admin/users/create"><i class="fa fa-circle-o"></i> New User</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Events</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/events"><i class="fa fa-circle-o"></i> Events</a></li>
                            <li><a href="/admin/events/create"><i class="fa fa-circle-o"></i> Create Event</a></li>
                            <li><a href="/admin/events/history"><i class="fa fa-circle-o"></i> Order List</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @if (\Admin::getTitle() != "")
                    {{ \Admin::getTitle() }}
                    @if (\Admin::getSubTitle() != "")
                        <small>{{ \Admin::getSubTitle() }}</small>
                    @endif
                @endif
            </h1>
            @if (count(\Admin::getBreadCrumbs()) > 0)
                <ol class="breadcrumb">
                    @foreach (\Admin::getBreadCrumbs() as $breadcrumb)
                        @foreach($breadcrumb as $title => $link)
                            <li><a href="{{ $link }}">{{ $title }}</a></li>
                        @endforeach
                    @endforeach
                </ol>
            @endif
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    @yield('content')
                </div>
            </div>
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
    </div>
    </div>
    <script>
        $('.breadcrumb li').last().addClass('active');
    </script>
    <script src="/js/adminVue.js"></script>
    </body>
</html>