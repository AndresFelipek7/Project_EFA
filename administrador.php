<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Administrador</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--contenedor para el buscador y los botones de acceso directo del menu-->
	<div class="container">
		<center>
			<h2> Menú Administrador <button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_administrador" data-toggle="tooltip" data-placement="left" title="Puede Buscar por : Nombre , Apellido , Numero Documento , Telefono y Correo"><span class="fa fa-info"></span></button></h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href='#registrar_Administrador' data-toggle='modal' class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='#administradores_inactivos' data-toggle='modal' data-target=".bs-example-modal-lg" class="btn btn-warning fa fa-user-times fa-2x tamaño-botones-general"></a>
		<a href="library/reportes/Administrador/exportar_all_administradores.php" class="btn btn-info" onclick="alert_dinamic(event , 'Administradores Activos' , 'library/reportes/Administrador/exportar_all_administradores.php')"> <span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<a href='#contenedor_mas_opciones' data-toggle='modal' class="btn btn-default glyphicon glyphicon-option-vertical btn-lg"></a>
	</div>

	<!--Contenedor donde mostramos la tabla de la Bd-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_administrador_activo");

			echo "<table class='table table-bordered table-hover table-condensed text-center data' id='table'>";
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Apellido</th>
					<th><span class='glyphicon glyphicon-pencil'></span> Numero Documento</th>
					<th><span class='glyphicon glyphicon-earphone'></span> Telefono</th>
					<th><span class='glyphicon glyphicon-pushpin'></span> Correo</th>
				</tr>";
			while($registro = mysqli_fetch_array($show)){
				if($registro["correo"] == "") {
					$valor_correo = "No se ingreso Ningun Correo";
				}else {
					$valor_correo = $registro["correo"];
				}

				if ($registro["sexo"] == "M") {
					$valor_Sexo_Seleccionado = "Masculino";
				}else {
					$valor_Sexo_Seleccionado = "Femenino";
				}
				echo"<tr>
						<td>
							<div class='btn-group dropup'>
								<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
									<span class='glyphicon glyphicon-plus'></span>
								</button>
								<ul class='dropdown-menu' role='menu'>
									<li><a href='#all$registro[documento]' data-toggle='modal'><span class='glyphicon glyphicon-list-alt'></span> Ver Registro Completo</a></li>
									<li><a href='#edit$registro[documento]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Administrador/exportar_registro_administrador.php?dc=$registro[documento]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</td>

						<td>$registro[nombre]</td>
						<td>$registro[apellido]</td>
						<td>$registro[documento]</td>
						<td>$registro[telefono]</td>
						<td>$valor_correo</td>
					</tr>

					<div class='modal fade' id='all$registro[documento]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'> <span class='glyphicon glyphicon-list-alt'></span> Registro Completo de $registro[nombre] $registro[apellido]</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<label>Registro # </label> $registro[idDatos]<br>
										<img width='150' height='150'src=' $registro[foto]' alt='Foto del Administrador' class='foto_generica'><br><hr>
										<label>Nombre = </label> $registro[nombre]<br>
										<label>Apellido = </label> $registro[apellido]<br>
										<label>Tipo de Perfil = </label> $registro[tipo_rol]<br>
										<label>Tipo Documento = </label> $registro[tipo_documento]<br>
										<label>Numero Documento = </label> $registro[documento]<br>
										<label>Edad = </label> $registro[edad]<br>
										<label>Sexo = </label> $valor_Sexo_Seleccionado<br>
										<label>Telefono = </label> $registro[telefono]<br>
										<label>Correo = </label> $valor_correo<br>
										<label>Fecha de Nacimiento = </label> $registro[nacimiento]<br>
										<label>Estado Actual = </label> $registro[estado]<br>
										<label>Nombre Usuario =</label> $registro[NombreUsuario]<br>
										<label>Contraseña = </label> $registro[password]<br>
									</div>
								</div>
								<div class='modal-footer form-inline'>
									<button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
								</div>
							</div>
						</div>
					</div>

					<div class='modal fade' id='edit$registro[documento]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'><span class='glyphicon glyphicon-pencil'></span> Actualizar Registro de $registro[nombre] $registro[apellido]</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<form action='actualizar_Administrador.php' method='post' enctype='multipart/form-data'>
											<center>
												<input type='text' name='idDatos' value='$registro[idDatos]' hidden><br><br>
												<img width='100' height='100'src=' $registro[foto]' alt='Foto del Administrador' class='foto_evaluador editar_evaluador'><br><br>
												<div id='extensiones_permitidas_administrador'></div>
												<label>Cambiar Foto</label> <input type='file' name='foto' onchange='comprueba_extension_foto_administrador_actualizacion(this.form,this.form.foto.value);'>
												<br><br><hr>

												<div class='cabecera_registro_modal'>
													<label>Registro # $registro[idDatos] </label><br><hr>
												</div>


												<div class='row'>
													<div class='col-md-4'>
														<label>Nombre </label>
														<input type='text' class='form-control' name='nombre' value='$registro[nombre]' onkeypress='return onlyWords(event)'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Apellido </label>
														<input type='text' class='form-control' name='apellido' value='$registro[apellido]' onkeypress='return onlyWords(event)'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Tipo Documento Actual </label>
														<input type='text' class='form-control' name='t_documento' value='$registro[tipo_documento]' onkeypress='return justNumbers(event)' readonly><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<center>
															<label>Tipo Documento Disponibles </label>
														</center>
														"?>
															<?php
																include "library/listas dinamicas/lista_Dinamico_t_Documento.php";
															?>
														<?php echo "
													</div>

													<div class='col-md-4'>
														<label>Documento </label>
														<input type='text' class='form-control' name='documento' value='$registro[documento]' onkeypress='return justNumbers(event);' onchange='validar_digitos_documento_administrador(this.form.documento.value);'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Edad </label>
														<input type='text' class='form-control' name='edad' value='$registro[edad]' onkeypress='return justNumbers(event);' onchange='comprobar_edad_valida_administrador(this.form.edad.value);'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<div id='verificar_telefono_administrador'></div>
														<label>Telefono </label>
														<input type='text' class='form-control' name='telefono' value='$registro[telefono]' onkeypress='return justNumbers(event);' onchange='validar_telefono_administrador_actualizacion(this.form.telefono.value);'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Correo </label>
														<input type='text' class='form-control' name='correo' value='$registro[correo]'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Fecha de Nacimiento </label>
														<input type='date' class='form-control' name='nacimiento' value='$registro[nacimiento]'><br><br>
													</div>
												</div>


												<div class='row'>
													<div class='col-md-4'>
														<center>
															<label>Estado </label>
														</center>
														<select name='estado' required='required' class='form-control estado'>
															<option value='1' selected>Activo</option>
															<option value='2'>Desactivo</option>
														</select><br><br>
													</div>

													<div class='col-md-4'>
														<label>Tipo Rol </label>
														<input type='text' class='form-control' name='id_rol' value='$registro[tipo_rol]' onkeypress='return onlyWords(event)' readonly><br><br>
													</div>

													<div class='col-md-4'>
														<label>Nombre Usuario </label>
														<input type='text' class='form-control' name='name_usuario' value='$registro[NombreUsuario]' onkeypress='return onlyWords(event)'><br><br>
													</div>
												</div>


												<div class='row'>
													<div class=' col-md-4'>
														<label>Contraseña </label>
														<input type='text' class='form-control' name='pass_usuario' value='$registro[password]'><br><br>
													</div>

													<div class=' col-md-4'>
														<label>Sexo Seleccionado </label>
														<input type='text' class='form-control' name='' value='$valor_Sexo_Seleccionado' readonly><br><br>
													</div>

													<div class='col-md-4'>
														<label>Elegir Sexo</label><br>
														<select name='elegir_sexo' class='l_sexo'>
															<option value='M'>Masculino</option>
															<option value='F'>Femenino</option>
														</select>
													</div>
												</div>


												<div>
													<hr>
													<button type='submit' id='a_administrador' class='btn btn-warning btn-md'><span class='glyphicon glyphicon-ok'></span></button>
												</div>
											</center>
										</form>
									</div>
								</div>
								<div class='modal-footer form-inline'>
									<button type=button' class='btn btn-danger btn-md' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
								</div>
							</div>
						</div>
					</div>
				</div>";
			}
			echo "</table>";
		?>
	</div>

	<!-- contenedor donde esta el modal de registro -->
	<div class="modal fade" id="registrar_Administrador">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"> Registro del Administrador</span></h4>
				</div>

				<div class="modal-body">
					<form action="registro_administrador.php" method="post" enctype="multipart/form-data" name="f_registro">
						<center>
							<input type="hidden" name="desde" value="Administrador">

							<div class="col-md-12">
								<div id="container_check_full_name"></div>
							</div>

							<button id="button_clean_full_name" class="btn btn-primary fa fa-eraser fa-2x hide_button"> Limpiar</button>

							<div class="row">
								<div class="col-md-6">
									<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Colocar nombre" onkeypress="return onlyWords(event)" onchange="check_full_name(this.form.nombre.value,this.form.apellido.value,this.form.desde.value);" autofocus required><br><br>
								</div>
								<div class="col-md-6">
									<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Colocar apellido" onkeypress="return onlyWords(event)" onchange="check_full_name(this.form.nombre.value,this.form.apellido.value,this.form.desde.value);" required><br><br>
								</div>
							</div>

							<label>Tipo de documentos Disponibles</label><br>
							<?php
								include "library/listas dinamicas/lista_Dinamico_t_Documento.php";
							?>

							<div id="check_document_bd"></div>
							<input type="text" name="documento" class="form-control" id="numero_documento" placeholder="Colocar documento" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_document_duplicate_admin(); check_digit_document(this.form.documento.value,'administrador.php');" required><br><br>

							<label>Elegir Sexo</label><br>
							<select name="elegir_sexo" class="l_sexo">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select><br><br>

							<div id="container_check_age"></div>
							<input type="text" name="edad" id="edad" class="form-control" placeholder="Colocar edad" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_age(this.form.edad.value , 'administrador.php');" required><br><br>

							<div id="container_check_number_phone"></div>
							<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Colocar telefono" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_number_phone(this.form.telefono.value,this.form.desde.value);" required><br><br>

							<strong class="campos_opcionales"> *Opcional*</strong>
							<div id="container_check_email"></div>
							<input type="text" name="correo" id="email" class="form-control" placeholder="Colocar correo" onchange="check_email(this.form.correo.value)"><br><br>

							<div id="container_check_date_born"></div>
							<label>Fecha de Nacimiento (Cumplidos)</label><br>
							<input type="date" name="f_nacimiento" class="form-control" id="f_nacimiento" placeholder="AAAA-MM-DD" onchange="check_date_born(this.form.f_nacimiento.value,this.form.edad.value);" required><br><br>

							<div class="" id="container_check_username"></div>
							<input type="text" name="txtusuario" id="txtusuario" class="form-control" placeholder="Colocar Usuario" onchange="check_username(this.form.txtusuario.value,'Administradores');" required><br><br>

							<button type="button" class="btn btn-md btn-warning hide_container" id="ayuda_mostrar_pass" data-toggle="tooltip" data-placement="left" title="Para mostrar la contraseña le das click al icono del ojo , para ocultar le das doble click al mismo icono.">
								<span class="fa fa-info"></span>
							</button>
							<div id="container_check_password"></div>
							<input type="password" name="txtpass" id="txtpass" class="form-control" placeholder="Colocar Contraseña" onchange="check_password(this.form.txtpass.value,'Administradores') , show_input_pasword();" required><br><br>
							<i class="fa fa-eye hide_container" id="show_pass"></i><br><br>

							<div id="container_extensiones_agree"></div>
							<label class="control-label">Cargar Foto Administrador </label><strong class="campos_opcionales"> *Opcional*</strong>
							<input type="file" class="file" name="foto" onchange="check_photo(this.form.foto.value);"><br><br>

							<div class="contenedor_habeas">
								<input type="checkbox" id="habeas" name="habeas_data" onclick="show_habeas_data();">
								<label for="habeas" id="label_habeas">Acepto las condiciones de uso</label><br>
							</div>

							<div id="contenedor_habeas_data" class="hide-container">
								<p>La Corte Constitucional lo definió como el derecho que otorga la facultad al titular de datos personales de exigir de las administradoras de esos datos el acceso, inclusión, exclusión, corrección, adición, actualización y certificación de los datos, así como la limitación en las posibilidades de su divulgación, publicación o cesión, de conformidad con los principios que regulan el proceso de administración de datos personales. Asimismo, ha señalado que este derecho tiene una naturaleza autónoma que lo diferencia de otras garantías con las que está en permanente relación, como los derechos a la intimidad y a la información.</p>
								<p class="container_habeas_data">De acuerdo a lo anterior el usuario registrado autoriza el uso y manejo de sus datos personales para esta aplicacion</p>
							</div>

							<button type="submit" id="boton_registrar" class="btn btn-primary btn-lg glyphicon glyphicon-ok" disabled></button>
						</center>
					</form>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal para los administradores inactivos-->
	<div class="modal fade bs-example-modal-lg" id="administradores_inactivos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						<span class="glyphicon glyphicon-arrow-down">
							Administradores Inactivos
						</span>
					</h4>
				</div>

				<div class="modal-body">
					<center>
						<div class="row">
							<a href='library/reportes/Administrador/exportar_all_administrador_inactivos.php' id="all_download_actived_log" class="btn btn-default btn-lg glyphicon glyphicon-download-alt center-a" onclick="alert_dinamic(event , 'Administradores Inactivos' , 'library/reportes/Administrador/exportar_all_administrador_inactivos.php')"></a>
							<button id="ocultar_form_activacion" onclick="hidden_form_actived()" class="fa fa-eye-slash fa-3x btn btn-default btn-lg center-a-hidden hide_container"></button>
						</div>
					</center>
					<div id="container_actived"> </div>
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_administrador_inactivo");
						$count = $show->num_rows;

						if ($count >= 1) {
							echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
							echo "<tr class='active'>
									<th><span class='fa fa-file-image-o'> Foto</th>
									<th><span class='fa fa-hashtag'></span> ID</th>
									<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
									<th><span class='glyphicon glyphicon-list-alt'></span> Apellido</th>
									<th><span class='glyphicon glyphicon-pencil'></span> Numero Documento</th>
									<th><span class='fa fa-file-pdf-o'></span> Exportar PDF</th>
									<th><span class='glyphicon glyphicon-save'></span> Activar Evaluador</th>
								</tr>";
							while($registro = mysqli_fetch_array($show)){
								$valor_Id_datos = $registro["idDatos"];
								$valor_nombre_completo = $registro["nombre"] ." ".$registro["apellido"];
								echo"<tr>
										<td><img width='100 height='100' src='$registro[foto]' alt='Foto del Administrador Inactivo' class='foto_generica'></td>
										<td>$registro[idDatos]</td>
										<td>$registro[nombre]</td>
										<td>$registro[apellido]</td>
										<td>$registro[documento]</td>
										<td> <a href='library/reportes/Administrador/exportar_registro_administrador_inactivo.php?ad=$registro[documento]' data-toggle='modal' class='glyphicon glyphicon-download-alt btn btn-default btn-md'> </a> </td>
										<form>
											<input type='text' name='nombre_completo' value='$valor_nombre_completo' hidden>
											<input type='text' name='id_dato' value='$valor_Id_datos' hidden>
											<input type='text' name='from' value='activar_administrador.php' hidden>
											<td> <input class='btn btn-primary' onclick='show_container_description_actived(this.form.nombre_completo.value,this.form.id_dato.value,this.form.from.value);' value='Seleccionar' readonly> </td>
										</form>
									</tr>";
							}
							echo "</table>";
						}else {
							only_empty_user_disabled('Administradores');
						}
					?>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"></button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal de mas opciones-->
	<div id="contenedor_mas_opciones" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-anchor"> Total Menú Administradores Por Genero</span></h4>
				</div>

				<div class="modal-body">
					<center>
						<div class="row">
							<h3>General</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-star fa-2x"></span>
										Activos
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $total_administrador; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
										<span class="fa fa-star-o fa-2x"></span>
										Inactivos
										<input type="text" class="btn btn-danger btn-md redondear" value="<?php echo $total_administrador_inactivo; ?>" disabled>
								</label>
							</div>
						</div>

						<hr>

						<div class="row">
							<h3>Activos</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-user fa-3x"></span>
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $administradores_Hombres_Activo; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
									<span class="fa fa-female fa-3x"></span>
										<input type="text" class="btn btn-primary btn-md redondear" value="<?php echo $administradores_Mujeres_Activo; ?>" disabled>
								</label>
							</div>
						</div>

						<hr>

						<div class="row">
							<h3>Inactivos</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-user fa-3x"></span>
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $administradores_Hombres_Inactivo; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
									<span class="fa fa-female fa-3x"></span>
										<input type="text" class="btn btn-primary btn-md redondear" value="<?php echo $administradores_Mujeres_Inactivo; ?>" disabled>
								</label>
							</div>
						</div>

					</center>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div><br>

	<?php include 'library/Footer.php'; ?>
</body>
</html>