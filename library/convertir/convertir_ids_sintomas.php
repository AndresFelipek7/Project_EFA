<?php
	//Traemos el id Sintomas de la evaluacion realizada , toda la cadena separada por comas
	$consulta_Traer_ids_Sintomas = "SELECT ids_sintomas,cual_otro_sintoma FROM evaluacion_fatiga WHERE id_evaluacion = '$registro[id_evaluacion]'";
	$resultado_traer_ids_sintomas = $conexion -> query($consulta_Traer_ids_Sintomas) or die("Error en la consulta de IDS Sintomas");
	$count = $resultado_traer_ids_sintomas ->num_rows;

	//Si encuentra la cadena de los ids es mayor a 1
	if($count >=1) {
		$row = mysqli_fetch_array($resultado_traer_ids_sintomas);
		//Sacamos los ids sintomas de la BD
		$ids_sintoma = $row["ids_sintomas"];
		//Con al funcion explode lo que hacemos es partir esa cadena cuando encuentre una coma y se la asignamos al vector
		$vector_ids_sintoma = explode(",",$ids_sintoma);

		//Condicional para saber si ay sintomas  si los hay lo va a mostrar , pero si no nos va amostrar el mensaje correspondiente
		if ($valor_total_sintomas == "lleno") {
			//Recorremos ese vector con un ciclo foreach
			foreach ($vector_ids_sintoma as $fila) {
					//Sacamos el nombre del Sintomas cuando se igual al id del vector sacado
					$consulta_Traer_nombre_Sintoma = "SELECT nombre_sintoma FROM sintomas WHERE id_sintoma = '$fila'";
					$resultado_sintoma = $conexion -> query($consulta_Traer_nombre_Sintoma);
					$count = $resultado_sintoma ->num_rows;

					if($count >=1) {
						$row_sintoma = mysqli_fetch_array($resultado_sintoma);
						$nombre_sintoma = $row_sintoma["nombre_sintoma"];
						echo "<input type='text' value='$nombre_sintoma' readonly>";
					}
			}
		}else {
			echo "<div class='alert alert-warning col-md-6'>
						<label>
							No Se Selecciono Ningun Sintoma en la Evaluacion
						</label>
					</div>
			";
		}

		//Saber si han ingresado otra sintoma que no se encontraba en el menu
		if ($otro_sintoma == "lleno") {
			echo "<br><br><label>Otro Sintoma: </label><br> $row[cual_otro_sintoma]";
		}else{
			echo "
					<br><br>
					<div class='alert alert-warning col-md-6'>
						<label>
							No Se ingreso otro sintoma
						</label>
					</div>
			";
		}
	}

?>