<label>Empresa</label><br>
<select name="id_empresa" class='form-control l_empresa'>
	<?php
		$consulta="SELECT * FROM reporte_empresa";
		$resultado = $conexion->query($consulta);
		$count = $resultado->num_rows;

		if($count>=1)
		{		
			while($fila=mysqli_fetch_array($resultado)){
				echo "<option value='$fila[id_empresa]'> $fila[name_empresa] </option>";
			}
		}
	?>
</select><br><br>