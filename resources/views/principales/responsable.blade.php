@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="col-xs-12  col-md-12  panel-heading" >
                    <div class="col-xs-12  col-md-4 col-md-offset-1">
                        <!--Foto de prefil-->
                        <img src="{{ $usuario['foto'] }}" class="imagen ">
                    </div>
                    <a href="{{ url('/responsable/perfil/editar') }}"><img src="img/editar.png" class="enlaceeditar"></a>
                    <a href="{{ url('/responsable/perfil') }}"><img src="/img/ver.png" class="enlaceeditar"></a>
                    <div class="datosPrincipales col-xs-12 col-md-6 "> 
                            <label id="labelNombre">{{ $usuario['nombre'] }}</label><br>
                            <label id="labelCorreo">{{ $usuario['email'] }}</label>
                        </div>
                    </div> 
                </div>
                 <div class="divresponsable">                    
                    
                    <a class="col-xs-12  col-md-5 col-md-offset-1 botonesprincipalesresponsable" href="responsable/alumnos" >Confirmar alumnos</a>
                    <a class="col-xs-12  col-md-5 botonesprincipalesresponsable" href="responsable/ofertas" >Confirmar ofertas</a>
                
                    <a class="col-xs-12  col-md-5 col-md-offset-1 botonesprincipalesresponsable" href="responsable/empresas/new">Dar de alta empresa</a>
                    <a class="col-xs-12  col-md-5 botonesprincipalesresponsable" href="responsable/empresas"> Listar empresas</a> 
                    <br/>
                </div>                  
            </div>
        </div>
    </div>
</div>
@endsection
