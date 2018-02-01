<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Conductores</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Formulario donde se encuentra los botones y el buscador indexado-->
	<div class="container">
		<center class="container-fluid">
			<h2>Menú Conductor <button type="button" class="btn btn-primary" id="ayuda_general_busqueda_conductor" data-toggle="tooltip" data-placement="left" title="Puede Buscar Por : Nombre , Apellido , Numero Documento , Correo y Telefono"><span class="fa fa-info"></span></button></h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Conductor" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href="#conductores_inactivos" data-toggle="modal" class="btn btn-warning fa fa-user-times fa-2x tamaño-botones-general"></a>
		<a href="library/reportes/Conductor/exportar_all_conductores.php" class="btn btn-info" onclick="alert_dinamic(event , 'Conductores Activos' , 'library/reportes/Conductor/exportar_all_conductores.php')"> <span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<a href='#contenedor_mas_opciones' data-toggle='modal' class="btn btn-default glyphicon glyphicon-option-vertical btn-lg"></a>
	</div>

	<!--Tabla dinamica cargada con la informacion de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_conductor_activo");
			echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
			//Encabezados con etiqueta TR de la tabla
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Apellido</th>
					<th><span class='glyphicon glyphicon-pencil'></span> Numero Documento</th>
					<th><span class='glyphicon glyphicon-earphone'></span> Telefono</th>
					<th><span class='glyphicon glyphicon-pushpin'></span> Correo</th>
				</tr>";
			while($registro = mysqli_fetch_array($show)){
				//Sacamos el contenido de la columa quien_registro para poder separarlo con la funcion explode solo el nombre y no el id que contiene esta columna
				$quien_registro = $registro["quien_registro"];
				$separar_solo_nombre_admin = explode(" " , $quien_registro);

				//Condicional para saber si es correo esta vacio o no
				if($registro["correo"] == "") {
					$valor_correo = "No se ingreso Ningun Correo";
				}else {
					$valor_correo = $registro["correo"];
				}

				//Condicional para poder color el texto correcto del tipo de sexo seleccionado
				if ($registro["sexo"] == "M") {
					$valor_Sexo_Seleccionado = "Masculino";
				}else {
					$valor_Sexo_Seleccionado = "Femenino";
				}

				//Contenido de la tabla desde la BD
				echo"<tr>
						<th>
							<div class='btn-group dropup'>
								<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
									<span class='glyphicon glyphicon-plus'></span>
								</button>
								<ul class='dropdown-menu' role='menu'>
									<li><a href='#all$registro[documento]' data-toggle='modal'><span class='glyphicon glyphicon-list-alt'></span> Ver Registro Completo</a></li>
									<li><a href='#edit$registro[documento]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/Conductor/exportar_registro_conductor.php?id_eva=$registro[documento]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

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
									<h4 class='modal-title'><span class='glyphicon glyphicon-list-alt'></span> Registro Completo de $registro[nombre] $registro[apellido]</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<label>Registro # </label> $registro[id_conductor]<br>
										<img width='150' height='150'src=' $registro[foto]' alt='Foto del Conductor' class='foto_generica'><br><br><hr>
										<label>Nombre = </label> $registro[nombre]<br>
										<label>Apellido = </label> $registro[apellido]<br>
										<label>Tipo Documento = </label> $registro[Tipo_Documento]<br>
										<label>Numero Documento = </label> $registro[documento]<br>
										<label>Edad = </label> $registro[edad]<br>
										<label>Sexo = </label> $valor_Sexo_Seleccionado<br>
										<label>Telefono = </label> $registro[telefono]<br>
										<label>Correo = </label> $valor_correo<br>
										<label>Fecha de Nacimiento = </label> $registro[nacimiento]<br>
										<label>Estado Actual = </label> $registro[Estado]<br>
										<label>Empresa = </label> $registro[Empresa]<br>
										<label>Placa = </label> $registro[Placa]<br>
										<label>EPS = </label> $registro[eps]<br>
										<label>ARP = </label> $registro[arp]<br>
										<label>Talla = </label> $registro[talla]<br>
										<label>Peso = </label> $registro[peso]<br>
										<label>Grupo Sanguineo = </label> $registro[gSanguineo]<br>
										<label>Usuario Aplicacion Mi Fit = </label> $registro[usuario_fit]<br>
										<label>Contraseña Aplicacion Mi Fit = </label> $registro[pass_fit]<br><hr>
										<label>Lo registro el Usuario = </label> $separar_solo_nombre_admin[2]<br>
										<label>Cuando se Registro = </label> $registro[fecha_ingreso]<br>
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
									<div class='form-group'>
										<form action='actualizar_Conductor.php' method='post' enctype='multipart/form-data'>
											<center>
												<input type='text' name='id_conductor' value='$registro[id_conductor]' hidden><br><br>
												<input type='text' name='idDatos' value='$registro[idDatos]' hidden>
												<img width='100' height='100'src=' $registro[foto]' alt='Foto del Conductor' class='foto_evaluador editar_evaluador'><br><br>
												<div id='extensiones_permitidas'></div>
												<label>Cambiar Foto</label> <input type='file' name='foto_nueva' onchange='comprueba_extension_foto_conductor_actualizacion(this.form,this.form.foto_nueva.value);'>
												<br><br><hr>

												<div class='cabecera_registro_modal'>
													<label>Registro # $registro[id_conductor] </label><br><hr>
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
														<label>Tipo documento Actual </label>
														<input type='text' class='form-control' name='t_documento' value='$registro[Tipo_Documento]' onkeypress='return onlyWords(event)' readonly><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<center>
															<label>Tipo de Documentos Disponibles</label>
														</center>

														"?>
															<?php
																include "library/listas dinamicas/lista_Dinamico_t_Documento.php";
															?>
														<?php echo "
													</div>

													<div class='col-md-4'>
														<label>Documento </label>
														<input type='text' class='form-control' name='documento' value='$registro[documento]' onkeypress='return justNumbers(event);' onchange='validar_digitos_documento_conductor(this.form.documento.value);'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Edad</label>
														<input type='text' class='form-control' name='edad' value='$registro[edad]' onkeypress='return justNumbers(event);' onchange='comprobar_edad_valida_conductor(this.form.edad.value);'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<div id='verificar_telefono_conductor'></div>
														<label>Telefono</label>
														<input type='text' class='form-control' name='telefono' value='$registro[telefono]' onkeypress='return justNumbers(event);' onchange='validar_telefono_conductor_actualizacion(this.form.telefono.value);'><br><br>
													</div>

													<div class='col-md-4'>
														<div id='contenedor_correo_actualizar'></div>
														<label>Correo</label>
														<input type='text' class='form-control' name='correo' value='$registro[correo]' onchange='validar_correo_conductor_actualizar(this.form.correo.value);'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Fecha de Nacimiento</label>
														<input type='date' class='form-control' name='nacimiento' value='$registro[nacimiento]'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<label>Empresa Actual </label>
														<input type='text' class='form-control' name='id-empresa' value='$registro[Empresa]' onkeypress='return onlyWords(event)' readonly><br><br>
													</div>

													<div class='col-md-4'>
														"?>
															<?php
																include "library/listas dinamicas/lista_Dinamica_empresa.php";
															?>
														<?php echo "
													</div>

													<div class='col-md-4'>
														<label>Estado</label><br>
														<select name='estado' class='form-control estado' required='required'>
															<option value='1' selected>Activo</option>
															<option value='2'>Desactivo</option>
														</select><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<label>Vehiculo Actual</label>
														<input type='text' class='form-control' name='placa' value='$registro[Placa]' readonly><br><br>
													</div>

													<div class='col-md-4'>
														"?>
															<?php
																include "library/listas dinamicas/lista_Dinamica_placa.php";
															?>
														<?php echo "
													</div>

													<div class='col-md-4'>
														<label>EPS</label>
														<input type='text' class='form-control' name='eps' value='$registro[eps]' onkeypress='return onlyWords(event)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<label>ARP</label>
														<input type='text' class='form-control' name='arp' value='$registro[arp]' onkeypress='return onlyWords(event)'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Talla</label>
														<input type='text' class='form-control' name='talla' value='$registro[talla]'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Peso</label>
														<input type='text' class='form-control' name='peso' value='$registro[peso]'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-4'>
														<label>Grupo Sanguineo</label>
														<input type='text' class='form-control' name='sanguineo' value='$registro[gSanguineo]'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Usuario Aplicacion Mi fit</label>
														<input type='text' class='form-control' name='usuario_fit' value='$registro[usuario_fit]'><br><br>
													</div>

													<div class='col-md-4'>
														<label>Contraseña Aplicacion Mi fit </label>
														<input type='text' class='form-control' name='pass_fit' value='$registro[pass_fit]'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-6'>
														<label>Sexo Seleccionado </label>
														<input type='text' class='form-control' name='' value='$valor_Sexo_Seleccionado' readonly><br><br>
													</div>
													<div class='col-md-6'>
														<label>Elegir Sexo</label><br>
														<select name='elegir_sexo' class='l_sexo'>
															<option value='M'>Masculino</option>
															<option value='F'>Femenino</option>
														</select>
													</div>
												</div>

												<div>
													<hr>
													<button type='submit' id='a_conductor' class='btn btn-warning btn-md'><span class='glyphicon glyphicon-ok'></span></button>
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
					</div>";
			}
			echo "</table>";
		?>
	</div>

	<!--Modal cuando se registra un nuevo conductor-->
	<div class="modal fade" id="registrar_Conductor">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"> Registro de Nuevo Conductor</span></h4>
				</div>

				<div class="modal-body">
					<center>
						<form action="registro_Conductor.php" method="post" enctype="multipart/form-data" name="f_registro">
							<input type="hidden" name="desde" value="Conductores">

							<div class="col-md-12">
								<div id="container_check_full_name"></div>
							</div>

							<button id='button_clean_full_name' class='btn btn-primary fa fa-eraser fa-2x hide_button'> Limpiar</button>

							<div class="row">
								<div class="col-md-6">
									<input type="text" name="nombre" class="form-control" id="nombre" placeholder="Colocar nombre" onkeypress="return onlyWords(event)" onchange="check_full_name(this.form.nombre.value,this.form.apellido.value,this.form.desde.value);" required><br><br>
								</div>
								<div class="col-md-6">
									<input type="text" name="apellido" class="form-control" id="apellido" placeholder="Colocar apellido" onkeypress="return onlyWords(event)" onchange="check_full_name(this.form.nombre.value,this.form.apellido.value,this.form.desde.value);" required><br><br>
								</div>
							</div>

							<label>Tipo de Documentos Disponibles</label><br>
							<?php
								include "library/listas dinamicas/lista_Dinamico_t_Documento.php";
							?>

							<div id="check_document_bd"></div>
							<input type="text" name="documento" class="form-control" id="documento_conductor" placeholder="Colocar documento" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_document_duplicate_driver(); check_digit_document(this.form.documento.value,'Conductores.php');" required><br><br>

							<label>Elegir Sexo</label><br>
							<select name="elegir_sexo" class="l_sexo">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select><br><br>

							<div id="container_check_age"></div>
							<input type="text" name="edad" id="edad" class="form-control" placeholder="Colocar edad" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_age(this.form.edad.value , 'Conductores.php');" required><br><br>

							<div id="container_check_number_phone"></div>
							<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Colocar telefono" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_number_phone(this.form.telefono.value,this.form.desde.value);" required><br><br>

							<strong class="campos_opcionales"> *Opcional*</strong>
							<div id="container_check_email"></div>
							<input type="email" name="correo" id="email" class="form-control" placeholder="Colocar correo" onchange="check_email(this.form.correo.value);"><br><br>

							<div id="container_check_date_born"></div>
							<label>Fecha de Nacimiento (Cumplidos)</label><br>
							<input type="date" name="f_nacimiento" id="f_nacimiento" class="form-control" placeholder="AAAA-MM-DD" onchange="check_date_born(this.form.f_nacimiento.value,this.form.edad.value);" required><br><br>

							<?php
								include "library/listas dinamicas/lista_Dinamica_empresa.php";
							?>

							<?php
								include "library/listas dinamicas/lista_Dinamica_placa.php";
							?>

							<input type="text" name="eps" id="eps" class="form-control" placeholder="Colocar Eps" onkeypress="return onlyWords(event)" onchange="style_border_input('eps','verde')" required><br><br>
							<input type="text" name="arp" id="arp" class="form-control" placeholder="Colocar Arp" onkeypress="return onlyWords(event)" onchange="style_border_input('arp','verde')" required><br><br>

							<div class="container-fluid">
								<div class="row">
									<label>Colocar Altura</label><br>
									<div id="container_check_height"></div>

									<div class="col-md-12" id="result_final_height_drive"></div>

									<div class="col-md-6">
										<input type="number" name="altura_primera_parte" id="altura_primera_parte" class="form-control" placeholder="1" min="1" max="2" onkeypress="return justNumbers(event);" onchange="check_height_drive(this.form.altura_primera_parte.value,this.form.altura_segunda_parte.value);" required>
									</div>

									<div class="col-md-6">
										<input type="number" name="altura_segunda_parte" id="altura_segunda_parte" class="form-control" placeholder="29" min="0" max="99" onkeypress="return justNumbers(event);" onchange="check_height_drive(this.form.altura_primera_parte.value,this.form.altura_segunda_parte.value);" required>
									</div>
								</div><br>
							</div>

							<div id="container_check_weight_driver"></div>
							<input type="number" name="peso" id="peso" class="form-control" min="1" max="140" placeholder="Colocar Peso" onkeypress="return justNumbers(event);" onchange="check_weight_driver(this.form.peso.value)" required><br><br>

							<div class="container-fluid">
								<label>Colocar Grupo Sanguineo</label>
								<div id="container_check_type_blood_driver"></div>
								<div id="container_full_type_blood_driver"></div>
								<div class="row">
									<div class="col-md-6">
										<input type="text" name="sanguineo" id="sanguineo" class="form-control" placeholder="Ejemplo : O" onkeypress="return onlyWords(event,'type_blood_drive')" onchange="check_format_type_blood_driver(this.form.sanguineo.value);" required><br><br>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="radio-inline contenedor_radio">
												<input type="radio" name="opcion" value='opcion_positivo' id="opcion_positivo" onclick="show_full_type_blood_driver()" checked>
												<label for="opcion_positivo">Positivo</label>
											</div>

											<div class="radio-inline contenedor_radio">
												<input type="radio" name="opcion" value='opcion_negativo' id="opcion_negativo" onclick="show_full_type_blood_driver()">
												<label for="opcion_negativo">Negativo</label>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div id="container_check_username"></div>
							<input type="text" name="usuario_fit" id="usuario_fit" class="form-control" placeholder="Ingresar usuario para Mi Fit" onchange="check_username(this.form.usuario_fit.value,'Conductores');" required><br><br>

							<button type="button" class="btn btn-md btn-warning hide_container" id="ayuda_mostrar_pass" data-toggle="tooltip" data-placement="left" title="Para mostrar la contraseña le das click al icono del ojo , para ocultar le das doble click al mismo icono.">
								<span class="fa fa-info"></span>
							</button>
							<div id="container_check_password"></div>
							<input type="password" name="pass_fit" id="txtpass" class="form-control" placeholder="Ingresar contraseña para Mi Fit" onchange="check_password(this.form.pass_fit.value,'Conductores') , show_input_pasword();" required><br>
							<i class="fa fa-eye hide_container" id="show_pass"></i><br><br>

							<div id="container_extensiones_agree"></div>
							<label>Cargar Foto del conductor </label> <strong class="campos_opcionales"> *Opcional*</strong>
							<input type="file" name="foto" onchange="check_photo(this.form.foto.value);"><br><br>

							<div class="contenedor_habeas">
								<input type="checkbox" id="habeas" name="habeas_data" onclick="show_habeas_data();">
								<label for="habeas" id="label_habeas">Acepto las condiciones de uso</label><br>
							</div>

							<div id="contenedor_habeas_data" class="hide-container">
								<p>La Corte Constitucional lo definió como el derecho que otorga la facultad al titular de datos personales de exigir de las administradoras de esos datos el acceso, inclusión, exclusión, corrección, adición, actualización y certificación de los datos, así como la limitación en las posibilidades de su divulgación, publicación o cesión, de conformidad con los principios que regulan el proceso de administración de datos personales. Asimismo, ha señalado que este derecho tiene una naturaleza autónoma que lo diferencia de otras garantías con las que está en permanente relación, como los derechos a la intimidad y a la información.</p>
								<p class="container_habeas_data">De acuerdo a lo anterior el usuario registrado autoriza el uso y manejo de sus datos personales para esta aplicacion</p>
							</div>

							<button type="submit" id="boton_registrar" class="btn btn-primary glyphicon glyphicon-ok" disabled></button>
						</form>
					</center>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal cuando se encuentra conductores inactivos-->
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="conductores_inactivos">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						<span class="glyphicon glyphicon-arrow-down">
							Conductores Inactivos
						</span>
					</h4>
				</div>

				<div class="modal-body">
					<center>
						<div class="row">
							<a href="library/reportes/Conductor/exportar_all_conductores_inactivos.php" id="all_download_actived_log" onclick="alert_dinamic(event , 'Conductores Inactivos' , 'library/reportes/Conductor/exportar_all_conductores_inactivos.php')" class="btn btn-default btn-lg glyphicon glyphicon-download-alt center-a"></a>
							<button id="ocultar_form_activacion" onclick="hidden_form_actived()" class="fa fa-eye-slash fa-4x btn btn-default btn-lg center-a-hidden hide-container"></button>
						</div>
					</center>
					<div id="container_actived"> </div>
					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_conductor_inactivo");
						$count = $show->num_rows;

						if ($count >= 1) {
							echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
							echo "<tr class='active'>
									<th><span class='fa fa-file-image-o'> Foto</th>
									<th><span class='fa fa-hashtag'></span>ID Conductor</th>
									<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
									<th><span class='glyphicon glyphicon-list-alt'></span> Apellido</th>
									<th><span class='glyphicon glyphicon-pencil'></span> Numero Documento</th>
									<th><span class='glyphicon glyphicon-pushpin'></span> Correo</th>
									<th><span class='fa fa-file-pdf-o'></span> Exportar PDF</th>
									<th><span class='glyphicon glyphicon-save'></span> Activar Conductor</th>
								</tr>";
							while($registro = mysqli_fetch_array($show)){
								if ($registro["correo"] == "") {
									$valor_correo_conductor = "No se ha ingresado correo";
								}else {
									$valor_correo_conductor = $registro["correo"];
								}
								$valor_Id_datos = $registro["idDatos"];
								$valor_nombre_completo = $registro['nombre'] ." ". $registro['apellido'];
								echo"<tr>
										<td><img width='100 height='100' src='$registro[foto]' alt='Foto del Conductor Inactivo' class='foto_generica'></td>
										<td>$registro[idDatos]</td>
										<td>$registro[nombre]</td>
										<td>$registro[apellido]</td>
										<td>$registro[documento]</td>
										<td>$valor_correo_conductor</td>
										<td> <a href='library/reportes/Conductor/exportar_registro_conductor_inactivo.php?id_co=$registro[documento]' class='glyphicon glyphicon-download-alt btn btn-default btn-md' data-toggle='modal'></a> </td>
										<form>
											<input type='text' name='nombre_completo' value='$valor_nombre_completo' hidden>
											<input type='text' name='id_dato' value='$valor_Id_datos' hidden>
											<input type='text' name='from' value='activar_conductor.php' hidden>
											<td> <input class='btn btn-primary' onclick='show_container_description_actived(this.form.nombre_completo.value,this.form.id_dato.value,this.form.from.value);' value='Seleccionar' readonly> </td>
										</form>
									</tr>";
							}
							echo "</table>";
						}else {
							only_empty_user_disabled('Conductores','Admin');
						}
					?>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
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
					<h4 class="modal-title"><span class="fa fa-anchor"> Total Menú Conductores Por Genero</span></h4>
				</div>

				<div class="modal-body">
					<center>
						<div class="row">
							<h3>General</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-star fa-2x"></span>
										Activos
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $total_conductores; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
										<span class="fa fa-star-o fa-2x"></span>
										Inactivos
										<input type="text" class="btn btn-danger btn-md redondear" value="<?php echo $total_conductores_inactivo; ?>" disabled>
								</label>
							</div>
						</div>

						<hr>

						<div class="row">
							<h3>Activos</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-user fa-3x"></span>
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $Conductor_Hombres_Activos; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
									<span class="fa fa-female fa-3x"></span>
										<input type="text" class="btn btn-primary btn-md redondear" value="<?php echo $Conductor_Mujeres_Activos; ?>" disabled>
								</label>
							</div>
						</div>

						<hr>

						<div class="row">
							<h3>Inactivos</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-user fa-3x"></span>
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $Conductor_Hombres_Inactivos; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
									<span class="fa fa-female fa-3x"></span>
										<input type="text" class="btn btn-primary btn-md redondear" value="<?php echo $Conductor_Mujeres_Inactivos; ?>" disabled>
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