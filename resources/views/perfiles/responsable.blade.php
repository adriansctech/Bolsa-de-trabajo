@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default">            
                <div class="col-xs-12  col-md-12  panel-heading" >
                	<div class="col-xs-12  col-md-4 col-md-offset-1">
						<img src="/img/user.jpg " class="imagen ">
                	</div>
                	 <a href="{{ url('/responsable/perfil/editar') }}"><img src="/img/editar.png" class="enlaceeditar"></a>
                	<div class="col-xs-12  col-md-6 datosuser "> 
						<h1>{{$usuario['nombre']}}</h1>
						<br/>
						<label>Telefono: {{$usuario['tlf']}}</label>
						<br/>
						<label>Email : {{$usuario['email']}}</label>
						<br/>	

					</div>

                </div>

            </div>
            <a href="/" class="col-md-2 col-md-offset-5 botonDefecto"> Volver </a>
        </div>
    </div>            

	<!--<div class="Principal">
		<h1>Perfil en edición</h1>
		<form action="" method="">
			<div class="imagen">
				
				<img src="../img/user.jpg">
			</div>

			<div class="datosPrincipales"> 
				
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
			<input type="submit" name="guardar" value="Guardar">

		</form>
	</div>-->
</div>
@endsection
