<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }

        .form-group.required .control-label:after {
            color: #d00;
            content:"*";
            margin-left: 3px;
            top:7px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Solidarity for all - Trips
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="">Acties</a></li>
                    <li><a href="{!! route('trips.index', ['selector' => 'all']) !!}">Ritten</a></li>

                    @if(Auth::check())
                        <li>
                            <a href="">Inzamelpunten</a>
                        </li>
                    @endif

                    <li><a href="">Contact</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::user()->is('admin') || Auth::user()->is('developer'))
                                    <li>
                                        <a href="{!! route('acl') !!}">
                                            <span class="fa fa-btn fa-user"></span>
                                            Gebruikers beheer
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{!! route('profile.edit') !!}">
                                        <span class="fa fa-btn fa-cogs"></span>
                                        Account configuratie
                                    </a>
                                </li>
                                <li>
                                    <a href="{!! route('bug.get') !!}">
                                        <span class="fa fa-btn fa-file-text-o"></span>
                                        Meld een bug!
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        {{-- Flash message --}}
        @if(Session::has('flash_message'))
            <div id="alert-flash" class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
                @if(Session::has('flash_message_important'))
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                @endif
                <h4>{{ session('flash_title') }}</h4>

                {{ session('flash_message')  }}
            </div>
        @endif
        {{-- END Flash message --}}

        @yield('content')
    </div

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script>
        $("#alert-flash").fadeTo(2000, 500).slideUp(500, function() {
            $("#success-alert").alert('close');
        });
    </script>
</body>
</html>
