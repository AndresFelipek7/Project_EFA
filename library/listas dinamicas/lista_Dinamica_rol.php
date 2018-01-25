<select name="id_rol" class="l_rol">
	<?php
		$consulta="SELECT * FROM reporte_rol";
		$resultado = $conexion->query($consulta) or die($conexion->error." en la línea ".(__LINE__‐1));
		$count = $resultado->num_rows;

		if($count>=1)
		{
			while($fila=mysqli_fetch_array($resultado)){
				echo "<option value='$fila[id_rol]'> $fila[nombre_perfil] </option>";
			}
		}
	?>
</select><br><br>