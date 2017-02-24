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
						<img src="../img/user.jpg " class="imagen ">
					</div>
					 <a href="{{ url('/alumno/perfil/editar') }}"><img src="/img/editar.png" class="enlaceeditar"></a>
					<div class="datosuser col-xs-12 col-sm-5 col-md-6 "> 
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
						@foreach ($ciclos as $ciclo)
						<h3>{{ $ciclo->Ciclo->ciclos}}</h3>
						<label>Fecha finalización: {{ $ciclo->ffin}}</label>
						<br/>
						<label>Nota: {{ $ciclo->nota}}</label>
						<br/>
						<label>Empresa de las FCT: {{ $ciclo->Ciclo->ciclos}}</label>
						<hr>
						@endforeach
					</div>
					
					<!-- DATOS SECUNDARIOS -->
					<div class="datosSecundarios">

						<!--Div de los idiomas, opcion de trabajar fuera y CV-->
						<span>Selecciona los idiomas con sus niveles</span><br/>
						<label>Idiomas:</label>

						@foreach ($idiomas as $idioma)
						
							<ul>
								<li>{{$idioma->Idioma->idioma}} {{$idioma->nivel}}</li>
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
						<form method="POST" action="{{ url('/responsable/alumnos') }}" class="col-md-2 col-md-offset-5 ">
							{{ csrf_field() }}
							<input hidden name="email" value="{{$usuario['email']}}">
							<button type="submit" class="col-md-12 botonDefecto">Confirmar</button>
						</form>
						<a href="/responsable/alumnos" class="col-md-2 col-md-offset-5 botonDefecto">Volver</a>
						
					</div>
				</div>

				<br/><br/><br/>	
			</div>
			
		</div>
	</main>
</div>	
@endsection		
