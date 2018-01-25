<?php
	$consulta="SELECT nombre_sintoma FROM reporte_sintomas";
	$resultado = $conexion->query($consulta);
	$count = $resultado->num_rows;

	if($count >= 1) {
		while($row=mysqli_fetch_array($resultado)){
			echo "<input type='checkbox' name='sintomas[]' id='$row[nombre_sintoma]' id='$row[nombre_sintoma]' value='$row[nombre_sintoma]'>";
			echo "<label for='$row[nombre_sintoma]'>$row[nombre_sintoma]</label>";
		}
	}
?>