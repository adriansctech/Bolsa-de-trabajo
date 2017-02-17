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
			@if($alumnos == 0)
			<!--Estas 3 clases estan en CSSPrincipal-->
				<div class="notificacionlistados">
					<p>Por ahora no tienes alumnos para confirmar</p>
				</div>
			@else
				<div class="listado">
					<div class="alumno-oferta">
						<h2>Nombre: nombreAlumno</h2>
					</div>
				</div>
			@endif

			</div>
		</div>
	</div>
</div>						