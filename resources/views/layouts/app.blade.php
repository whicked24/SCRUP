<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scrup.css') }}" rel="stylesheet">
       <link href="{{ asset('css/bootstarp-select.css') }}" rel="stylesheet">
    @yield('extraCss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
            
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                   
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
      
                        @else
                            <li>
                                <a href="{{ url('/') }}">Inicio</a>
                            </li>
                              <li>
                                 <a href="{{ route('censoListar') }}">Censo Poblacional</a>
                            </li>
<<<<<<< HEAD

=======
                
>>>>>>> 0f7a488e1084cde4ae46d7288d8152323ce7384f
                            <li>
                                <a href="{{ route('listadoJornadas') }}">Jornadas</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" rolw="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Planillas
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ asset('pdf/Carta_residencia.pdf') }}" target="_blank">Carta de residencia</a>
                                    </li>
                           
                                    <li>
                                        <a href="{{ asset('pdf/postulacion.pdf') }}" target="_blank">Carta de postulación de candidato</a>
                                    </li>

                                     <li>
                                        <a href="{{ asset('pdf/postulacion.pdf') }}" target="_blank">Carta de postulación de vocero</a>
                                    </li>

                                        </ul>
                            </li>
                       
                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" rolw="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Estadísticas
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('EstadisticaGlobal') }}">Globales</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('EstadisticaIndividual') }}">Individuales</a>
                                    </li>
                                </ul>
                            </li>
                                <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" rolw="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                   Administración
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('listarAnimales') }}">Animales</a>
                                    </li>
                                       <li>
                                        <a href="{{ route('listarEnfermedades') }}">Enfermedades</a>
                                    </li> 
                                    <li>
                                        <a href="{{ route('listarPlagas') }}">Plagas</a>
                                    </li>
                                    @if (Auth::user()->type == 1)                
                                    <li>
                                        <a href="{{ route('usuariosListar') }}">Usuarios</a>
                                    </li>
                                    @endif
                                      <li>
                                        <a href="{{ route('listarTipo') }}">Tipo Jornadas</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Usuario
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           {{ Auth::user()->name }} Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

<<<<<<< HEAD
    <!-- Scripts -->


=======
<!-- Scripts 
>>>>>>> 0f7a488e1084cde4ae46d7288d8152323ce7384f
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.js') }}"></script>

<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
<<<<<<< HEAD
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/validata_data_form.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>


=======
<script src="{{ asset('js/validata_data_form.js') }}"></script>
-->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
   
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('js/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/validata_data_form.js') }}"></script>
>>>>>>> 0f7a488e1084cde4ae46d7288d8152323ce7384f

    @yield('extraScript')
</body>
</html>
