<!DOCTYPE html>


<html>
    <head>
        
    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                height: 100vh;
                margin: 0;
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
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    </head>

    <body>

        <header>

        <nav>
            <div class="nav-wrapper blue darken-3">
            <a href="{{route('start')}}" class="brand-logo"><i class="material-icons"><i></i>build</i>Agendamentos de Manutenção</a>
            <ul class="right">
                    @if (session('status'))
                    <li><a href="{{route('create_user')}}"><i class="material-icons">person_add</i></a></li>
                    @else
                    <li><a href="{{ route('create_user') }}"><i class="material-icons">arrow_upward</i></a></li>    
                    @endif
                <li><a href="{{route('agendamento')}}"><i class="material-icons">event</i></a></li>
                <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
                <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
            </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile">
            <li><a href="/">Home</a></li>

        </ul>

        </header>


