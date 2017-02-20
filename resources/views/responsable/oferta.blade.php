@extends('layouts.app')

@section('content')


<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default"> 
                <div class="col-xs-12  col-md-12  panel-heading" >
               		 <!--En esta vista deberan aparecer todos los datos de la oferta-->
					<h1>{{ $oferta['puesto'] }}</h1>
				</div>
				<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">		
					<label>Ciclos :</label>

					<div id="ciclosBatoy ">
						<!--Aqui se cargaran los ciclos de la BD de esta oferta-->
						<ul>
						
							<li>ciclo</li>
							
						</ul>
					</div>

					<br/>
					<label>Idiomas requeridos</label><br/>
						<!--Aqui se cargaran todos los idiomas con sus niveles, que esten guardados en la BD de la oferta -->
						<ul>
							<li>idoma 1 nivel</li>
							<li>idoma 2 nivel</li>
							<li>idoma 3 nivel</li>
						</ul>
					<br/>
					<label>Tipo de contrato: {{$oferta['contrato']}}</label><br/><br/>
					
					<label>Descripción:</label><br/>
					
					<div class="descripcion">
						<p>{{$oferta['descripcion']}}</p>
					</div>

					<!--Estos datos se cargaran de la BD de Empresa-->
					<h2>Persona de contacto</h2>
					<label>Nombre : </label>
					<br/>
					<label>Cargo :</label>
					<br/>
					<label>Telefono: </label>
					<br/>
					<label>Email: </label>
					<br/>
					
					<a href="/" class="col-md-2 col-md-offset-5 botonDefecto"> Confirmar </a>
				</div>	
				<a href="/" class="col-md-2 col-md-offset-5 botonDefecto"> Volver </a>
			</div>
		</div>
	</div>
</div>
@endsection