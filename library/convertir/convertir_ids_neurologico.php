<?php
	//Traemos el id Neurlogico de la evaluacion realizada , toda la cadena separada por comas
	$consulta_Traer_ids_Neurologico = "SELECT ids_a_neurologico FROM evaluacion_fatiga WHERE id_evaluacion = $registro[id_evaluacion]";
	$resultado = $conexion -> query($consulta_Traer_ids_Neurologico);
	$count = $resultado->num_rows;

	//Si encuentra la cadena de los ids es mayor a 1
	if($count >=1) {
		$row = mysqli_fetch_array($resultado);
		//Sacamos los ids Neurologico de la BD
		$ids_neurologico= $row["ids_a_neurologico"];
		//Con al funcion explode lo que hacemos es partir esa cadena cuando encuentre una coma y se la asignamos al vector
		$vector_ids_neurologico = explode(",",$ids_neurologico);

		if ($valor_total_neurologico == "lleno") {
			//Recorremos ese vector con un ciclo foreach
			foreach ($vector_ids_neurologico as $fila) {
				//Sacamos el nombre de la alteracion cuando se igual al id del vector sacado
				$consulta_Traer_nombre_neurologico = "SELECT nombre_a_neurologico FROM alteraciones_neurologicas WHERE id_a_neurologico = $fila";
				$resultado_neurologico = $conexion -> query($consulta_Traer_nombre_neurologico);
				$count = $resultado_neurologico ->num_rows;

				if($count >=1) {
					$row_neurologico = mysqli_fetch_array($resultado_neurologico);
					$nombre_neurologico = $row_neurologico["nombre_a_neurologico"];
					echo "<input type='text' value='$nombre_neurologico' readonly>";
				}
				/*//Sacamos la sugerencia dependiendo del id Neurologico
				$consulta_Traer_sugerencia_neurologico= "SELECT descripcion_sugerencia FROM sugerencia WHERE id_a_neurologico = $fila";
				$resultado_sugerencia_neurologico = $conexion -> query($consulta_Traer_sugerencia_neurologico);
				$count = $resultado_sugerencia_neurologico ->num_rows;

				if($count >=1) {
					$row_sintoma = mysqli_fetch_array($resultado_sugerencia_neurologico);
					$sugerencia_neurologico = $row_sintoma["descripcion_sugerencia"];
					echo $sugerencia_neurologico."<br>";
				}*/
			}
		}else {
			echo "<div class='alert alert-warning col-md-6'>
						<label>
							No Se Selecciono Ninguna Alteracion Neurologica
						</label>
					</div>";
		}

		//Condicional para saber si han llenado la entrada de otra alteracion neurologica
		if ($otro_neurologico == "lleno") {
			echo "<br><br><label>Otra Alteracion Neurologica </label><br> $registro[cual_otro_neurologico] <br>";
		}else {
			echo "<br><br>
				<div class='alert alert-warning col-md-6'>
						<label>
							No se ingreso otra Alteracion Neurologica
						</label>
					</div>";
		}
	}

?>