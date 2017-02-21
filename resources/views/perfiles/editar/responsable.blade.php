@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">  
                <div class="col-xs-12  col-md-12  panel-heading" >
                	<h1>Datos del responsable</h1>
                	<div class="col-xs-12  col-md-4 col-md-offset-1">
						<img src=src="{{$usuario['foto']}}" class="imagen ">
                	</div>                	
                	<div class="datosPrincipales cambioContraseña"> 
	                	<label for="nameR">Nombre:</label>
						<input type="text" name="nombre"  id="nameR" value="{{ $usuario['nombre'] }}">
						<br/>
						<label for="phoneR">Telefono: </label>
						<input type="tel" name="telefono" size="9" id="phoneR" value="{{ $usuario['tlf'] }}" >
						<br/>
						<label for="emailR">Email: </label>
						<input type="email" name="email" id="emailR" value="{{ $usuario['email'] }}" >
						<br/>
						<label for="apassR">Contraseña actual:</label>
						<input type="password" name="contraseñaActual" id="apassR" >
						<br/>
						<label for="npassR">Nueva Contraseña:</label>
						<input type="password" name="nuevaContraseña" id="npassR">
						<br/>
						<label for="rnpassR">Repite la contraseña:</label>
						<input type="password" name="repeticionContraseña" id="rnpassR">
						<br/><br/><br/>
						<input type="submit" name="guardar" value="Guardar" class="botonDefecto">	
                	</div>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection