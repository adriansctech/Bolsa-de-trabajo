@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="col-xs-12  col-md-12  panel-heading" >
                    <div class="col-xs-12  col-md-4 col-md-offset-1">
                        <img src="{{$usuario['logo']}}" class="imagen">
                    </div> 
                    <div class="datosuser">
                        <label class="labelnombre col-md-12 col-xs-12">{{ $usuario['nombre'] }}</label>
                        <label class="labelcorreo col-md-12 col-xs-12">{{ $usuario['email'] }}</label>
                        <label class="labelWeb col-md-12 col-xs-12">{{ $usuario['web'] }}</label>
                    </div>
                    <a href="{{ url('/empresa/perfil/editar') }}"><img src="img/editar.png" class="enlaceeditar"></a>
                    <a href="{{ url('/empresa/perfil') }}"><img src="/img/ver.png" class="enlaceeditar"></a>
                </div>
               
                 
                <!-- contenido de la pagina -->
                <div class="panel-body ofertas col-md-12 mrg-btn25">

                    <div class="col-md-4 col-md-offset-5">

                        <a href="empresa/nuevaOferta" class="añadiroferta">Añadir oferta</a>

                     </div>
                    
                    <h1>Ofertas</h1>
                    @foreach( $ofertas as $oferta )
                    <a href="/empresa/ofertaEmpresa/{{$oferta['id']}}">
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
