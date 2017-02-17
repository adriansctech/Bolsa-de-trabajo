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
						<h1>Nombre de la empresa</h1>
						<br/>
						<label>CIF : 'cif de la empresa'</label>
						<br/>
						<label>Domicilio : 'direccion de la sede de la empresa</label>
						<br/>
						<label>Telefono : 'telefono de la empresa'</label>
						<br/>
						<label>Email: 'email de la empresa'</label>
						<br/>
						<label>Web : 'web de la empresa'</label>
						<br/>
						<label>Sector: 'sector de la empresa'</label>
						<br/><br/><br/>
					</div>
				</div>
			</div>	
			<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">

				<div class="datosSecundarios">
					<br/>
					<!--Div donde vamos a poner la persona de contacto de la empresa-->
					<h2>Persona de contacto</h2>
					<label>Nombre : 'nombre de la persona de contacto'</label>
					<br/>
					<label>Cargo : 'cargo de la persona'</label>
					<br/>
					<label>Telefono: 'telefono'</label>
					<br/>
					<label>Email: 'email'</label>
					<br/>
				</div>
			</div>	
			<a href="/" class="col-md-2 col-md-offset-5 botonDefecto">Volver</a>
        
        </div>
    </div>
</div>
@endsection