<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Solidarity for all - API Documentatie.</title>

        {{-- Fonts --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        {{-- Styles --}}
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
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

            .prettyprint ol.linenums > li { list-style-type: decimal; }
        </style>
    </head>
    <body id="app-layout" onload="prettyPrint()">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                {{-- Collapsed Hamburger --}}
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                {{-- Branding Image --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    Solidarity for all - API
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                {{-- Left Side Of Navbar --}}
                <ul class="nav navbar-nav">
                    <li @if(Request::is('api/docs')) class="active" @endif>
                        <a href="{{ url('api/docs') }}">Algemene routering & info</a>
                    </li>
                    <li @if(Request::is('api/docs/trips')) class="active" @endif>
                        <a href="{{ url('api/docs/trips') }}">Ritten</a>
                    </li>
                    <li @if(Request::is('api/docs/profile')) class="active" @endif>
                        <a href="{{ url('api/docs/profile') }}">Profiel</a>
                    </li>
                    <li @if(Request::is('api/docs/bugs')) class="active" @endif>
                        <a href="{{ url('api/docs/bugs')  }}">Bugs</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">{!! Auth::user()->name !!}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-3 col-md-3 col-xs-3"> {{-- Side navigation --}}
                <div class="panel panel-default">
                    <div class="panel-heading">Onderwerpen:</div>

                    <div class="list-group">
                        @if(Request::is('api/docs/trips'))

                            <a class="list-group-item" href="">Aanmaken van een rit</a>
                            <a class="list-group-item" href="">Aanpassen van een rit</a>
                            <a class="list-group-item" href="">Verwijderen van een rit</a>

                        @elseif(Request::is('api/docs'))

                            <a class="list-group-item" href="#algemeen">Algemeen</a>
                            <a class="list-group-item" href="#authencatie">Authencatie</a>
                            <a class="list-group-item" href="#routering">Routering</a>
                            <a class="list-group-item" href="#copyright">Copyright</a>

                        @elseif(Request::is('api/docs/profile'))

                            <a class="list-group-item" href="">Jouw profiel.</a>
                            <a class="list-group-item" href="">Jouw gegevens wijzigen</a>

                        @elseif(Request::is('api/docs/bugs'))

                            <a class="list-group-item" href=""></a>

                        @endif
                    </div>
                </div>
            </div> {{-- /Side navigation --}}

            <div class="col-sm-9 col-md-9 col-lg-9 col-xs-9" style="margin-bottom: 20px;"> {{-- Content --}}
                @if(Request::is('api/docs'))

                    <div style="margin-top: -20px;" class="page-header">
                        <h2>Algemene routering &amp; info</h2>
                    </div>

                    {{-- Includes --}}
                    @include('apidocs.general.note')
                    @include('apidocs.general.authencation')
                    @include('apidocs.general.routing')
                    @include('apidocs.general.license')
                    {{-- /Includes --}}

                @elseif('api/docs/trips')

                @endif
            </div> {{-- /Content --}}
        </div>
    </div>

    {{-- JavaScripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    </body>
</html>
