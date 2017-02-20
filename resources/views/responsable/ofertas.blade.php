@extends('layouts.app')

@section('content')

<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="col-xs-12 panel panel-default"> 
                <div class="col-xs-12  col-md-12  panel-heading" >
					<h1>Ofertas por confirmar:</h1>
				</div>
			</div>
			<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">
			@if($ofertas->isEmpty())
			<!--Esta clase esta en CSSPrincipal-->
				<div class="notificacionlistados">
					<p>Por ahora no tienes ofertas para confirmar</p>
				</div>
			@else
			<!--Estas 2 clases estan en paginas_principales_usuarios.less-->
				<div class="listado">

					@foreach( $ofertas as $oferta )
					<a href="/responsable/oferta/{{$oferta['id']}}">
						<div class="oferta">
							<p>Puesto: {{$oferta->puesto}}</p>
							<p>Contrato: {{$oferta->contrato}}</p>
							<p>Descripción: {{$oferta->descripcion}}</p>
							<p>Empresa: {{$oferta->cif}}</p>
						</div>
					</a>
						@endforeach	
					

				</div>
			@endif
			
			<br/>
			<a href="/" class="col-md-2 col-md-offset-5 botonDefecto"> Volver </a>
			</div>
		</div>
	</div>
</div>						
@endsection
