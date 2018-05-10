<?php
	$consulta_Sugerencia_signo = "SELECT * FROM sugerencia WHERE id_signo = '$valor_Signo'";
	$resultado = $conexion -> query($consulta_Sugerencia_signo);
	$count_Sugerencia = $resultado ->num_rows;

	if($count_Sugerencia >=1) {
		$row = mysqli_fetch_array($resultado);
		$id_sugerencia = $row['id_sugerencia'];
		$id_orden = $row['id_orden'];
		$sugerencia = $row['descripcion_sugerencia'];
	}

	if($id_orden == 1) {
		echo "<div class='alert alert-success'>
				<strong>Signo</strong><br>El signo seleccionado es: $object_signo[nombre_signo]<br>
				La orden de la sugerencia es = <strong>Immediantamente</strong> <br> $sugerencia
			</div>";
	}else{
		echo "<div class='alert alert-success'>
				<strong>Signo</strong><br>El signo seleccionado es: $object_signo[nombre_signo]<br>
				La orden de la sugerencia es = <strong>Despues del Viaje</strong> <br> $sugerencia
			</div>";
	}

	$sugerencia_signo_seleccionado = $id_sugerencia;
?>