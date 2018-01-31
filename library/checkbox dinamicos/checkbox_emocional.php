<?php
	$consulta="SELECT nombre_emocional FROM reporte_emocional";
	$resultado = $conexion->query($consulta);
	$count = $resultado->num_rows;

	if($count >= 1) {
		while($row=mysqli_fetch_array($resultado)){
			echo "<input type='checkbox' name='alteraciones_emocionales[]' id='$row[nombre_emocional]' value='$row[nombre_emocional]'>";
			echo "<label for='$row[nombre_emocional]'>$row[nombre_emocional]</label>";
		}
	}
?>