<!DOCTYPE html>
<html lang="en">
<head>
    <!-- metaetiquetas-->
    <meta charset="UTF-8">
    <meta name="author" content="aulaclic">
    <meta name="description" content="Bolsa de trabajo">
    <meta name="keywords" content="laravel, HTML5, JS, PHP, DAW">
    <meta name="application-name" content="Bolsa de trabajo" /> 
    <meta name="generator" content="Sublime text Editor" />
    <meta name="keywords" content="Javascript, web, cipfpbatoi, html" />    
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta http-equiv=""X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="lang" content="es-ES" />
    <meta name="viewport" content="width=device-width initial-scale=1.0" />
    <!-- favicon -->
    <link rel="icon" type="image/png" href="img/Gris_Blan_Curt_Text.jpg" sizes="32x32"/>
    <!--<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
    <!-- Titulo de la aplicacion -->
    <title>Bolsa de trabajo CIP de FP Batoi</title>

    <!-- Styles -->
    <!--<link href="/css/app.css" rel="stylesheet">-->
    <!--<link href="/css/cssPrincipal.css" rel="stylesheet">-->
    <link rel='stylesheet/less' type='text/css' href="css/cssPrincipal.less" />

    <!-- Scripts -->
    <!--<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>-->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navCustom">
            <div class="container">
                <div class="navbar-header">
                    
                    <!-- Collapsed Hamburger -->
                    <!--
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>-->

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        
                    </a>
                    <!-- Insertamos el logotipo de CIPFPBATOI -->
                    <img src="img/Gris_Blan_Curt_Text.jpg" alt="Logotipo de batoi" class="imagenEncabezado">
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
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
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>                                                       
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    <footer>
        <hr>
        <div class="datosBatoi">
            <small>CIP de FP Batoi, Carrer La Serreta, 5 (03802) Alcoi</small>
            <br/>
            <small>Tel.: 966 52 76 60, Fax: 966 52 76 61</small>
            <br/>
            <small>Correu electrònic: 03012165.secret@gva.es</small>
            <br/>
            <br/>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="js/app.js"></script>
    <script src="js/less.js"></script>
</body>
</html>
