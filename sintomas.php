<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Sintomas</title>
	<?php include 'library/Head/Head_common.php'; ?>

</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--contenedor donde se encuentra el buscador y los botones directos-->
	<div class="container">
		<center class="container-fluid">
			<h2> Menú Sintomas
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_sintomas" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id Sintoma , Nombre Sintoma y Descripcion"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Sintoma" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Sintoma/exportar_all_sintomas.php' class="btn btn-info" onclick="alert_dinamic(event , 'Los Sintomas de Fatiga' , 'library/reportes/Sintoma/exportar_all_sintomas.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class="alinear_tipo_documento"><span class="glyphicon glyphicon-star"></span> Total Sintomas : <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_sintomas; ?>" disabled></label>
	</div>

	<!--contenedor donde se crea la tabla con la info de la Bd-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_sintomas");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> ID Sintoma</th>
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
									<li><a href='#edit$registro[id_sintoma]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Sintoma/exportar_registro_sintoma.php?id_sin=$registro[id_sintoma]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_sintoma]</td>
						<td>$registro[nombre_sintoma]</td>
						<td>$registro[descripcion_sintoma]</td>
					</tr>

					<div class='modal fade' id='edit$registro[id_sintoma]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
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
									<div class='form-group text-center'>
										<form action='actualizar_Sintoma.php' method='post'>
											<center>
												<input type='text' name='id_sintoma' value='$registro[id_sintoma]' hidden>
												<input type='text' name='desde' value='Sintomas' hidden>

												<div class='row'>
													<div class='col-md-6'>
														<label>Registro #  </label>
														<input type='text' class='form-control' name='id_sintoma' value='$registro[id_sintoma]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Nombre </label>
														<input type='text' class='form-control' name='sintoma' value='$registro[nombre_sintoma]' onkeypress='return onlyWords(event)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Descripcion </label><br>
														<textarea name='descripcion_sintoma' class='borde_textarea' onkeypress='return onlyWords(event)' cols='80' rows='5'>$registro[descripcion_sintoma]</textarea><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Valor de $registro[nombre_sintoma] </label><br>
														<input type='number' class='form-control' name='valor_sintoma' value='$registro[valor_sintoma]' onkeypress='return justNumbers(event,this.form.desde.value);'> Puntos.<br><br>
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

	<!--Modal cuando se registra un sintoma-->
	<div class="modal fade" id="registrar_Sintoma">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nuevo Sintoma</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_Sintoma.php" method="post">
						<center>
							<div class="row">
								<div class='col-md-12'>
									<div id="container_name_sintoma"></div>
									<input type="text" class="form-control" name="nombre_sintoma" id="nombre_sintoma" placeholder="Ingresar Nombre del Sintoma" onkeypress="return onlyWords(event)" onchange="check_name_sintoma();" required><br><br>
								</div>
							</div>

							<div class="rows">
								<div class='col-md-12'>
									<textarea name="descripcion_sintoma" id="descripcion_sintoma" class="borde_textarea" placeholder="Ingrese Descripcion Sintomas" cols='80' rows='5' onkeypress="return onlyWords(event)" onchange="style_border_input('descripcion_sintoma','verde')" required></textarea><br><br>
								</div>
							</div>

							<div class="row">
								<div class='col-md-12'>
									<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registrar_sintoma"></button>
								</div>
							</div>
						</center>
					</form>
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