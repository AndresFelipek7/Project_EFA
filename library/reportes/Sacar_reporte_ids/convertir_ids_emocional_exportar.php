<?php
	$consulta_Traer_ids_Emocional = "SELECT ids_a_emocional FROM evaluacion_fatiga WHERE id_evaluacion = $row[id_evaluacion]";
	$resultado = $conexion -> query($consulta_Traer_ids_Emocional);
	$count = $resultado->num_rows;

	if($count >=1) {
		$fila_id = mysqli_fetch_array($resultado);
		$ids_emocional = $fila_id["ids_a_emocional"];
		$vector_ids_emocional = explode(",",$ids_emocional);

		echo "<center><strong style='font-size:20px;'>Alteraciones Emocionales</strong></center>"."<br>";
		echo "<table>";
			echo "<tr>
					<th>Nombre Alteracion</th>
				</tr>";
		foreach ($vector_ids_emocional as $fila) {
			$consulta_Traer_nombre_emocional = "SELECT nombre_a_emocional FROM alteraciones_emocionales WHERE id_a_emocional = $fila";
			$resultado_emocional = $conexion -> query($consulta_Traer_nombre_emocional);
			$count = $resultado_emocional ->num_rows;

			if($count >=1) {
				$row_emocional = mysqli_fetch_array($resultado_emocional);
				$nombre_emocional = $row_emocional["nombre_a_emocional"];
			}

			//Mostramos el contenido en la tabla
			echo "<tr>
					<td>$nombre_emocional</td>
			</tr>";
		}
		echo "</table><br>";
	}
?>