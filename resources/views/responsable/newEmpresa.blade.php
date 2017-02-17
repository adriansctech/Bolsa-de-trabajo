@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">
                <!-- cabecera de la pagina -->
                <form action="" method="">
	                <div class="col-xs-12  col-md-12  panel-heading" >
						<h1>Alta de empresa</h1>
					
						<div class="col-xs-12  col-md-4 col-md-offset-1">
							<!--Foto de prefil-->
							<img src="/img/user.jpg" class="imagen">
						</div>
						<div class="col-xs-12 col-md-6  datosPrincipales"> 
							<!-- Datos de la empresa parte 1-->
							<label for="name">Nombre:</label>
							<input type="text" name="nombre" id="name">
							<br/>
							<label for="CIF">CIF</label>
							<input type="text" name="cif" id="CIF">
							<br/>
							<label for="address">Domicilio</label>
							<input type="text" name="domicilio" id="address">
							<br/>
							<label for="phone">Telefono</label>
							<input type="tel" name="telefono" size="9" id="phone">
							<br/>
							<label for="email">Email</label>
							<input type="email" name="email" id="email">
							<br/>
							<label for="web">Web</label>
							<input type="url" name="web" id="web">
							<br/>
							<label for="sector">Sector</label>
							<input type="text" name="sector" id="sector">
							<br/>
						</div>
					</div>
					<div class="panel-body col-md-12 mrg-btn25">
						<div class="cambioContraseñaalumno">
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
							
						</div> 

						<div class="datosSecundarios col-md-12 mrg-btn25">
							<br/>
							<!--Div donde vamos a poner la persona de contacto de la empresa-->
							<h2>Persona de contacto</h2>
							<label for="contactname">Nombre :</label>
							<input type="text" name="nombrePC" id="contactname">
							<br/>
							<label for="contactposition">Cargo :</label>
							<input type="text" name="cargoPC"  id="contactposition">
							<br/>
							<label for="contactphone">Telefono</label>
							<input type="tel" name="telefonoPC" id="contactphone">
							<br/>
							<label for="contactemail">Email</label>
							<input type="email" name="emailPC" id="contactemail">
							<br/>
						</div>

						<input type="submit" name="guardar" value="Guardar" class=" botonDefecto">
						<a href="/" class="botonDefecto">Cancelar</a>
					</div>	
				</form>
			</div>	
		</div>
	</div>
</div>
@endsection
	