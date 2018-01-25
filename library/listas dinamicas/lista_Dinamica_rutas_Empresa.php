<select name="ruta" class='form-control l_Rutas'>
<?php
	$consulta="SELECT * FROM reporte_ruta";
	$resultado = $conexion->query($consulta) or die($conexion->error." en la línea ".(__LINE__‐1));
	$count = $resultado->num_rows;

	if($count>=1)
	{
		while($fila=mysqli_fetch_array($resultado)){
			echo "<option value='$fila[id_ruta]'> $fila[nombre_ruta] </option>";
		}
	}
?>
</select><br><br>