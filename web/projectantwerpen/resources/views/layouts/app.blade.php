
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PinAnt</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('A_logo_200_RGB_NEG_123X123.jpg') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('jquery-ui/jquery-ui.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/timeline.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                                
                <a href="{{ url('/home') }}" id="div-brand-image">    
                    <img src="{{ URL::asset('images/logo_antwerpen/Eenkleurig_A-logo_RGB_NEG/JPEG/123x123/A_logo_200_RGB_NEG_123X123.jpg') }}" alt="" id="brand-image">
                </a>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    PinAnt
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/projecten') }}">Projecten</a></li>
                </ul>

                


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Inloggen</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @if ( Auth::user()->isAdmin() )
                                    <li><a href="{{ url('/projectslist') }}">Projectlist</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Uitloggen</a></li>
                            </ul>
                        </li>
                    @endif

                    <li id="li_search">
                        <form class="navbar-form" action="/search" method="get" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Wat zoekt u?" name="q">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="footer navbar-fixed-bottom">
        <div class="container">
            <span class="left">
                <p>Team Bananas</p>
            </span>
            <span class="right">
                <p>Project Antwerpen</p>
            </span>
        </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/jquery.mobile.custom.min.js') }}"></script>
    <script src="{{ URL::asset('jquery-ui/jquery-ui.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/base.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
