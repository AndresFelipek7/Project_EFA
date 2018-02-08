<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Sugerencia</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<div class="container">
		<center>
			<h2>Menú Sugerencias
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_sugerencia" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id , Nombre y Descripcion en cualquiera de los menus de la parte de abajo"><span class="fa fa-info"></span></button>
			</h2>
		</center>
	</div>

	<!--Contenedor donde se muestra todos las recomendaciones de todos los menus-->
	<div class="container text-center" id="contenido_Bd">

		<!--Contenedor de Recomendaciones Sintomas-->
		<div>
			<a href='#seccion' data-toggle='collapse' class='btn btn-primary btn-lg'> <span class="glyphicon glyphicon-heart"></span> Sintomas</a>
			<div class='collapse' id='seccion'>
				<br>
				<div class='well text-center'>
					<form action="" method="post" class="container panel tamaño_form" >
						<h3> Recomendaciones Sintomas</h3>
						<center>
							<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch('table','input')"><br><br>
						</center>
						<label><span class="glyphicon glyphicon-star"></span> Total Sintomas =  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_sugerencia_sintomas; ?>" disabled></label>
						<a href='library/reportes/Sugerencia/Sintomas/exportar_all_sugerencia_sintomas.php' class="btn btn-info" onclick="alert_dinamic(event , 'Sintomas' , 'library/reportes/Sugerencia/Sintomas/exportar_all_sugerencia_sintomas.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
					</form>
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_sintomas_sugerencia");
						echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
						//Encabezados con etiqueta TR
						echo "<tr class='active'>
								<th></th>
								<th><span class='glyphicon glyphicon-map-marker'></span> Id Sugerencia</th>
								<th><span class='glyphicon glyphicon-hourglass'></span> Orden Reposo</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Sintoma</th>
								<th><span class='glyphicon glyphicon-text-background'></span> Descripcion sugerencia</th>
							</tr>";
						foreach ($show as $registro) {
							//Contenido con la etiqueta
							echo"<tr>
									<th>
										<div class='btn-group dropup'>
											<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'> <span class='glyphicon glyphicon-plus'></span>
											</button>
											<ul class='dropdown-menu' role='menu'>
												<li><a href='#edit$registro[id_sugerencia]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
												<li><a href='library/reportes/Sugerencia/Sintomas/exportar_registro_sugerencia_sintoma.php?id_sug=$registro[id_sugerencia]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
											</ul>
										</div>
									</th>

									<td>$registro[id_sugerencia]</td>
									<td>$registro[reposo_asignado]</td>
									<td>$registro[nombre_sintoma]</td>
									<td>$registro[descripcion]</td>

								</tr>

								<div class='modal fade' id='edit$registro[id_sugerencia]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
									<div class='modal-dialog modal-lg'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title'>
													<center>
														<span class='glyphicon glyphicon-pencil'></span>
														Actualizar Registro de $registro[nombre_sintoma]
													</center>
												</h4>
											</div>
											<div class='modal-body text-center'>
												<div class='form-group'>
													<form action='actualizar_sugerencia_sintomas.php' method='post'>
														<center>
															<input type='text' name='id_sugerencia' value='$registro[id_sugerencia]' hidden>
															<input type='text' name='nombre_sintoma_before' value='$registro[nombre_sintoma]' hidden>

															<div class='row'>
																<div class='col-md-6'>
																	<label>ID # </label>
																	<input type='text' class='form-control' name='id_sugerencia' value='$registro[id_sugerencia]' disabled><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Reposo Asignado </label>
																	<input type='text' class='form-control' value='$registro[reposo_asignado]' readonly><br><br>
																</div>
															</div>

															<div class='row'>
																<div class='col-md-6'>
																	<label>Tipo de Reposo disponibles</label><br>
																	<select name='reposo' class='form-control l_reposo'>
																		<option value='1' selected>Inmediatamente</option>
																		<option value='2'>Despues del Viaje</option>
																	</select><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Nombre Sintoma</label>
																	<input type='text' class='form-control' name='nombre_sintoma' value='$registro[nombre_sintoma]' onkeypress='return onlyWords(event)'><br><br>
																</div>
															</div>

															<div class='row'>
																<div class='col-md-12'>
																	<label>Descripcion </label><br>
																	<textarea name='descripcion_sintoma' cols='120' class='borde' rows='5' onkeypress='return onlyWords(event)'>$registro[descripcion]</textarea><br><br>
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
			</div>
		</div>

		<!--Contenedor de Recomendacion Signos-->
		<div>
			<a href='#seccion2' data-toggle='collapse' class='btn btn-success btn-lg'> <span class="glyphicon glyphicon-eye-open"></span> Signos</a>
			<div class='collapse' id='seccion2'>
				<br>
				<div class='well text-center'>
					<form action="" method="post" class="container panel tamaño_form" >
						<h3> Recomendaciones Signos</h3>
						<center>
							<input class="form-control colocar-icono" type="text" name="buscar" id="input2" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch('table2','input2')"><br><br>
						</center>
						<label><span class="glyphicon glyphicon-star"></span> Total Signos =  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_sugerencia_signo; ?>" disabled></label>
						<a href='library/reportes/Sugerencia/Signos/exportar_all_sugerencia_signo.php' onclick="alert_dinamic(event , 'Signos' , 'library/reportes/Sugerencia/Signos/exportar_all_sugerencia_signo.php')" class="btn btn-info"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
					</form>
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_signo_sugerencia");
						echo "<table id='table2' class='table table-bordered table-hover table-condensed text-center'>";
						//Encabezados con etiqueta TR
						echo "<tr class='active'>
								<th></th>
								<th><span class='glyphicon glyphicon-map-marker'></span> Id Sugerencia</th>
								<th><span class='glyphicon glyphicon-hourglass'></span> Orden Reposo</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Signo</th>
								<th><span class='glyphicon glyphicon-text-background'></span> Descripcion sugerencia</th>

							</tr>";
						foreach ($show as $registro) {
							//Contenido con la etiqueta
							echo"<tr>
									<th>
										<div class='btn-group dropup'>
											<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'> <span class='glyphicon glyphicon-plus'></span>
											</button>
											<ul class='dropdown-menu' role='menu'>
												<li><a href='#edit$registro[id_sugerencia]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
												<li><a href='library/reportes/Sugerencia/Signos/exportar_registro_sugerencia_signo.php?id_sug=$registro[id_sugerencia]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
											</ul>
										</div>
									</th>

									<td>$registro[id_sugerencia]</td>
									<td>$registro[reposo_asignado]</td>
									<td>$registro[nombre_signo]</td>
									<td>$registro[descripcion]</td>

								</tr>

								<div class='modal fade' id='edit$registro[id_sugerencia]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
									<div class='modal-dialog modal-lg'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title'>
													<center>
														<span class='glyphicon glyphicon-pencil'></span>
														Actualizar Registro de $registro[nombre_signo]
													</center>
												</h4>
											</div>
											<div class='modal-body'>
												<div class='form-group'>
													<form action='actualizar_sugerencia_signo.php' method='post'>
														<center>
															<input type='text' name='id_sugerencia' value='$registro[id_sugerencia]' hidden>
															<input type='text' name='nombre_signo_before' value='$registro[nombre_signo]' hidden>

															<div class='row'>
																<div class='col-md-6'>
																	<label>ID # </label>
																	<input type='text' class='form-control' name='id_sugerencia' value='$registro[id_sugerencia]' disabled><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Reposo Asigando </label>
																	<input type='text' class='form-control' value='$registro[reposo_asignado]' readonly><br><br>
																</div>
															</div>



															<div class='row'>
																<div class='col-md-6'>
																	<label>Tipo de Reposo disponibles</label><br>
																	<select name='reposo' class='form-control l_reposo'>
																		<option value='1' selected>Inmediatamente</option>
																		<option value='2'>Despues del Viaje</option>
																	</select><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Nombre Signo </label>
																	<input type='text' class='form-control' name='nombre_signo' value='$registro[nombre_signo]' onkeypress='return onlyWords(event)'><br><br>
																</div>
															</div>

															<div class='row'>
																<div class='col-md-12'>
																	<label>Descripcion </label><br>
																	<textarea name='descripcion_signo' class='borde' cols='120' rows='5' onkeypress='return onlyWords(event)'>$registro[descripcion]</textarea><br><br>
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
			</div>
		</div>

		<!--Contenedor de Recomendacion Alteraciones Emocionales-->
		<div>
			<a href='#seccion3' data-toggle='collapse' class='btn btn-warning btn-lg'> <span class="fa fa-thumbs-up"></span> Alteraciones Emocionales</a>
			<div class='collapse' id='seccion3'>
				<br>
				<div class='well text-center'>
					<form action="" method="post" class="container panel tamaño_form" >
						<h3>Recomendaciones Alteraciones Emocionales</h3>
						<center>
							<input class="form-control colocar-icono" type="text" name="buscar" id="input3" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch('table3','input3')"><br><br>
						</center>
						<label><span class="glyphicon glyphicon-star"></span> Total Alteraciones Emocionales = <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_a_emocional_sugerencia; ?>" disabled></label>
						<a href='library/reportes/Sugerencia/Alteraciones Emocionales/exportar_all_sugerencia_emocional.php' onclick="alert_dinamic(event , 'Alteraciones Emocionales' , 'library/reportes/Sugerencia/Alteraciones Emocionales/exportar_all_sugerencia_emocional.php')" class="btn btn-info"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
					</form>
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_a_emocional_sugerencia");
						echo "<table id='table3' class='table table-bordered table-hover table-condensed text-center'>";
						//Encabezados con etiqueta TR
						echo "<tr class='active'>
								<th></th>
								<th><span class='glyphicon glyphicon-map-marker'></span> Id Sugerencia</th>
								<th><span class='glyphicon glyphicon-hourglass'></span> Orden Reposo</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Alteracion Emocional</th>
								<th><span class='glyphicon glyphicon-text-background'></span> Descripcion sugerencia</th>

							</tr>";
						foreach ($show as $registro) {
							//Contenido con la etiqueta
							echo"<tr>
									<th>
										<div class='btn-group dropup'>
											<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'> <span class='glyphicon glyphicon-plus'></span>
											</button>
											<ul class='dropdown-menu' role='menu'>
												<li><a href='#edit$registro[id_sugerencia]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
												<li><a href='library/reportes/Sugerencia/Alteraciones emocionales/exportar_registro_sugerencia_emocional.php?id_sug=$registro[id_sugerencia]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
											</ul>
										</div>
									</th>

									<td>$registro[id_sugerencia]</td>
									<td>$registro[reposo_asignado]</td>
									<td>$registro[nombre_emocional]</td>
									<td>$registro[descripcion]</td>

								</tr>

								<div class='modal fade' id='edit$registro[id_sugerencia]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
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
											<div class='modal-body'>
												<div class='form-group'>
													<form action='actualizar_sugerencia_emocional.php' method='post'>
														<center>
															<input type='text' name='id_sugerencia' value='$registro[id_sugerencia]' hidden>
															<input type='text' name='nombre_emocional_before' value='$registro[nombre_emocional]' hidden>

															<div class='row'>
																<div class='col-md-6'>
																	<label>ID # </label>
																	<input type='text' class='form-control' name='id_sugerencia' value='$registro[id_sugerencia]' disabled><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Reposo Asignado </label>
																	<input type='text' class='form-control' value='$registro[reposo_asignado]' readonly><br><br>
																</div>
															</div>

															<div class='row'>
																<div class='col-md-6'>
																	<label>Tipo de Reposo disponibles</label><br>
																	<select name='reposo' class='form-control l_reposo'>
																		<option value='1' selected>Inmediatamente</option>
																		<option value='2'>Despues del Viaje</option>
																	</select><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Nombre Alteracion Emocional </label>
																	<input type='text' class='form-control' name='nombre_emocional' value='$registro[nombre_emocional]' onkeypress='return onlyWords(event)'><br><br>
																</div>
															</div>


															<div class='row'>
																<div class='col-md-12'>
																	<label>Descripcion </label><br>
																	<textarea name='descripcion_emocional' class='borde' cols='120' rows='5' onkeypress='return onlyWords(event)'>$registro[descripcion]</textarea><br><br>
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
			</div>
		</div>

		<!--Contenedor de Recomendacion Alteraciones Neurologica-->
		<div>
			<a href='#seccion4' data-toggle='collapse' class='btn btn-danger btn-lg'> <span class="fa fa-diamond"></span> Alteraciones Neurologica</a>
			<div class='collapse' id='seccion4'>
				<br>
				<div class='well text-center'>
					<form action="" method="post" class="container panel tamaño_form" >
						<h3>Recomendaciones Alteraciones Neurologica</h3>
						<center>
							<input class="form-control colocar-icono" type="text" name="buscar" id="input4" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch('table4','input4')"><br><br>
						</center>
						<label><span class="glyphicon glyphicon-star"></span> Total Alteraciones Neurologica =  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_a_neurologico_sugerencia; ?>" disabled></label>
						<a href='library/reportes/Sugerencia/Alteraciones Neurologicas/exportar_all_sugerencia_neurologica.php' onclick="alert_dinamic(event , 'Alteraciones Neurologicas' , 'library/reportes/Sugerencia/Alteraciones Neurologicas/exportar_all_sugerencia_neurologica.php')" class="btn btn-info"><span class="glyphicon glyphicon-download-alt tamaño-botones-general" onclick="alert_dinamic(event , 'Evaluadores Activos' , 'library/reportes/Evaluador')"></span></a>
					</form>
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_a_neurologico_sugerencia");
						echo "<table id='table4' class='table table-bordered table-hover table-condensed text-center'>";
						//Encabezados con etiqueta TR
						echo "<tr class='active'>
								<th></th>
								<th><span class='glyphicon glyphicon-map-marker'></span> Id Sugerencia</th>
								<th><span class='glyphicon glyphicon-hourglass'></span> Orden Reposo</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Alteracion Neurologica</th>
								<th><span class='glyphicon glyphicon-text-background'></span> Descripcion sugerencia</th>

							</tr>";
						foreach ($show as $registro) {
							//Contenido con la etiqueta
							echo"<tr>
									<th>
										<div class='btn-group dropup'>
											<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'> <span class='glyphicon glyphicon-plus'></span>
											</button>
											<ul class='dropdown-menu' role='menu'>
												<li><a href='#edit$registro[id_sugerencia]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
												<li><a href='library/reportes/Sugerencia/Alteraciones Neurologicas/exportar_registro_sugerencia_neurologica.php?id_sug=$registro[id_sugerencia]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
											</ul>
										</div>
									</th>

									<td>$registro[id_sugerencia]</td>
									<td>$registro[reposo_asignado]</td>
									<td>$registro[nombre_neurologico]</td>
									<td>$registro[descripcion]</td>

								</tr>

								<div class='modal fade' id='edit$registro[id_sugerencia]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
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
													<form action='actualizar_sugerencia_neurologica.php' method='post'>
														<center>
															<input type='text' name='id_sugerencia' value='$registro[id_sugerencia]' hidden>
															<input type='text' name='nombre_neurologico_before' value='$registro[nombre_neurologico]' hidden>

															<div class='row'>
																<div class='col-md-6'>
																	<label>ID # </label>
																	<input type='text' class='form-control' name='id_sugerencia' value='$registro[id_sugerencia]' disabled><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Reposo Asignado </label>
																	<input type='text' class='form-control' value='$registro[reposo_asignado]' readonly><br><br>
																</div>
															</div>


															<div class='row'>
																<div class='col-md-6'>
																	<label>Tipo de Reposo disponibles</label><br>
																	<select name='reposo' class='form-control l_reposo'>
																		<option value='1' selected>Inmediatamente</option>
																		<option value='2'>Despues del Viaje</option>
																	</select><br><br>
																</div>

																<div class='col-md-6'>
																	<label>Nombre Alteracion Neurologico</label>
																	<input type='text' class='form-control' name='nombre_neurologico' value='$registro[nombre_neurologico]' onkeypress='return onlyWords(event)'><br><br>
																</div>
															</div>

															<div class='row'>
																<div class='col-md-12'>
																	<label>Descripcion</label><br>
																	<textarea name='descripcion_neurologico' class='borde' cols='120' rows='5' onkeypress='return onlyWords(event)'>$registro[descripcion]</textarea><br><br>
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
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>