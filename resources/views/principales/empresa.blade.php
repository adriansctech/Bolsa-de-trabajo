@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="panel panel-default ">
                <!-- cabecera de la pagina -->
                <div class="panel-heading " >
                    <div class="infouser  ">
                        <img src="img/user.jpg" class="fotouser">
                        <div class="datosuser">
                            <label class="labelnombre col-md-12 col-xs-12">{{ $usuario['nombre'] }}</label>
                            <label class="labelcorreo col-md-12 col-xs-12">{{ $usuario['email'] }}</label>
                            <label class="labelWeb col-md-12 col-xs-12">{{ $usuario['web'] }}</label>
                        </div>
                        <img src="img/editar.png" class="enlaceeditar">
                    </div>
                </div>
                <!-- contenido de la pagina -->
                <div class="panel-body ofertas col-md-12 ">
                    <div class="oferta col-md-12">
                        <h2 class="titulo" >Ofertas disponibles</h2>
                        <p class="informacion">descripcion</p>
                        @foreach( $ofertas as $oferta )
                        <hr/>
                        <h2>Puesto:</h2>
                         <p>{{$oferta['puesto']}}</p>

                         <h2>Descripción:</h2>
                          <p>{{$oferta['descripcion']}}</p>

                          <h2>Contrato:</h2>
                           <p>{{$oferta['contrato']}}</p>

                           <h2>Empresa:</h2>
                            <p>{{$oferta['cif']}}</p>

                        @endforeach
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
