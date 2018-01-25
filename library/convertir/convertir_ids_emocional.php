<?php
	//Traemos el id emocional de la evaluacion realizada , toda la cadena separada por comas
	$consulta_Traer_ids_Emocional = "SELECT ids_a_emocional FROM evaluacion_fatiga WHERE id_evaluacion = '$registro[id_evaluacion]'";
	$resultado = $conexion -> query($consulta_Traer_ids_Emocional) or die("Error en la consulta de Ids Emocional");
	$count_ids_emocional = $resultado->num_rows;

	//Si encuentra la cadena de los ids es mayor a 1
	if($count_ids_emocional >=1) {
		$row = mysqli_fetch_array($resultado);
		//Sacamos los ids emocional de la BD
		$ids_emocional = $row["ids_a_emocional"];
		//Con al funcion explode lo que hacemos es partir esa cadena cuando encuentre una coma y se la asignamos al vector
		$vector_ids_emocional = explode(",",$ids_emocional);

		if ($valor_total_emocional == "lleno") {
			//Recorremos ese vector con un ciclo foreach
			foreach ($vector_ids_emocional as $fila) {
				//Sacamos el nombre de la alteracion cuando se igual al id del vector sacado
				$consulta_Traer_nombre_emocional = "SELECT nombre_a_emocional FROM alteraciones_emocionales WHERE id_a_emocional = '$fila'";
				$resultado_emocional = $conexion -> query($consulta_Traer_nombre_emocional);
				$count_nombre_emocional = $resultado_emocional ->num_rows;

				if($count_nombre_emocional == 1) {
					$row_emocional = mysqli_fetch_array($resultado_emocional);
					$nombre_emocional = $row_emocional["nombre_a_emocional"];
					echo "<input type='text' value='$nombre_emocional' readonly>";
				}
			}
		}else {
			echo "<div class='alert alert-warning col-md-6'>
						<label>
							No Se Selecciono Ninguna Alteracion Emocional
						</label>
					</div>";
		}

		//condicional para saber si han llenado el textarea de otra alteracion emocional
		if($otra_emocional == "lleno") {
			echo "<br><br><label>Otra Alteracion Emocional </label><br> $registro[cual_otro_emocional] <br>";
		}else {
			echo "<br><br>
					<div class='alert alert-warning col-md-6'>
						<label>
							No se ingreso otra Alteracion Emocional
						</label>
					</div>";
		}
	}
?>