<!DOCTYPE html>

<html>
    <head>
        
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Asap', serif;
                height: 50vh;
                margin: 0;
            }
            .nav-wrapper {
                background-color: #DCD6C1 !important;
            }
    </style>
          
        <title>@yield('titulo')</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
       <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">    

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet" type="text/css">

    </head>

    <body>

        <header>

            <!-- Dropdown Structure -->
            <ul id="dropdown1" class="dropdown-content">
            
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a></li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
            </form>

            <li><a href="#!">two</a></li>
            <li class="divider"></li>
            <li><a href="#!">three</a></li>
            </ul>
            <nav>
            <div class="nav-wrapper">
                <a href="{{route('start')}}" class="brand-logo left"><i class="material-icons"><i></i>build</i>Agendamentos de Manutenção</a>
                <ul class="right">
                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
            </nav>

            <ul class="sidenav" id="mobile">
                <li><a href="/">Home</a></li>
            </ul>

        </header>


