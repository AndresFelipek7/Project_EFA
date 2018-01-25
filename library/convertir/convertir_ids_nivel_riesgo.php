<?php
	//Traemos el id Nivel riesgo de la evaluacion realizada , toda la cadena separada por comas
	$consulta_Traer_pilares = "SELECT ids_nivel_riesgo FROM evaluacion_fatiga WHERE id_evaluacion = '$registro[id_evaluacion]'";
	$resultado = $conexion -> query($consulta_Traer_pilares) or die("Error en la consulta de IDS Nivel riesgo");
	$count = $resultado->num_rows;

	//Si encuentra la cadena de los ids es mayor a 1
	if($count >=1) {
		$row = mysqli_fetch_array($resultado);
		//Sacamos los ids del nivel de riesgo de la BD
		$id_pilares= $row["ids_nivel_riesgo"];
		//Con al funcion explode lo que hacemos es partir esa cadena cuando encuentre una coma y se la asignamos al vector
		$vector_id_pilares= explode(",",$id_pilares);

		echo "<label>Pilares Activos </label>"."<br>";
		//Recorremos ese vector con un ciclo foreach
		foreach ($vector_id_pilares as $fila) {
			//Sacamos el nombre de los Pilares cuando se igual al id del vector sacado
			$consulta_Traer_nombre_pilar = "SELECT nombre_riesgo FROM nivel_riesgo WHERE id_riesgo = $fila";
			$resultado_nombre_pilar = $conexion -> query($consulta_Traer_nombre_pilar);
			$count = $resultado_nombre_pilar ->num_rows;

			if($count >=1) {
				$row_pilar = mysqli_fetch_array($resultado_nombre_pilar);
				$nombre_pilar = $row_pilar["nombre_riesgo"];
				echo "<input type='text' value='$nombre_pilar' readonly>";
			}
		}

		//Este condicional es para cuando no hay nigun nvel de fatiga y ningun pilar se ha seleccionado y el valor es 0
		if ($vector_id_pilares[0] == 0) {
			echo "<div class='alert alert-warning col-md-12'>
					<label>
						No hay pilares activos porque el conductor esta en optimas condiciones para conducir
					</label>
				</div>";
		}
		echo "<hr>";
	}
?>