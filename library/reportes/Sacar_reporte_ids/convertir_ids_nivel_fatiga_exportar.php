<?php
	$consulta_Traer_pilares = "SELECT ids_nivel_riesgo FROM evaluacion_fatiga WHERE id_evaluacion = $row[id_evaluacion]";
	$resultado = $conexion -> query($consulta_Traer_pilares);
	$count = $resultado->num_rows;

	if($count >=1) {
		$fila_id = mysqli_fetch_array($resultado);
		$id_pilares= $fila_id["ids_nivel_riesgo"];
		$vector_id_pilares= explode(",",$id_pilares);

		echo "<center><strong style='font-size:20px;'>Pilares de Fatiga Activos</strong></center>"."<br>";
		echo "<table>";
			echo "<tr>
					<th>Nombre Pilar</th>
				</tr>";
		foreach ($vector_id_pilares as $fila) {
			$consulta_Traer_nombre_pilar = "SELECT * FROM nivel_riesgo WHERE id_riesgo = $fila";
			$resultado_nombre_pilar = $conexion -> query($consulta_Traer_nombre_pilar);
			$count = $resultado_nombre_pilar ->num_rows;

				if($count >=1) {
					$row_sintoma = mysqli_fetch_array($resultado_nombre_pilar);
					$nombre_pilar = $row_sintoma["nombre_riesgo"];
					echo "<tr>
							<td>$nombre_pilar</td>
					</tr>";
				}
		}

		if ($vector_id_pilares[0] == 0) {
			echo "<label><strong>No hay ningun pilar activo porque el conductor esta en optimas condiciones para conducir</strong></label>"."<hr><br><br>";
		}
		echo "</table><br><hr>";
	}
?>