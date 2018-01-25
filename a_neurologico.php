<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu | A. Neurologicas</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contendor donde se encuentra el buscador y los botones de acceso directo-->
	<div class="container">
		<center>
			<h2 class="center_menu_alteraciones">Menú Alteracion Neurologicas
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_neurologico" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id Alteracion Neurologico , Nombre Alteracion Neurologico y Descripcion"><span class="fa fa-info"></span></button>
			</h2>
		<input class="form-control colocar-icono" type="text" id="input" placeholder="Buscar..." onkeyup="doSearch()" autofocus><br>
		</center>
		<a href="#registrar_neurologica" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Alteracion_Neurologica/exportar_all_a_neurologica.php' class="btn btn-info" onclick="alert_dinamic(event , 'Alteraciones Neurologicas' , 'library/reportes/Alteracion_Neurologica/exportar_all_a_neurologica.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class="alinear_a_emocional"><span class="glyphicon glyphicon-star"></span> Total Alteraciones Neurologica :  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_a_neurologico; ?>" disabled></label>
	</div>

	<!--contendor donde se muestra la tabla de la informacion enlazada en la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_a_neurologico");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			//Encabezados con etiqueta TR
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> ID Alteracion</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
					<th><span class='glyphicon glyphicon-text-background'></span> Descripcion</th>
				</tr>";
			while($registro = mysqli_fetch_array($show)){
				//Contenido con la etiqueta
				echo"<tr>
						<th>
							<div class='btn-group dropup'>
								<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
									<span class='glyphicon glyphicon-plus'></span>
								</button>
								<ul class='dropdown-menu' role='menu'>
									<li><a href='#edit$registro[id_neurologico]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Alteracion_Neurologica/exportar_registro_a_neurologico.php?id_neu=$registro[id_neurologico]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_neurologico]</td>
						<td>$registro[nombre_neurologico]</td>
						<td>$registro[descripcion_neurologico]</td>
					</tr>

					<div class='modal fade' id='edit$registro[id_neurologico]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro de $registro[nombre_neurologico]
										</center>
									</h4>
								</div>
								<div class='modal-body'>
									<div class='form-group'>
										<form action='actualizar_a_neurologico.php' method='post'>
											<center>
												<input type='text' name='id_neurologico' value='$registro[id_neurologico]' hidden><br><br>

												<div class='row'>
													<div class='col-md-6'>
															<label>ID # </label>
															<input type='text' class='form-control' name='id_neurologico' value='$registro[id_neurologico]' disabled><br><br>
														</div>

														<div class='col-md-6'>
															<label>Nombre </label>
															<input type='text' class='form-control' name='nombre_neurologico' value='$registro[nombre_neurologico]' onkeypress='return onlyWords(event)'><br><br>
														</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Descripcion </label><br>
														<textarea name='descripcion_neurologico' class='borde_textarea' onkeypress='return onlyWords(event)' cols='80' rows='5' onkeypress='return onlyWords(event)'>$registro[descripcion_neurologico]</textarea><br><br>
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
									<button type=button' class='btn btn-danger btn-md glyphicon glyphicon-remove' data-dismiss='modal'></button>
								</div>
							</div>
						</div>
					</div>";
			}
			echo "</table>";
		?>
	</div>

	<!--Modal para registrar una nueva alteracion neurologica-->
	<div class="modal fade" id="registrar_neurologica">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nueva Alteracion Neurologica</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_a_neurologico.php" method="post">
						<center>
							<div class="row">
								<div class='col-md-12'>
									<div id="container_name_neurologico"></div>
									<input type="text" class="form-control" name="nombre_neurologico" id="nombre_neurologico" placeholder="Nombre Alteracion Neurologica" onkeypress="return onlyWords(event)" onchange="check_name_neurologico();" required><br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<textarea name="descripcion_neurologico" id="descripcion_neurologico" class="borde_textarea" placeholder="Ingresar Descripcion Neurologica" cols="80" rows="5" onkeypress="return onlyWords(event)" onchange="style_border_input('descripcion_neurologico','verde')" required></textarea><br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registro_neurologico"></button>
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