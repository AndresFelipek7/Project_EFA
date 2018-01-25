<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro | Sugerencia Signo</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin_Sugerencias.php'; ?>

	<!--Contenedor para ingresar una recomendacion a signos de fatiga-->
	<div class='panel panel-primary contenedor_ingresar_sugerencia text-center'>
		<div class='panel-heading'><h3>Registro sugerencia Signo</h3></div>
		<div class='panel-body'>
			<div>
				<?php
					$traer_all_informacion_signo = "SELECT nombre_signo , descripcion_signo FROM signos_fatiga WHERE id_signo = '$_SESSION[idSigno]'";
					$resultado = $conexion ->query($traer_all_informacion_signo);
					$count = $resultado ->num_rows;

					if($count >= 1) {
						$row = mysqli_fetch_array($resultado);
						$nombre_signo = $row["nombre_signo"];
						$descripcion_signo = $row["descripcion_signo"];
					}
				?>
				<form action="registro_sugerencia_signo.php" method="post">
					<label>Nombre Signo </label><br>
					<input type="text" name="nombre" class="input-sugerencia" value="<?php echo $nombre_signo; ?>" disabled><br><br>

					<label>Descripcion Signo </label><br>
					<textarea cols="60" rows="5" class="borde_textarea" disabled><?php echo $descripcion_signo; ?></textarea><br><br>

					<button type="button" class="btn btn-md btn-primary" id="ayuda_orden_reposo" data-toggle="tooltip" data-placement="right" title="La orden de reposo significa que la recomendacion debe de realizarce inmediatamente cuando el evaluador esta realizando la evaluacion o que por el contrario que lo puede hacer despues del viaje o cuando termine su jornada laboral"><span class="glyphicon glyphicon-info-sign"></span></button><br>
					<label>Orden de Reposo</label><br>
					<select name="orden_reposo" class="width_select_sugerencia">
						<option value="1" selected>Inmediatamente</option>
						<option value="2">Despues del Viaje</option>
					</select><br><br>

					<textarea placeholder="Ingresar la Recomendacion para el sintoma" cols="60" rows="5" name="recomendacion" id="recomendacion" onkeypress='return onlyWords(event)' onchange="style_border_input('recomendacion','verde')"></textarea><br><br>

					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span></button>
				</form>
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>