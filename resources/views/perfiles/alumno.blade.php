@extends('layouts.app')

@section('content')
<div id="wrapper">
	<main>
		<div class="container contenido">
			<div class="row">
				<div class="Principal">
					<div >
						<!--Foto de prefil-->
						<img src="/img/user.jpg" class="imagen">
					</div>
					<!-- DATOS PRINCIPALES -->
					<div class="datosPrincipales"> 
						<h1>{{ $usuario['nombre'] }} {{ $usuario['apellidos'] }}</h1><!--Aqui cargariamos el nombre y los apellidos del usuario Alumno-->
						<br/>
						<label>Domicilio: {{ $usuario['domicilio'] }}</label>
						<br/>
						<label>Email: {{ $usuario['email'] }}</label>
						<br/>
						<label>Telefono: {{ $usuario['telefono'] }}</label>
						<br/><br/><br/><br/><br/><br/><br/>
					</div>
					<!-- CICLOS -->
					<div class="ciclosCursados">
						<h2>Ciclos cursados:</h2>
						<!--Div en el que cargamos los ciclos que ha marcado el alumno como que los ha cursado-->
						<h3>Ciclo_x</h3>
						<label>Fecha finalizacion: 00/00/00</label>
						<br/>
						<label>Nota ciclo: 00</label>
						<br/>
						<label>Empresa de las FCT: empresa</label>
						<br/>
						<hr>
					</div>
					<!-- DATOS SECUNDARIOS -->
					<div class="datosSecundarios">
						<!--Div de los idiomas, opcion de trabajar fuera y CV-->
						<span>Selecciona los idiomas con sus niveles</span><br/>
						<label>Idiomas:</label>
							<ul>
								<li>idioma1 nivel</li>
								<li>idioma2 nivel</li>
								<li>idioma3 nivel</li>
							</ul>
						<br/>
						@if($usuario['trabajoFuera'] == 0)
							<label>Con opción a trabajar fuera: NO</label>
							<br/>
						@else
							<label>Con opción a trabajar fuera: SI</label>
							<br/>
						@endif
						<label>Currículum Vitae: {{ $usuario['cv'] }}</label>
						<br/>
					</div>
					<br/><br/><br/>	
				</div>
			</div>	
		</div>
	</main>
</div>	
@endsection		