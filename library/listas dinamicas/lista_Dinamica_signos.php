<label>Signos que presenta </label>
<center>
	<select name="signos" class="form-control l_signo" required>
		<?php
			$consulta="SELECT * FROM reporte_signos";
			$resultado = $conexion->query($consulta) or die($conexion->error." en la línea ".(__LINE__‐1));
			$count = $resultado->num_rows;

			if($count>=1)
			{
				while($fila=mysqli_fetch_array($resultado)){
					echo "<option value='$fila[id_signo]'> $fila[nombre_signo] </option>";
				}
			}
		?>
	</select>
</center>
