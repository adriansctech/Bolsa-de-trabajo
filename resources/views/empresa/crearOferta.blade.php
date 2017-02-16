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
			<div class="panel-body col-xs-12 col-md-10 col-md-offset-1 ">	
				<form action="{{ url('/empresa') }}" method="POST">
				{{ csrf_field() }}
					
					<div class="datosSecundarios">
						<br/>	
						<label for="job">Puesto de trabajo :</label>
						<input type="text" name="puesto" id="job">
						<br/>
						<label>Ciclos :</label>
						<!--Aqui se cargaran todos los ciclos de batoi-->
						<div id="ciclosBatoy">
							<input type="checkbox" name="ciclo[]" value="DAM">DAM <br>
							<input type="checkbox" name="ciclo[]" value="DAW">DAW <br>
							<input type="checkbox" name="ciclo[]" value="ASIX">ASIX <br>
						</div>
						<br/>
						<label>Idiomas requeridos</label><br/>
						<!--Aqui se cargaran todos los idiomas con sus niveles -->
						<div id="idiomas">
						  <input type="checkbox" value="ingles" name="idiomas[]">Ingles</input><br>
						  <input type="checkbox" value="frances" name="idiomas[]">Frances</input><br>
						  <input type="checkbox" value="aleman" name="idiomas[]">Aleman</input>
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
						<input type="text" name="descripcion" class="cajadetexto">
						</div>
						<br/>
					<input type="submit" name="guardar" value="Guardar" class="botonDefecto">
				</form>
				
			</div>
			
		</div>
	</div>				
</div>
@endsection
