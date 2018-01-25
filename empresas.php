<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Empresa</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor donde se encuentra el buscador y los botones de acceso directo del menu-->
	<div class="container">
		<center class="container-fluid">
			<h2>Menú Empresas
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_empresas" data-toggle="tooltip" data-placement="left" title="Puede buscar por : Id Empresa , Nombre Ruta , NIT  y Nombre Empresa"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Empresa" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Empresa/exportar_all_empresa.php' class="btn btn-info" onclick="alert_dinamic(event , 'La Empresa' , 'library/reportes/Empresa/exportar_all_empresa.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class='alinear_total_derecha'><span class="glyphicon glyphicon-star"></span> Total Empresa :  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_empresas; ?>" disabled></label>
	</div>

	<!--Contenedor donde se crea la tabla cargada con la informacion de la Bd-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_empresa");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			//Encabezados con etiqueta TR
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> Id Empresa</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Ruta</th>
					<th><span class='glyphicon glyphicon-screenshot'></span>NIT</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Empresa</th>
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
									<li><a href='#edit$registro[id_empresa]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/empresa/exportar_registro_empresa.php?id_emp=$registro[id_empresa]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_empresa]</td>
						<td>$registro[nombre_ruta]</td>
						<td>$registro[nit]</td>
						<td>$registro[name_empresa]</td>

					</tr>
					<div class='modal fade' id='edit$registro[id_empresa]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro de $registro[name_empresa]
										</center>
									</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<form action='actualizar_Empresa.php' method='post'>
											<center>
												<input type='text' name='id_empresa' value='$registro[id_empresa]' hidden><br><br>

												<div class='row'>
													<div class='col-md-6'>
														<label>Id Empresa  </label>
														<input type='text' class='form-control' name='id_empresa' value='$registro[id_empresa]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Ruta Actual </label>
														<input type='text' class='form-control' name='ruta' value='$registro[nombre_ruta]' onkeypress='return onlyWords(event)' readonly><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-6'>
														<center>
															<label>Rutas Disponibles </label>
														</center>
														"?>
															<?php
																include "library/listas dinamicas/lista_Dinamica_rutas_Empresa.php";
															?>
														<?php echo "
													</div>

													<div class='col-md-6'>
														<label>NIT  </label>
														<input type='text' class='form-control' name='nit' value='$registro[nit]' onkeypress='return justNumbers(event)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Empresa  </label>
														<input type='text' class='form-control' name='nombre_empresa' value='$registro[name_empresa]' onkeypress='return onlyWords(event)'><br><br>
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
									<button type=button' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
								</div>
							</div>
						</div>
					</div>";
			}
			echo "</table>";
		?>
	</div>

	<!--Modal para cuando se registra una empresa-->
	<div class="modal fade" id="registrar_Empresa">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nueva Empresa</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_Empresa.php" method="post">
						<center>
							<input type="hidden" name="desde" value="Empresa">
							<input type="hidden" name="Registro" value="Registro Empresa">

							<label>Rutas Disponibles</label><br>
							<?php
								include "library/listas dinamicas/lista_Dinamica_rutas.php";
							?>
							<div id="container_check_nit"></div>
							<input type="text" class="form-control" name="nit" id="nit" placeholder="Ingresar NIT" onkeypress="return justNumbers(event,this.form.desde.value)" onchange="check_nit();" required><br><br>

							<div id="container_check_name_enterprise"></div>
							<input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre de la empresa" onkeypress="return onlyWords(event)" onchange="check_name_enterprise(this.form.Registro.value)" required><br><br>

							<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registrar_empresa"></button>
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