<?php
	$consulta_Traer_ids_Sintomas = "SELECT ids_sintomas FROM evaluacion_fatiga WHERE id_evaluacion = $row[id_evaluacion]";
	$resultado = $conexion -> query($consulta_Traer_ids_Sintomas);
	$count = $resultado->num_rows;

	if($count >=1) {
		$fila = mysqli_fetch_array($resultado);
		$ids_sintoma = $fila["ids_sintomas"];
		//Vector para poder sacar cada id por separa y luego con el nombre del id poder sacar el nombre y la sugerencia
		$vector_ids_sintoma = explode(",",$ids_sintoma);

		echo "<center><strong style='font-size:20px;'>Sintomas de Fatiga</strong></center>"."<br>";
		echo "<ul>";
			foreach ($vector_ids_sintoma as $fila) {
				$consulta_Traer_nombre_Sintoma = "SELECT nombre_sintoma FROM sintomas WHERE id_sintoma = $fila";
				$resultado_sintoma = $conexion -> query($consulta_Traer_nombre_Sintoma);
				$count = $resultado_sintoma ->num_rows;

				if($count >=1) {
					$row_sintoma = mysqli_fetch_array($resultado_sintoma);
					$nombre_sintoma = $row_sintoma["nombre_sintoma"];
				}

				echo "<li>";
					echo $nombre_sintoma;
				echo "</li>";
			}

		echo "</ul>";
	}
?>