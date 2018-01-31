<?php
	$consulta="SELECT nombre_neurologico FROM reporte_a_neurologico";
	$resultado = $conexion->query($consulta);
	$count = $resultado->num_rows;

	if($count >= 1) {
		while($row=mysqli_fetch_array($resultado)){
			echo "<input type='checkbox' name='alteraciones_neurologicas[]' id='$row[nombre_neurologico]' value='$row[nombre_neurologico]'>";
			echo "<label for='$row[nombre_neurologico]'>$row[nombre_neurologico]</label>";
		}
	}
?>