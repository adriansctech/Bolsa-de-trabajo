@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- cabecera de la pagina -->
                <div class="panel-heading"  >
                </div>
            </div>
        </div>
    </div>            

	<div class="Principal">
		<h1>Perfil en edición</h1>
		<!--<form action="" method="">-->
			<div class="imagen">
				<!--Foto de prefil-->
				<img src="../img/user.jpg">
			</div>

			<div class="datosPrincipales"> 
				<!-- Datos del responsable -->
				<label>Nombre:</label>
				<input type="text" name="nombre">
				<br/>
				<label>Telefono</label>
				<input type="tel" name="telefono" size="9">
				<br/>
				<label>Email</label>
				<input type="email" name="email">
				<br/>				
			</div>



			<div class="cambioContraseña">
				 <!--Div en el que permite cambiar la contraseña-->
				<label>Cambio de contraseña</label>
				<br/> 
				<label>Contraseña actual:</label>
				<input type="password" name="contraseñaActual">
				<br/>
				<label>Nueva Contraseña:</label>
				<input type="password" name="nuevaContraseña">
				<br/>
				<label>Repite la contraseña:</label>
				<input type="password" name="repeticionContraseña">
				<br/><br/><br/>
			</div> 
			<input type="button" name="volver" value="Volver" class="col-md-2 col-md-offset-5 botonVolver">
			<!--<input type="submit" name="guardar" value="Guardar">-->

		<!--</form>-->
	</div>
</div>
@endsection
