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
                    <img src="/img/editar.png" class="enlaceeditar">
                    <div class="datosPrincipales col-xs-12 col-md-6 "> 
                            <label id="labelNombre">{{ $usuario['nombre'] }}</label><br>
                            <label id="labelCorreo">{{ $usuario['email'] }}</label>
                        </div>
                    </div> 
                </div>
                 <div class="divresponsable">                    
                    
                    <input class="col-xs-12  col-md-5 col-md-offset-1 botonesprincipalesresponsable" type="submit" value="Confirmar alumnos">
                    <input class="col-xs-12  col-md-5 botonesprincipalesresponsable" type="submit" value="Confirmar ofertas">
                
                    <input class="col-xs-12  col-md-5 col-md-offset-1 botonesprincipalesresponsable" type="submit" value="Dar de alta empresa">
                    <input class="col-xs-12  col-md-5 botonesprincipalesresponsable" type="submit" value="Listar empresas">  
                    <br/>
                </div>                  
            </div>
        </div>
    </div>
</div>
@endsection
