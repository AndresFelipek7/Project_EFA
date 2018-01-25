<?php
	$consulta_Traer_ids_Neurologico = "SELECT ids_a_neurologico FROM evaluacion_fatiga WHERE id_evaluacion = $row[id_evaluacion]";
	$resultado = $conexion -> query($consulta_Traer_ids_Neurologico);
	$count = $resultado->num_rows;

	if($count >=1) {
		$fila_id = mysqli_fetch_array($resultado);
		$ids_neurologico= $fila_id["ids_a_neurologico"];
		$vector_ids_neurologico = explode(",",$ids_neurologico);

		echo "<center><strong style='font-size:20px;'>Alteraciones Neurologicas</strong></center>"."<br>";
		echo "<table>";
			echo "<tr>
					<th>Alteracion</th>
				</tr>";
		foreach ($vector_ids_neurologico as $fila) {
			$consulta_Traer_nombre_neurologico = "SELECT nombre_a_neurologico FROM alteraciones_neurologicas WHERE id_a_neurologico = $fila";
			$resultado_neurologico = $conexion -> query($consulta_Traer_nombre_neurologico);
			$count = $resultado_neurologico ->num_rows;

			if($count >=1) {
				$row_neurologico = mysqli_fetch_array($resultado_neurologico);
				$nombre_neurologico = $row_neurologico["nombre_a_neurologico"];
			}

			//Cargamos la informacion a la tabla
			echo "<tr>
					<td>$nombre_neurologico</td>
			</tr>";
		}
		echo "</table><br>";
	}
?>