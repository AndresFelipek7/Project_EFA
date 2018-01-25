<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Tipo Documento</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor donde se muestra el buscador y los botones debajo de el-->
	<div class="container">
		<center class="container-fluid">
			<h2>Menú Tipo Documento
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_t_documento" data-toggle="tooltip" data-placement="left" title="Se puede buscar por : Id Tipo Documento y Nombre Documento"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_t_Documento" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Tipo_Documento/exportar_all_t_documento.php' id="download_link" class="btn btn-info" onclick="alert_dinamic(event , 'Tipo Documento' , 'library/reportes/Tipo_Documento/exportar_all_t_documento.php')"><span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class="alinear_tipo_documento"><span class="glyphicon glyphicon-star"></span> Total Tipo documento :  <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_t_documento; ?>" disabled></label>
	</div>

	<!--contenedor donde se crea la tabla con la info de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_t_documento");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center estilos_tabla'>";
			//Encabezados con etiqueta TR
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> Id Tipo Documento</th>
					<th># Nombre documento</th>
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
									<li><a href='#edit$registro[id_tipo_documento]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Tipo_Documento/exportar_registro_t_documento.php?id_do=$registro[id_tipo_documento]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_tipo_documento]</td>
						<td>$registro[nombre_documento]</td>

					</tr>

					<div class='modal fade' id='edit$registro[id_tipo_documento]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro de $registro[nombre_documento]
										</center>
									</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<form action='actualizar_T_documento.php' method='post'>
											<center>
												<input type='text' name='id_documento' value='$registro[id_tipo_documento]' hidden><br><br>

												<div class='row'>
													<div class='col-md-6'>
														<label>Id Tipo documento </label>
														<input type='text' class='form-control' name='id_documento' value='$registro[id_tipo_documento]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<label>Nombre del Documento </label>
														<input type='text' class='form-control' name='documento' value='$registro[nombre_documento]' onkeypress='return onlyWords(event)'><br><br>
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

	<!--Modal cuando se registra un tipo documento-->
	<div class="modal fade" id="registrar_t_Documento">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nuevo Tipo Documento</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_Documento.php" method="post">
						<center>
							<div class="row">
								<div class=' col-md-12'>
									<div id="container_check_type_document"></div>
									<input type="text" class="form-control" name="documento" placeholder="Nombre Documento" id="nombre_t_documento" onkeypress="return onlyWords(event)" onchange="check_type_document();" required><br><br>
								</div>
							</div>

							<div class="row">
								<div class=' col-md-12'>
									<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registrar_tipo_documento"></button>
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