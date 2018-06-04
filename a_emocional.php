<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | A. Emocionales</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor de la parte superior donde encontramos el buscador y los botones de acceso directo-->
	<div class="container">
		<center>
			<h2 class="center_menu_alteraciones">Menú Alteracion Emocional
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_emocional" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id Alteracion Emocional , Nombre Alteracion Emocional y Descripcion"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" id="input" placeholder="Buscar..." onkeyup="doSearch()" autofocus><br>
		</center>
		<a href="#registrar_emocional" data-toggle="modal" class="btn btn-primary fa fa-plus-square fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Alteracion_Emocional/exportar_all_a_emocional.php' class="btn btn-info" onclick="alert_dinamic(event , 'Alteraciones Emocionales' , 'library/reportes/Alteracion_Emocional/exportar_all_a_emocional.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class="alinear_a_emocional"><span class="glyphicon glyphicon-star"></span> Total Alteraciones Emocionales : <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_a_emocional; ?>" disabled></label>
	</div>

	<!--Contenedor donde se muestra la tabla enlazada de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_emocional");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> ID Alteracion</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
					<th><span class='glyphicon glyphicon-text-background'></span> Descripcion</th>
				</tr>";
			while($registro = mysqli_fetch_array($show)){
				echo"<tr>
						<th>
							<div class='btn-group dropup'>
								<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
									<span class='glyphicon glyphicon-plus'></span>
								</button>
								<ul class='dropdown-menu' role='menu'>
									<li><a href='#edit$registro[id_emocional]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Alteracion_Emocional/exportar_registro_emocional.php?id_emo=$registro[id_emocional]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_emocional]</td>
						<td>$registro[nombre_emocional]</td>
						<td>$registro[descripcion_emocional]</td>
					</tr>

					<div class='modal fade' id='edit$registro[id_emocional]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro de $registro[nombre_emocional]
										</center>
									</h4>
								</div>
								<div class='modal-body text-center'>
									<div class='form-group text-center'>
										<form action='actualizar_a_emocional.php' method='post'>
											<center>
												<input type='text' name='id_emocional' value='$registro[id_emocional]' hidden>
												<input type='text' name='desde' value='Emocional' hidden>

												<div class='row'>
													<div class='col-md-6'>
														<label>ID # </label>
														<input type='text' class='form-control' name='id_emocional' value='$registro[id_emocional]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Nombre </label>
														<input type='text' class='form-control' name='nombre_emocional' value='$registro[nombre_emocional]' onkeypress='return onlyWords(event)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Descripcion</label><br>
														<textarea name='descripcion_emocional' class='borde_textarea' onkeypress='return onlyWords(event)' cols='80' rows='5'>$registro[descripcion_emocional]</textarea><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Valor de $registro[nombre_emocional] </label><br>
														<input type='number' class='form-control' name='valor_emocional' value='$registro[valor_emocional]' onkeypress='return justNumbers(event,this.form.desde.value);'> Puntos.<br><br>
													</div>
												</div>

												<div>
													<hr>
													<button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-ok'></span></button>
												</div>
											</center>
										</form>
									</div>
								</div>
								<div class='modal-footer form-inline'>
									<button type=button' class='btn btn-danger btn-md glyphicon glyphicon-remove' data-dismiss='modal'> </button>
								</div>
							</div>
						</div>
					</div>";
			}
			echo "</table>";
		?>
	</div>

	<!--Modal de registrar una nueva alteracion emocional al sistema-->
	<div class="modal fade" id="registrar_emocional">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nueva Alteracion Emocional</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_a_emocional.php" method="post">
						<input type='text' name='desde' value='Emocional' hidden>
						<center>
							<div class="row">
								<div class='col-md-12'>
									<div id="container_name_emocional"></div>
									<input type="text" class="form-control" name="nombre_emocional" id="nombre_emocional" placeholder="Nombre Alteracion Emocional" onkeypress="return onlyWords(event)" onchange="check_name_emocional();" required><br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<textarea name="descripcion_emocional" id="descripcion_emocional" class="borde_textarea" placeholder="Ingresar descripcion de Alteracion Emocional" cols="80" rows="5" onkeypress="return onlyWords(event)" onchange="style_border_input('descripcion_emocional','verde')" required></textarea><br><br>
								</div>
							</div>

							<div class='row'>
								<div class='col-md-12'>
									<input type='number' class='form-control' name='valor_emocional' placeholder="Ingrese el valor de la Alteracion" onkeypress='return justNumbers(event,this.form.desde.value);' required> Puntos.<br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registro_emocional"></button>
								</div>
							</div>

						</center>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>