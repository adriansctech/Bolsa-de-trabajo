@extends('layouts.app')

@section('content')
<div class="container contenido">
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <div class="panel panel-default col-md-10 col-md-offset-1 ">
                <!-- cabecera de la pagina -->
                <div class="panel-heading col-md-12 col-md-offset-0 " >
					<h1>Editar oferta</h1>
				</div>
			</div>
			<div class="panel-body col-xs-12 col-md-12 ">	
				<form action="{{ url('/empresa') }}" method="POST" class="col-xs-12 col-md-12">
				{{ csrf_field() }}
					
					<div class="datosSecundarios  ">
						<br/>	
						<label for="job">Puesto de trabajo :</label>
						<input type="text" name="puesto" id="job" value="{{ $oferta['puesto'] }}">
						<br/>
						<label>Ciclos :</label><br/>
						<!--Aqui se cargaran todos los ciclos de batoi-->
						<div id="ciclosBatoy" class="col-xs-12 col-md-10 col-md-offset-1">

						@foreach ($todoslosciclos as $ciclo)
							
								@if(isset($ciclos[$ciclo['id']]))
									<input type="checkbox" name="ciclo[]" value="{{ $ciclo['ciclos'] }}" checked>{{ $ciclo['ciclos'] }} <br>
								@else
									<input type="checkbox" name="ciclo[]" value="{{ $ciclo['ciclos'] }}" >{{ $ciclo['ciclos'] }} <br>
								@endif	
							
						@endforeach
						</div>
						<br/>
						<label>Idiomas requeridos</label><br/>
						<!--Aqui se cargaran todos los idiomas con sus niveles -->
						<div id="idiomas" class="col-xs-12 col-md-10 col-md-offset-1">
						@foreach ($todoslosidiomas as $idioma  )
							
								@if(isset($idiomas[$idioma['id']]))
									<input type="checkbox" value="{{ $idioma['idioma'] }}" name="idiomas[]" checked>{{ $idioma['idioma'] }}</input><br>
								@else
									<input type="checkbox" value="{{ $idioma['idioma'] }}" name="idiomas[]">{{ $idioma['idioma'] }}</input><br>
								@endif	
							

						@endforeach
						</div>
						<br/>
						<label>Tipo de contrato</label>
						<!--Aqui se cargaran todos los tipos de contratos -->
						<select name="contrato">
						  <option value="Parcial" >Parcial</option>
						  <option value="Completa" >Completa</option>
						</select>
						<br/>						
						<label>Descripción:</label><br/>
						<textarea name="descripcion" rows="7" cols="90" " class="cajadetexto">{{$oferta['descripcion']}}</textarea> 				
						<br/>
					<input type="submit" name="guardar" value="Guardar" class="botonDefecto">
				</form>
				<a href="/" class="botonDefecto">Cancelar</a>
			</div>
			
		</div>
	</div>				
</div>
@endsection