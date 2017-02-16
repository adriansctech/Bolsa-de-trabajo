@extends('layouts.app')

@section('content')
<div id="wrapper">
		<main>
			<div class="Principal">
				<h1>Perfil en edición</h1>
				<form action="" method="" >
					<div class="imagen">
					<!--Foto de prefil-->
						<img src="../img/user.jpg">

					</div>

					<div class="datosPrincipales"> 
						<!-- Datos del alumno parte 1-->
						<label>Nombre:</label>
						<input type="text" name="nombre" value="{{ $usuario['nombre'] }}">
						<br/>
						<label>Apellidos</label>
						<input type="text" name="apellidos" value="{{ $usuario['apellidos'] }}">
						<br/>
						<label>Domicilio</label>
						<input type="text" name="domicilio" value="{{ $usuario['domicilio'] }}">
						<br/>
						<label>Email</label>
						<input type="email" name="email" value="{{ $usuario['email'] }}">
						<br/>
						<label>Telefono</label>
						<input type="tel" name="telefono" size="9" value="{{ $usuario['telefono'] }}">
						<br/>
					</div>



					<div class="cambioContraseña">
						 <!--Div en el que permite cambiar la contraseña-->
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

					<div class="ciclos">
						<label>Ciclos cursados en Batoi</label>
						<!-- lista de los ciclos guardados -->
						<strong>
							<ul id="listaCiclos"></ul>
						</strong>
						<!--select con todos los ciclos de batoy-->
						<div id="ciclosBatoy">	
							<select id="selectCiclos" name="cicloElegido" onchange="valorCambiadoSelect(this.value)">
								<!-- valor por defecto -->
								<option value="defecto" selected>- Elige un ciclo -</option>
								@foreach ($ciclos as $ciclo)
									<option value="{{ $ciclo['ciclos'] }}">{{ $ciclo['ciclos'] }}</option>
								@endforeach
							</select>
							<br>
						</div>
					</div>
					
					<div class="ciclosCursados" id="infoCiclos" style="display: none;">
					<!--	<h4>Datos opcionales</h4>
						<div class="masInfo">
						<span class="adicional"><small>Añade un poco más de información sobre ti para que las empresas puedan <br/> encontrarte más facilmente y contactar contigo.</small></span>
						</div>-->
						<!--Div en el que cargamos los ciclos que ha marcado el alumno como que los ha cursado-->
						<br />
						<h4 id="tituloCiclo"></h4>
						<label>Fecha finalizacion:</label>
						<input type="date" name="finCiclo" id="fechaCiclo">
						<br/>
						<label>Nota ciclo:</label>
						<input type="number" name="notaCiclo" id="notaCiclo">
						<br/>
						<label>Empresa de las FCT:</label>
						<input type="text" name="FCTCiclo" id="empresaCiclo">
						<br/>
						<input type="button" id="anyadirCiclo" name="anyadirCiclo" value="Añadir" onclick="guardarCiclo()">
						<!-- <hr> -->
					</div>
					<br>
					<div class="datosSecundarios">
						<!--Div de los idiomas, opcion de trabajar fuera y CV-->
						
						<label>Selecciona los idiomas con sus niveles</label>
						<!-- lista de los idiomas guardados -->
						<strong>
							<ul id="listaIdiomas"></ul>
						</strong>
						
						@foreach ($idiomas as $idioma)
							<input type="radio" name="idioma[]" id="{{ $idioma }}" value="{{ $idioma['idioma'] }}" onclick="checkIdioma()"> {{ $idioma['idioma'] }}
							<br>
						@endforeach
						
						<select id="nivelIdioma" style="display: none;">
							<option value="defecto">- Elige una opción -</option>
						  	<option value="A1">A1</option>
						  	<option value="A2">A2</option>
						  	<option value="B1">B1</option>
						  	<option value="B2">B2</option>
						  	<option value="C1">C1</option>
						  	<option value="C2">C2</option>
						</select>
						<input type="button" id="anyadirIdioma" name="anyadirIdioma" value="Añadir" onclick="guardarIdioma()" style="display: none;">
						<br>
						<label>Con opción a trabajar fuera:</label>
						@if($usuario['trabajoFuera'] == 0)
							<input type="checkbox" name="trabajoFuera" value="1">Si
							<input type="checkbox" name="trabajoFuera" value="0" checked>No
						@else
							<input type="checkbox" name="trabajoFuera" value="1" checked>Si
							<input type="checkbox" name="trabajoFuera" value="0">No
						@endif
						<br/>
						<label>Enlaza tu CV:</label>
						<input type="trabajoFuera" name="enlaceCV" value="{{ $usuario['cv'] }}">
						<br/>
					</div>

					<input type="submit" name="guardar" value="Guardar">

				</form>
			</div>
		</main>		
	</div>	
	@endsection	
	<!-- obtener el vaor del select -->
	<script type="text/javascript">
		//obtener el valor del select al cambiar de estado
		function valorCambiadoSelect(val){  
    		if(val == "defecto"){
    			//ocultar el div de los datos si el valor es el de defecto
				document.getElementById("infoCiclos").style.display = 'none';
    		}else{
    			//enviar el valor a la etiqueta 
				document.getElementById("tituloCiclo").innerHTML = val;
				//mostrar el div de los datos al cambiar el estado del select
				document.getElementById("infoCiclos").style.display = '';
			}
		}
		//guardar en la lista el ciclo
		function guardarCiclo(){
			var ciclo = document.getElementById("tituloCiclo").innerHTML;
			var fecha = document.getElementById("fechaCiclo").value;
			var nota = document.getElementById("notaCiclo").value;
			var empresa = document.getElementById("empresaCiclo").value;
			//crear li para la lista
			var ul = document.getElementById("listaCiclos");
			var li = document.createElement("li");
			//contenido del li
			li.appendChild(document.createTextNode(ciclo+" - Fecha finalización: "+fecha+" - Nota: "+nota+" - Empresa: "+empresa));
			ul.appendChild(li);
			//vaciar los inputs y camibar el valor del select
			document.getElementById("selectCiclos").selectedIndex = 0;
			document.getElementById("fechaCiclo").value = "";
			document.getElementById("notaCiclo").value = "";
			document.getElementById("empresaCiclo").value = "";
			//mostrar el div de los datos al cambiar el estado del select
			document.getElementById("infoCiclos").style.display = 'none';
		}
		//mostrar el desplegable del idioma
		function checkIdioma(){
			//mostrar el select de los datos y el boton
			document.getElementById("nivelIdioma").style.display = '';
			document.getElementById("anyadirIdioma").style.display = '';
		}
		//guardar el idioma
		function guardarIdioma(){
			//obtener los radios
			var radios = document.getElementsByName('idioma[]');
			//buscar el radio seleccionado
			for (var i = 0, length = radios.length; i < length; i++) {
			    if (radios[i].checked) {
			    	//encontrado el radio y obtener el valor
			        var radioPulsado = radios[i].value;
			        break;
			    }
			}
			//obtener valor del select
			var selectRadio = document.getElementById("nivelIdioma");
			var idiomaSeleccionado = selectRadio.options[selectRadio.selectedIndex].value;

			if(idiomaSeleccionado == "defecto"){
				//mensaje informativo
				alert("Seleccione un nivel del idioma.")
			}else{	
				//crear li para la lista
				var ul = document.getElementById("listaIdiomas");
				var li = document.createElement("li");
				//contenido del li
				li.appendChild(document.createTextNode(radioPulsado+" - "+idiomaSeleccionado));
				ul.appendChild(li);
				//vaciar los inputs y camibar el valor del select
				document.getElementById("nivelIdioma").selectedIndex = 0;
				//quitar valor del radio
				for (var i = 0, length = radios.length; i < length; i++) {
			    	radios[i].checked = false;
			    }
			    //ocultar el select y el boton
			    document.getElementById("nivelIdioma").style.display = 'none';
				document.getElementById("anyadirIdioma").style.display = 'none';
			}

			}
		
	</script>
