<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Landing Page - Proyecto Inicial</title>
        <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">
    </head>

    <body>
        <nav id="main-nav"> 
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/nosotros') }}">Nosotros</a></li>
                <li><a href="{{ url('/mascotas') }}">Mascotas</a></li>
                <li><a href="{{ url('/servicios') }}">Servicios</a></li>
                <li><a href="{{ url('/citas') }}">Citas</a></li>
            </ul>
        </nav>


    @yield('content') @section('content')
    </body>
</html>