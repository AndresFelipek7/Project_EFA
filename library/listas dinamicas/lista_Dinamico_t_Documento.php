<select name="t_documento" id="select" class="l_documento">
<?php
	$consulta="SELECT * FROM reporte_t_documento";
	$resultado = $conexion->query($consulta) or die($conexion->error." en la línea ".(__LINE__‐1));
	$count = $resultado->num_rows;

	if($count>=1)
	{
		while($fila=mysqli_fetch_array($resultado)){
			echo "<option value='$fila[id_tipo_documento]'> $fila[nombre_documento] </option>";
		}
	}
?>
</select><br><br>