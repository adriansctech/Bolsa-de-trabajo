@extends('layouts.app')

@section('content')

<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default"> 
                <div class="col-xs-12  col-md-12  panel-heading" >
					<h1>Alumnos por confirmar:</h1>
				</div>
			</div>
			<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">
			@if($alumnos->isEmpty())
			<!--Esta clase esta en CSSPrincipal-->
				<div class="notificacionlistados">
					<p>Por ahora no tienes alumnos para confirmar</p>
				</div>
			@else
				<!--Estas 2 clases estan en paginas_principales_usuarios.less-->
				 @foreach( $alumnos as $alumno )
				 <a href="/responsable/alumno/{{$alumno['email']}}">
					<div class="listado">
						<div class="alumno">
						<h2>Nombre: {{ $alumno['nombre'] }} {{ $alumno['apellidos'] }}</h2>
						</div>
					</div>
				</a>
				 @endforeach	
			@endif
			<br/>
			<a href="/" class="col-md-2 col-md-offset-5 botonDefecto"> Volver </a>
			</div>
		</div>
	</div>
</div>						
@endsection
