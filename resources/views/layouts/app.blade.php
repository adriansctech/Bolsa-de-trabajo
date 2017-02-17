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
    <link rel="icon" type="image/png" href="/img/Gris_Blan_Curt_Text.jpg" sizes="32x32"/>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel='stylesheet/less' type='text/css' href="/css/media.css" />
    <link rel='stylesheet/less' type='text/css' href="/css/custom.less" /> 
    <link rel='stylesheet/less' type='text/css' href="/css/paginas_principales_usuarios.less" />    
    <link rel='stylesheet/less' type='text/css' href="/css/style.less" />
    
    <link rel='stylesheet/less' type='text/css' href="/css/cssPrincipal.less" />

    <!-- Scripts -->
    <!--<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>-->
</head>
<body>
    <header >
        <!--<div id="app">-->
        <div class="row">
            <div class="col-xs-2 col-xs-offset-1 col-md-2 col-md-offset-2">
                <a href="{{ url('/') }}">
                    <img src="/img/Gris_Blan_Curt_Text.jpg" alt="Logotipo de batoi" class="imagenEncabezado">
                </a>
            </div>
            <div >
                @if (Auth::guest())
                    <ul class="col-xs-9 col-md-2 col-md-offset-4">
                        <li class="listaencabezado ">
                            <a href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="listaencabezado ">
                            <a href="{{ url('/register') }}">Register</a>
                        </li>
                    </ul>
                    
                @else                           
                   <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                            class="dropdown-menu"
                        </a>-->
                        <ul class="col-md-2 col-md-offset-4" role="menu">
                            <li class="botonSalir">
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
                   <!-- </li>-->
                @endif
            </div>
            <hr class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
        </div>
        
    </header>
    
        <!--</div>       -->

        @yield('content')
    </div>
    <footer class="col-xs-12 col-md-12 ">
        <hr class=" col-md-10 col-md-offset-1">
        <div class="datosBatoi col-xs-12 col-md-3 col-md-offset-1">
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
    <script src="/js/app.js"></script>
    <script src="/js/less.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
