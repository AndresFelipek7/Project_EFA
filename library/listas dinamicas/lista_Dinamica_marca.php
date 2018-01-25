<select name="marca" class="form-control l_marca_vehiculo">
<?php
	$consulta="SELECT * FROM reporte_vehiculo";
	$resultado = $conexion->query($consulta) or die($conexion->error." en la línea ".(__LINE__‐1));
	$count = $resultado->num_rows;

	if($count>=1)
	{		
		while($fila=mysqli_fetch_array($resultado)){
			echo "<option value='$fila[marca]'> $fila[marca] </option>";
		}
	}
?>
</select><br><br>