@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-1 panel-heading" >
                    <div class="col-xs-12 col-md-4 col-md-offset-1">
                        <img src="img/user.jpg" class="imagen">
                        <div class="col-xs-12 col-md-6 datosPrincipales">
                            <label id="labelNombre">Nombre Apellido1 Apellido2</label><br>
                            <label id="labelCorreo">usuario@gmail.com</label>
                        </div>
                        <img src="img/editar.png" class="enlaceeditar">
                    </div> 
                </div>
                 <div>                    
                    <div>
                        <input type="submit" value="Confirmar alumnos">
                        <input type="submit" value="Confirmar ofertas">
                    </div>
                    <div>
                        <input type="submit" value="Dar de alta empresa">
                        <input type="submit" value="Listar empresas">  
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</div>
@endsection
