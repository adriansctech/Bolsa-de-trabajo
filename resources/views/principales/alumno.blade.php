@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="panel-heading"  >
                    <div class="infouser">
                        <img src="img/user.jpg" class="fotouser" >
                        <div class="datosuser">
                            <label class="labelnombre">{{ $usuario['nombre'] }}</label>
                            <label class="labelcorreo">{{ $usuario['email'] }}</label>
                            <label class="labelWeb">{{ $usuario['web'] }}</label>
                        </div>
                        <img src="img/editar.png" class="enlaceeditar">
                    </div>
                </div>
                <!-- contenido de la pagina -->
                <div  class="panel-body ofertas">
                   
                    <div class="oferta">
                        <h2 class="tituloofertas">Ofertas disponibles</h2>
                        @foreach( $ofertas as $oferta )
                        <hr/>
                        <h2>Puesto:</h2>
                         <h3>{{$oferta['puesto']}}</h3>

                         <h2>Descripción:</h2>
                          <h3>{{$oferta['descripcion']}}</h3>

                          <h2>Contrato:</h2>
                           <h3>{{$oferta['contrato']}}</h3>

                           <h2>Empresa:</h2>
                            <h3>{{$oferta['cif']}}</h3>

                        @endforeach
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
