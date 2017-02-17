@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1 ajustes">
            <div class="panel panel-default ">
                <!-- cabecera de la pagina -->
                <div class="panel-heading " >
                    <div class="infouser  ">
                        <img src="{{$usuario['logo']}}" class="fotouser">
                        <div class="datosuser">
                            <label class="labelnombre col-md-12 col-xs-12">{{ $usuario['nombre'] }}</label>
                            <label class="labelcorreo col-md-12 col-xs-12">{{ $usuario['email'] }}</label>
                            <label class="labelWeb col-md-12 col-xs-12">{{ $usuario['web'] }}</label>
                        </div>
                        <a href="{{ url('/empresa/perfil/editar') }}"><img src="img/editar.png" class="enlaceeditar"></a>
                        <a href="{{ url('/empresa/perfil') }}"><img src="/img/ver.png" class="enlaceeditar"></a>
                    </div>
                </div>
                 
                <!-- contenido de la pagina -->
                <div class="panel-body ofertas col-md-12 mrg-btn25">
<<<<<<< HEAD
                    <div class="col-md-4 col-md-offset-5">

                        <a href="empresa/nuevaOferta" class="añadiroferta">Añadir oferta</a>
=======
                    <div class="row">
                        <div class="col-md-2 col-md-offset-10">

                            <a href="empresa/nuevaOferta" class="botonSalir">Añadir oferta</a>

                        </div>
                    </div>
                    <div class="ofertas col-md-12">
                        <h2 class="titulo" >Ofertas disponibles</h2>
                        <p class="informacion">descripcion</p>
                        @foreach( $ofertas as $oferta )
                        <a href="/oferta/{{$oferta['id']}}">
                         <div class="oferta">
                        <hr/>
                        <h2>Puesto:</h2>
                         <p>{{$oferta['puesto']}}</p>
>>>>>>> 0c372f00c4494d08937a3b303c68e44f2ea9f34c

                     </div>
                    
                    <h1>Ofertas</h1>
                    @foreach( $ofertas as $oferta )
                    <a href="/oferta/{{$oferta['id']}}">
                        <div class="oferta">
                            
                            <h2>Puesto: {{$oferta['puesto']}}</h2>

                            <h2>Descripción: {{$oferta['descripcion']}}</h2>

                            <h2>Contrato: {{$oferta['contrato']}}</h2>

                            <h2>Empresa: {{$oferta['cif']}}</h2>
                        </div>
                    </a>
                    @endforeach
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
