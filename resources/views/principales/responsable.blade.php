@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="panel-heading" >
                    <div class="infouser">
                        <img src="img/user.jpg" class="fotouser">
                        <div class="datosuser">
                            <label class="labelnombre">{{ $usuario['nombre'] }} {{ $usuario['apellidos'] }}</label>
                            <label class="labelcorreo">{{ $usuario['email'] }}</label>
                        </div>
                        <img src="img/editar.png" class="enlaceeditar">
                    </div>
                </div>
                <!-- contenido de la pagina -->
                <div class="panel-body ofertas">
                    <div class="oferta">
                        <h2 class="tituloofertas">Ofertas disponibles</h2>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
