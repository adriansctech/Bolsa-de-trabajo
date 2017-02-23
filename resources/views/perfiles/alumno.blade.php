@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="panel panel-default col-xs-12">
                <!-- cabecera de la pagina -->
                <div class="panel-heading col-xs-12 col-md-10 col-md-offset-1 " >
					<div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1">
						<!--Foto de prefil-->
						<img src="/img/user.jpg " class="imagen ">
					</div>
					 <a href="{{ url('/alumno/perfil/editar') }}"><img src="/img/editar.png" class="enlaceeditar"></a>
					<div class=" col-xs-12 col-sm-5 col-md-6 datosuser "> 
						<h1>{{ $usuario['nombre'] }} {{ $usuario['apellidos'] }}</h1><!--Aqui cargariamos el nombre y los apellidos del usuario Alumno-->
						<br/>
						<label>Domicilio: {{ $usuario['domicilio'] }}</label>
						<br/>
						<label>Email: {{ $usuario['email'] }}</label>
						<br/>
						<label>Telefono: {{ $usuario['telefono'] }}</label>
				
					</div>
				</div>
			</div>			
				<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">
					<!-- CICLOS -->
					<div class="ciclosCursados">
			
				
			
			
						<h2>Ciclos cursados:</h2>
						<!--Div en el que cargamos los ciclos que ha marcado el alumno como que los ha cursado-->
						<label>Ciclos cursados en Batoi</label>
							@foreach ($ciclosAlumno as $clicloAlumno)
							<ul>
								<li>{{$clicloAlumno->ciclo}} <br> 
									Fecha de inicio: {{$clicloAlumno->finicio}} <br>
									Fecha fin: {{$clicloAlumno->ffin}} <br>
									Nota: {{$clicloAlumno->nota}} <br>
									Empresa de prácticas: {{$clicloAlumno->empresa}}
								</li>
							</ul>
							@endforeach
					</div>
					
					<!-- DATOS SECUNDARIOS -->
					<div class="datosSecundarios">

						<!--Div de los idiomas, opcion de trabajar fuera y CV-->
						<label>Idiomas:</label>
						@foreach ($idiomas as $idioma)
							<ul>
								<li>{{$idioma->idioma}} - {{$idioma->nivel}}</li>
							</ul>
						@endforeach

						@if($usuario['trabajoFuera'] == 0)
							<label>Con opción a trabajar fuera: NO</label>
							<br/>
						@else
							<label>Con opción a trabajar fuera: SI</label>
							<br/>
						@endif
						<label>Currículum Vitae: {{ $usuario['cv'] }}</label>
						<br/>
						<a href="/" class="col-md-2 col-md-offset-5 botonDefecto">Volver</a>
					</div>
					
				</div>
				<br/><br/><br/>	
			</div>
			
		</div>
	</main>
</div>	
@endsection		
