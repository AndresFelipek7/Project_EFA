<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Roles</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor donde se encuentra el buscador y los botones de acceso directo del menu-->
	<div class="container">
		<center class="container-fluid">
			<h2> Menú Rol
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_rol" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id rol y Nombre Rol"><span class="fa fa-info"></span></button>
			</h2>
		<input class="form-control colocar-icono" type="text" id="input" placeholder="Buscar..." autofocus onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Rol" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Rol/exportar_all_roles.php' class="btn btn-info" onclick="alert_dinamic(event , 'Roles' , 'library/reportes/Rol/exportar_all_roles.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class="alinear_total_derecha"><span class="glyphicon glyphicon-star"></span> Total Roles =  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_roles; ?>" disabled></label>
	</div>

	<!--contenedor para crear la tabla llenada con la info de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_rol");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			//Encabezados con etiqueta TR
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> Id Rol</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Perfil</th>
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
									<li><a href='#edit$registro[id_rol]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/Reportes/Rol/exportar_registro_rol.php?id_ro=$registro[id_rol]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_rol]</td>
						<td>$registro[nombre_perfil]</td>
					</tr>

					<div class='modal fade' id='edit$registro[id_rol]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro de $registro[nombre_perfil]
										</center>
									</h4>
								</div>
								<div class='modal-body'>
									<div class='form-group text-center'>
										<form action='actualizar_Rol.php' method='post'>
											<center>
												<input type='text' name='id_rol' value='$registro[id_rol]' hidden><br><br>

												<div class='row'>
													<div class='col-md-6'>
														<label>Id Rol </label>
														<input type='text' class='form-control' name='id_rol' value='$registro[id_rol]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Nombre Perfil </label>
														<input type='text' class='form-control' name='nombre_rol' value='$registro[nombre_perfil]' onkeypress='return onlyWords(event)'><br><br>
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
									<button type='button' data-dismiss='modal' class='btn btn-danger glyphicon glyphicon-remove'> </button>
								</div>
							</div>
						</div>
					</div>";
			}
			echo "</table>";
		?>
	</div>

	<!--Modal de registro rol-->
	<div class="modal fade" id="registrar_Rol">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nuevo Rol</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_rol.php" method="post">
						<center>
							<div class="row">
								<div class=' col-md-12'>
									<div id="container_check_name_rol"></div>
									<input type="text" class="form-control" name="rol" id="nombre_rol" placeholder="Ingrese Nombre rol" onkeypress="return onlyWords(event)" onchange="check_name_rol();" required><br><br>
								</div>
							</div>

							<div class="row">
								<div class=' col-md-12'>
									<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registrar_rol"></button>
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