@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="panel panel-default ">
                <!-- cabecera de la pagina -->
                <div class="panel-heading col-md-10 col-md-offset-1 " >
	                <h1>Perfil en edición</h1>
					<form action="{{ url('/empresa/perfil') }}" method="POST">
					{{ csrf_field() }}
					<div class="col-xs-10 col-sm-offset-1 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1">
						<!--Foto de prefil-->
						<img src="{{$usuario['logo']}}" class="imagen ">
					</div>

					<div class="datosPrincipales col-xs-12 col-sm-6 col-md-6 "> 
						<!-- Datos de la empresa parte 1-->
						<label for="name">Nombre:</label>
						<input type="text" name="nombre" id="name" value="{{ $usuario['nombre'] }}">
						<br/>
						<label for="CIF">CIF</label>
						<input type="text" name="cif" id="CIF" value="{{ $usuario['cif'] }}">
						<br/>
						<label for="address">Domicilio</label>
						<input type="text" name="domicilio" id="address" value="{{ $usuario['domicilio'] }}">
						<br/>
						<label for="phone">Telefono</label>
						<input type="tel" name="tlf" size="9" id="phone" value=" {{ $usuario['tlf'] }}">
						<br/>
						<label for="email">Email</label>
						<input disabled type="email" name="email" id="email" value="{{ $usuario['email'] }}">
						<br/>
						<label for="web">Web</label>
						<input name="web" id="web" value="{{ $usuario['web'] }}">
						<br/>
						<label for="sector">Sector</label>
						<input type="text" name="sector" id="sector" value="{{ $usuario['sector'] }}">
						<br/>
					</div>
				</div>
				<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">

					<div class="cambioContraseña">
						 <!--Div en el que permite cambiar la contraseña-->
						<label>Cambio de contraseña</label>
						<br/> 
						<label for="actualpass">Contraseña actual:</label>
						<input type="password" name="contraseñaActual" id="actualpass"> 
						<br/>
						<label for="newpass">Nueva Contraseña:</label>
						<input type="password" name="nuevaContraseña" id="newpass">
						<br/>
						<label for="repeatpass">Repite la contraseña:</label>
						<input type="password" name="repeticionContraseña" id="repeatpass">
						<br/><br/><br/>
					</div> 
					
					<div class="datosSecundarios">
						<br/>
						<!--Div donde vamos a poner la persona de contacto de la empresa-->
						<h2>Persona de contacto</h2>
						<label for=contactname>Nombre :</label>
						<input type="text" name="nombreContacto" id="contactname" value="{{ $usuario['nombreContacto'] }}">
						<br/>
						<label for="contactposition">Cargo :</label>
						<input type="text" name="cargoContacto" id="contactposition" value="{{ $usuario['cargoContacto'] }}">
						<br/>
						<label for="contactphone">Telefono</label>
						<input type="tel" name="tlfContacto" id="contactphone" value="{{ $usuario['tlfContacto'] }}">
						<br/>
						<label for="contactemail">Email</label>
						<input type="email" name="emailContacto" id="contactemail" value="{{ $usuario['emailContacto'] }}">
						<br/>
					</div>

					<input type="submit" name="guardar" value="Guardar" class="botonDefecto">
					</form>
				</div>
		</div>
	</main>
		
</div>

@endsection
