@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="panel-heading" >
                    <img src="img/user.jpg" id="fotouser">
                    <div id="datosuser">
                            <label id="labelNombre">Nombre y Apellidos</label><br>
                            <label id="labelNombre"></label><br>  
                        <label id="labelCorreo">{{ $usuario['nombre'] }} {{ $usuario['apellidos'] }}</label>
                    </div>
                    <img src="img/editar.png" id="enlaceeditar">
                </div>
                <!-- contenido de la pagina -->
                <div class="panel-body">
                    <div id="ofertas">
                        <h2 id="tituloofertas">Ofertas disponibles</h2>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
