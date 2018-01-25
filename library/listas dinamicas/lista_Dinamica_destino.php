<label>Destino del Viaje </label>
<select name="ruta" id="ruta" onchange="get_distance_time();" class="l_destino" required>
	<?php
		$consulta="SELECT * FROM reporte_ruta";
		$resultado = $conexion->query($consulta) or die($conexion->error." en la línea ".(__LINE__‐1));
		$count = $resultado->num_rows;

		if($count>=1)
		{
			echo "<option value='0'>Seleccionar Destino</option>";
			while($fila=mysqli_fetch_array($resultado)){
				echo "<option value='$fila[id_ruta]'> $fila[nombre_ruta] </option>";
			}
		}
	?>
</select><br><br>