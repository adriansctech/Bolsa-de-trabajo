@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="panel-heading"  >
                    <div class="infouser">
                        <img src="{{ $usuario['foto'] }}" class="fotouser" >
                        <div class="datosuser">
                            <label class="labelnombre">{{ $usuario['nombre'] }} {{ $usuario['apellidos'] }}</label>
                            <br>
                            <label class="labelcorreo">{{ $usuario['email'] }}</label>
                        </div>
                        <a href="{{ url('/alumno/perfil/editar') }}"><img src="img/editar.png" class="enlaceeditar"></a>
                    <a href="{{ url('/alumno/perfil') }}"><img src="/img/ver.png" class="enlaceeditar"></a>
                    </div>
                </div>
                <!-- contenido de la pagina -->
                <div  class="panel-body ofertas">
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
