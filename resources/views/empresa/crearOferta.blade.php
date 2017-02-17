@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="panel panel-default col-md-10 col-md-offset-1 ">
                <!-- cabecera de la pagina -->
                <div class="panel-heading col-md-12 col-md-offset-0 " >
					<h1>Nueva oferta</h1>
				</div>
			</div>
			<div class="panel-body col-xs-12 col-md-12 ">	
				<form action="{{ url('/empresa') }}" method="POST" class="col-xs-12 col-md-12">
				{{ csrf_field() }}
					
					<div class="datosSecundarios  ">
						<br/>	
						<label for="job">Puesto de trabajo :</label>
						<input type="text" name="puesto" id="job">
						<br/>
						<label>Ciclos :</label>
						<!--Aqui se cargaran todos los ciclos de batoi-->
						<div id="ciclosBatoy" class="col-xs-12 col-md-10 col-md-offset-1">
						@foreach ($ciclos as $ciclo)
							<input type="checkbox" name="ciclo[]" value="{{ $ciclo['ciclos'] }}">{{ $ciclo['ciclos'] }} <br>
						@endforeach
						</div>
						<br/>
						<label>Idiomas requeridos</label><br/>
						<!--Aqui se cargaran todos los idiomas con sus niveles -->
						<div id="idiomas" class="col-xs-12 col-md-10 col-md-offset-1">
						@foreach ($idiomas as $idioma)

							<input type="checkbox" value="{{ $idioma['idioma'] }}" name="idiomas[]">{{ $idioma['idioma'] }}</input><br>

						@endforeach
	

						</div>
						<br/>
						<label>Tipo de contrato</label>
						<!--Aqui se cargaran todos los tipos de contratos -->
						<select name="contrato">
						  <option value="Parcial" selected>Parcial</option>
						  <option value="Completa" selected>Completa</option>
						</select>
						<br/>						
						<label>Descripción:</label><br/>
						<textarea name="descripcion" rows="7" cols="90" " class="cajadetexto">	</textarea> 				
						<br/>
					<input type="submit" name="guardar" value="Guardar" class="botonDefecto">
				</form>
				
			</div>
			
		</div>
	</div>				
</div>
@endsection
