@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="panel panel-default col-xs-12">
                <!-- cabecera de la pagina -->
                <div class="panel-heading col-xs-12 col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1 " >
					<div class="col-xs-12  col-md-4 col-md-offset-1">
						<!--Foto de prefil-->
						<img src="../img/user.jpg " class="imagen ">
					</div>
					 <a href="{{ url('/empresa/perfil/editar') }}"><img src="/img/editar.png" class="enlaceeditar"></a>
					<div class="datosPrincipales col-xs-12 col-md-6 "> 
						<h1>{{ $usuario['nombre'] }}</h1>
						<br/>
						<label>CIF : {{ $usuario['cif'] }}</label>
						<br/>
						<label>Domicilio : {{ $usuario['domicilio'] }}</label>
						<br/>
						<label>Telefono : {{ $usuario['tlf'] }}</label>
						<br/>
						<label>Email: {{ $usuario['email'] }}</label>
						<br/>
						<label>Web : {{ $usuario['web'] }}</label>
						<br/>
						<label>Sector: {{ $usuario['sector'] }}</label>
						<br/><br/><br/>
					</div>
				</div>
			</div>	
			<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">

				<div class="datosSecundarios">
					<br/>
					<!--Div donde vamos a poner la persona de contacto de la empresa-->
					<h2>Persona de contacto</h2>
					<label>Nombre : {{ $usuario['nombreContacto'] }}</label>
					<br/>
					<label>Cargo : {{ $usuario['cargoContacto'] }}</label>
					<br/>
					<label>Telefono:{{ $usuario['tlfContacto'] }}</label>
					<br/>
					<label>Email: {{ $usuario['emailContacto'] }}</label>
					<br/>
				</div>
			</div>	
			<a href="/" class="col-md-2 col-md-offset-5 botonDefecto">Volver</a>
        
        </div>
    </div>
</div>
@endsection
