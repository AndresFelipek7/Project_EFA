<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Vehiculo</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor donde se encuentra el buscador-->
	<div class="container">
		<center class="container-fluid">
			<h2>Menú Vehiculos
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_vehiculo" data-toggle="tooltip" data-placement="left" title="Puede buscar por : Id Vehiculo , Empresa , Marca , Numero Interno , Placa y Modelo"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Vehiculo"  data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Vehiculo/exportar_all_vehiculos.php' class="btn btn-info" onclick="alert_dinamic(event , 'Los Vehiculos' , 'library/reportes/Vehiculo/exportar_all_vehiculos.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class="alinear_total_derecha"><span class="glyphicon glyphicon-star"></span> Total Vehiculos : <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_vehiculos; ?>" disabled></label>
	</div>

	<!--Contenedor donde se encuentra la tabla y la informacion de la BD-->
	<div class="container" id="contenid_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_vehiculo");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			//Encabezados con etiqueta TR
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> Id Vehiculo</th>
					<th><span class='fa fa-bus'></span> Empresa</th>
					<th><span class='fa fa-bookmark'></span> Marca</th>
					<th># Numero Interno</th>
					<th><span class='fa fa-tag'></span> Placa</th>
					<th><span class='fa fa-compress'></span> Modelo</th>
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
									<li><a href='#edit$registro[id_vehiculo]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/vehiculo/exportar_registro_vehiculo.php?id_vh=$registro[id_vehiculo]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_vehiculo]</td>
						<td>$registro[nombre_empresa]</td>
						<td>$registro[marca]</td>
						<td>$registro[numero_interno]</td>
						<td>$registro[placa]</td>
						<td>$registro[modelo]</td>

					</tr>

					<div class='modal fade' id='edit$registro[id_vehiculo]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro con la placa <strong>$registro[placa]</strong>
										</center>
									</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<form action='actualizar_Vehiculo.php' method='post'>
											<center>
												<input type='text' name='id_vehiculo' value='$registro[id_vehiculo]' hidden><br><br>

												<div class='row'>
													<div class='col-md-6'>
														<label>Id Vehiculo </label>
														<input type='text' class='form-control' name='id_vehiculo' value='$registro[id_vehiculo]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Nombre Empresa </label>
														<input type='text' class='form-control' name='name_empresa' value='$registro[nombre_empresa]' onkeypress='return onlyWords(event)' readonly><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-6'>
														"?>
															<?php
																include "library/listas dinamicas/lista_Dinamica_empresa.php";
															?>
														<?php echo "
													</div>

													<div class='col-md-6'>
														<label>Marca </label>
														<input type='text' class='form-control' name='marca' value='$registro[marca]' onkeypress='return onlyWords(event)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-6'>
														<label>Numero Interno </label>
														<input type='text' class='form-control' name='numero_interno' value='$registro[numero_interno]' onkeypress='return justNumbers(event)'><br><br>
													</div>

													<div class='col-md-6'>
														<label>Placa </label>
														<input type='text' class='form-control' name='placa' value='$registro[placa]'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-6'>
														<label>Modelo</label>
														<input type='text' class='form-control' name='modelo' value='$registro[modelo]' onkeypress='return justNumbers(event)'><br><br>
													</div>

													<div class='col-md-6'>
														<label>Fecha de Revision Tecnicomecanica</label>
														<input type='date' class='form-control' name='fecha_revision' value='$registro[fecha_revision]' onkeypress='return justNumbers(event)'><br><br>
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
									<button type=button' class='btn btn-danger glyphicon glyphicon-remove' data-dismiss='modal'> </button>
								</div>
							</div>
						</div>
					</div>";
			}
			echo "</table>";
		?>
	</div>

	<!--Modal de registro Vehiculo-->
	<div class="modal fade" id="registrar_Vehiculo">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nuevo Vehiculo</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_Vehiculo.php" method="post">
						<input type="hidden" name="desde" value="Vehiculo">
						<center>
							<?php
								include "library/listas dinamicas/lista_Dinamica_empresa.php";
							?>
							<label>Marca</label><br>
							<?php
								include "library/listas dinamicas/lista_Dinamica_marca.php";
							?>
							<div id="check_number_inside"></div>
							<input type="text" class="form-control" name="numero_interno" placeholder="Ingresar Numero Interno" id="numero_interno" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_number_inside_car()" required><br><br>

							<div id="container_check_placa"></div>
							<input type="text" class="form-control" name="placa" placeholder="Ingresar Placa" id="placa" onchange="check_placa_car();" required><br><br>

							<input type="text" class="form-control" name="modelo" id="modelo" placeholder="Ingresar Modelo" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_age_car(this.form.modelo.value)" required><br><br>

							<label>Fecha de la Ultima Revision Tecnicomecanica</label><br><br>
							<input type="date" class="form-control" name="fecha_revision" id="fecha_revision" placeholder="AAAA-MM-DD" onchange="check_date_test_car(this.form.modelo.value,this.form.fecha_revision.value)" required><br><br>

							<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registrar_vehiculo"></button>
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