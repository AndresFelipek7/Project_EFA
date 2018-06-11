<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Signos</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contendor donde se encuentra el buscador y los botones-->
	<div class="container">
		<center class="container-fluid">
			<h2> Menú Signos
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_signo" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id Signo , Nombre Signo y Descripcion"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Signo" data-toggle="modal" class="btn btn-primary fa fa-plus-square fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Signo/exportar_all_signo.php' class="btn btn-info" onclick="alert_dinamic(event , 'Los Signos de Fatiga' , 'library/reportes/Signo/exportar_all_signo.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<a href="#update_value_item" data-toggle="modal" class="btn btn-warning fa fa-cogs fa-2x tamaño-botones-general"></a>
		<label class="alinear_total_derecha"><span class="glyphicon glyphicon-star"></span> Total Signos =  <input type="text" class="btn btn-danger btn-xs" value="<?php echo $total_signo; ?>" disabled></label>
	</div>

	<!--contenedor donde se muestra la tabla con la info de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_signos_admin");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> ID Signo</th>
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
									<li><a href='#edit$registro[id_signo]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Signo/exportar_registro_signo.php?id_sig=$registro[id_signo]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_signo]</td>
						<td>$registro[nombre_signo]</td>
						<td>$registro[descripcion_signo]</td>
					</tr>

					<div class='modal fade' id='edit$registro[id_signo]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
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
								<div class='modal-body text-center'>
									<div class='form-group text-center'>
										<form action='actualizar_signo.php' method='post'>
											<center>
												<input type='text' name='id_signo' value='$registro[id_signo]' hidden>
												<input type='text' name='desde' value='Signos' hidden>

												<div class='row'>
													<div  class='col-md-6'>
														<label>ID # </label>
														<input type='text' class='form-control' name='id_signo' value='$registro[id_signo]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Nombre </label>
														<input type='text' class='form-control' name='nombre_signo' value='$registro[nombre_signo]' onkeypress='return onlyWords(event)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Descripcion </label><br>
														<textarea name='descripcion_signo' class='borde_textarea' onkeypress='return onlyWords(event)' cols='80' rows='5'>$registro[descripcion_signo]</textarea><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Valor de $registro[nombre_signo] </label><br>
														<input type='number' class='form-control' name='valor_signo' value='$registro[valor_signo]' onkeypress='return justNumbers(event,this.form.desde.value);'> Puntos.<br><br>
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

	<!--Modal para el registro de signos-->
	<div class="modal fade" id="registrar_Signo">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nuevo Signos</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_Signo.php" method="post">
						<input type='text' name='desde' value='Signos' hidden>
						<center>
							<div class="row">
								<div class='col-md-12'>
									<div id="container_name_signo"></div>
									<input type="text" class="form-control" name="nombre_signo" id="nombre_signo" placeholder="Ingresar Nombre Signo" onkeypress="return onlyWords(event)" onchange="check_name_signo();" required><br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<textarea name="descripcion_signo" id="descripcion_signo" class="borde_textarea" placeholder="Ingrese Descripcion Signo" cols="80" rows="5" onkeypress="return onlyWords(event)" onchange="style_border_input('descripcion_signo','verde')" required></textarea><br><br>
								</div>
							</div>

							<div class='row'>
								<div class='col-md-12'>
									<input type='number' class='form-control' name='valor_signo' placeholder="Ingrese valor de Signo" onkeypress='return justNumbers(event,this.form.desde.value);' required> Puntos.<br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registro_signo"></button>
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

	<!-- Modal para editar info de valores de cada item -->
	<div class="modal fade" id="update_value_item">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-cog"></span> Editar Valores de Cada Signo</h4>
				</div>

				<div class="modal-body text-center">
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_signos_admin");
						echo "<ul>";
							foreach ($show as $item) {
								echo "<div class='container-fluid row'>";
										echo "<div class='col-md-6'>";
											panel_info_for_modal("panel-info", $item['nombre_signo'], "
												<form action='actualizar_valores_signos.php' method='POST' name='items_sintoma'>
													<input type='text' id='test' name='input_test' value='este es el contenido' hidden>
													<input type='text' id='sintoma$item[valor_signo]' value='$item[valor_signo]' class='form-control' disabled>
													<input type='checkbox' id='active_item_sintomas' value='sintoma$item[id_signo]' name='active_item' onclick='active_input(this.form.input_test.value)'>");
										echo "</div>";
									echo "<div>";
							}
							echo "<div class='col-md-12'>
								<hr><br><button type='submit' class='btn btn-warning'><span class='glyphicon glyphicon-ok'></span></button></form></div>";
						echo "</ul>";
					?>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"></button>
				</div>
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>