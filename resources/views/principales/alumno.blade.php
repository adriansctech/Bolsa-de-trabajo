@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="col-xs-12  col-md-12  panel-heading" >
                    <div class="col-xs-12  col-md-4 col-md-offset-1">
                        <img src="{{ $usuario['foto'] }}" class="imagen" >
                    </div>
                    <div class=" datosuser">
                        <label class="labelnombre">{{ $usuario['nombre'] }} {{ $usuario['apellidos'] }}</label>
                        <br>
                        <label class="labelcorreo">{{ $usuario['email'] }}</label>
                    </div>
                    <a href="{{ url('/alumno/perfil/editar') }}"><img src="img/editar.png" class="enlaceeditar"></a>
                    <a href="{{ url('/alumno/perfil') }}"><img src="/img/ver.png" class="enlaceeditar"></a>
                </div>
                <!-- contenido de la pagina -->
                <div  class="panel-body ofertas col-md-12 mrg-btn25">
                   @foreach( $ofertas as $oferta )

                   <a href="/oferta/{{$oferta['id']}}">
                    <div class="oferta">
                        
                        <h2>Puesto: {{$oferta['puesto']}}</h2>
                        <h3>Descripción: {{$oferta['descripcion']}}</h3>
                        <h3>Contrato: {{$oferta['contrato']}}</h3>
                        <h3>Empresa: {{$oferta->Empresa->nombre}}</h3>
                    </div>
                    </a>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
