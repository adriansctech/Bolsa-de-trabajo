@extends('layouts.app')

@section('content')
<div id="wrapper">
		<main>
			<div class="Principal">
				<h1>Perfil en edición</h1>
				<form action="" method="">
					<div class="imagen">
					<!--Foto de prefil-->
						<img src="../img/user.jpg">

					</div>

					<div class="datosPrincipales"> 
						<!-- Datos del alumno parte 1-->
						<label>Nombre:</label>
						<input type="text" name="nombre" value="{{ $usuario['nombre'] }}">
						<br/>
						<label>Apellidos</label>
						<input type="text" name="apellidos" value="{{ $usuario['apellidos'] }}">
						<br/>
						<label>Domicilio</label>
						<input type="text" name="domicilio" value="{{ $usuario['domicilio'] }}">
						<br/>
						<label>Email</label>
						<input type="email" name="email" value="{{ $usuario['email'] }}">
						<br/>
						<label>Telefono</label>
						<input type="tel" name="telefono" size="9" value="{{ $usuario['telefono'] }}">
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

					<div class="ciclos">
						<label>Ciclos cursados en Batoi</label>
						<!--Checbox con todos los ciclos de batoy-->
						<div id="ciclosBatoy">
							<input type="checkbox" name="ciclo" value="ciclo1">ciclo1 <br>
							<input type="checkbox" name="ciclo" value="ciclo2" checked> ciclo2<br>					
						</div>
					</div>

					<div class="ciclosCursados">
						<h4>Datos opcionales</h4>
						<div class="masInfo">
						<span class="adicional"><small>Añade un poco más de información sobre ti para que las empresas puedan <br/> encontrarte más facilmente y contactar contigo.</small></span>
						</div>
						<!--Div en el que cargamos los ciclos que ha marcado el alumno como que los ha cursado-->
						<h3>Ciclo_x</h3>
						<label>Fecha finalizacion:</label>
						<input type="date" name="finCiclo_x">
						<br/>
						<label>Nota ciclo:</label>
						<input type="number" name="notaCiclo_x">
						<br/>
						<label>Empresa de las FCT:</label>
						<input type="text" name="FCTCiclo_x">
						<br/>
						<hr>
					</div>

					<div class="datosSecundarios">
						<!--Div de los idiomas, opcion de trabajar fuera y CV-->
						<span>Selecciona los idiomas con sus niveles</span><br/>
						<label>Idiomas:</label>
						<select>
						  <option value="volvo" selected>Selecciona </option>
						</select>
						<br/>
						<label>Con opción a trabajar fuera:</label>
						@if($usuario['trabajoFuera'] == 0)
							<input type="checkbox" name="trabajoFuera" value="1">Si
							<input type="checkbox" name="trabajoFuera" value="0" checked>No
						@else
							<input type="checkbox" name="trabajoFuera" value="1" checked>Si
							<input type="checkbox" name="trabajoFuera" value="0">No
						@endif
						<br/>
						<label>Enlaza tu CV:</label>
						<input type="trabajoFuera" name="enlaceCV" value="{{ $usuario['cv'] }}">
						<br/>
					</div>

					<input type="submit" name="guardar" value="Guardar" class="botonDefecto">

				</form>
			</div>
		</main>		
	</div>	
	@endsection	