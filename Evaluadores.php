<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Evaluadores</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor donde se encuentra el buscador y los botondes de acceso directo-->
	<div class="container">
		<center class="container-fluid">
			<h2>
				Menú Evaluadores
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_evaluador" data-toggle="tooltip" data-placement="left" title="Puede Buscar por : Nombre , Apellido , Numero Documento , Telefono y Correo">
					<span class="fa fa-info"></span>
				</button>
			</h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." onkeyup="doSearch()" autofocus><br>
		</center>

		<a href='#registrar_Evaluador' data-toggle='modal' class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general"></a>
		<a href='#evaluadores_inactivos' data-toggle='modal' class="btn btn-warning fa fa-user-times fa-2x tamaño-botones-general"></a>
		<a href='library/reportes/Evaluador/exportar_all_evaluadores.php' class="btn btn-info tamaño-botones-general" onclick="alert_dinamic(event , 'Evaluadores Activos' , 'library/reportes/Evaluador/exportar_all_evaluadores.php')"> <span class="glyphicon glyphicon-download-alt"></span></a>
		<a href='#contenedor_mas_opciones' data-toggle='modal' class="btn btn-default glyphicon glyphicon-option-vertical btn-lg"></a>
	</div>

	<!--Contenedor donde se carga la tabla dinamica de la informacion de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM reporte_usuario_activo");
			echo "<table class='table table-bordered table-hover table-condensed text-center data' id='table'>";
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
				//Llenamos la tabla con la informacion de la Bd
				echo"
				<tr>
					<th>
						<div class='btn-group dropup'>
							<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
								<span class='glyphicon glyphicon-plus'></span>
							</button>
							<ul class='dropdown-menu' role='menu'>
								<li><a href='#all$registro[documento]' data-toggle='modal'><span class='glyphicon glyphicon-list-alt'></span> Ver Registro Completo</a></li>
								<li><a href='#edit$registro[documento]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
								<li><a href='library/reportes/Evaluador/exportar_registro_evaluador.php?id_eva=$registro[documento]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
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
									<label>Registro # </label> $registro[idDatos]<br>
									<img width='150' height='150'src=' $registro[foto]' alt='Foto del Evaluador' class='foto_generica'><br><br><hr>
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
								<button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span></button>
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
							<div class='modal-body'>
								<div class='form-group'>
									<form action='actualizar_Evaluador.php' method='post' enctype='multipart/form-data'>
										<center>
											<input type='text' name='idDatos' value='$registro[idDatos]' hidden>
											<input type='hidden' name='desde' value='Evaluadores'>
											<input type='hidden' name='opcion' value='Actualizar'>

											<br><br>
											<img width='100' height='100'src=' $registro[foto]' alt='Foto del Evaluador' class='foto_evaluador editar_evaluador'>
											<div id='extensiones_permitidas'></div>
											<label>Cambiar Foto</label> <input type='file' name='foto' onchange='check_photo_actualizacion(this.form,this.form.foto.value);'>
											<br><br><br><br><hr>

											<div class='cabecera_registro_modal'>
												<label>Registro # $registro[idDatos]</label> <br><br><hr>
											</div>

											<div class='row'>
												<div class='col-md-4'>
													<label>Nombre </label>
													<input class='form-control' type='text' name='nombre' value='$registro[nombre]' onkeypress='return onlyWords(event)'><br><br>
												</div>

												<div class='col-md-4'>
													<label>Apellido </label>
													<input class='form-control' type='text' name='apellido' value='$registro[apellido]' onkeypress='return onlyWords(event)'><br><br>
												</div>

												<div class='col-md-4'>
													<label>Tipo Documento Actual </label>
													<input class='form-control' type='text' name='t_documento' value='$registro[tipo_documento]' onkeypress='return justNumbers(event)' readonly><br><br>
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
													<label>Edad </label>
													<input class='form-control' type='text' name='edad' value='$registro[edad]' onkeypress='return justNumbers(event);' onchange='comprobar_edad_valida_evaluador(this.form.edad.value);'><br><br>
												</div>

												<div class='col-md-4'>
													<label>Numero Documento </label>
													<input class='form-control' type='text' name='documento' value='$registro[documento]' onkeypress='return justNumbers(event);' onchange='check_digitos_document_evaluador(this.form.documento.value);'><br><br>
												</div>
											</div>

											<div class='row'>
												<div class='col-md-4'>
													<div id='contenedor_validador_telefono'></div>
													<label>Telefono </label>
													<input class='form-control' type='text' name='telefono' value='$registro[telefono]' onkeypress='return justNumbers(event);' onchange='check_number_phone_actualizacion(this.form.telefono.value);'><br><br>
												</div>

												<div class='col-md-4'>
													<div id='contenedor_validar_correo'></div>
													<label>Correo </label>
													<input class='form-control' type='text' name='correo' value='$registro[correo]' onchange='validar_correo_actualizar(this.form.correo.value);'><br><br>
												</div>

												<div class='col-md-4'>
													<label>Fecha de Nacimiento </label>
													<input class='form-control' type='date' name='nacimiento' value='$registro[nacimiento]'><br><br>
												</div>
											</div>

											<div class='row'>
												<div class='col-md-4'>
													<center>
														<label id='estado_encabezado'>Estado </label>
													</center>
													<select name='estado' class='estado' required>
														<option value='1' selected>Activo</option>
														<option value='2'>Desactivo</option>
													</select><br><br>
												</div>

												<div class='col-md-4'>
													<label>Tipo Rol Actual </label>
													<input class='form-control' type='text' name='id_rol' value='$registro[tipo_rol]' onkeypress='return onlyWords(event)' readonly><br><br>
												</div>

												<div class='col-md-4'>
													<center>
														<label>Tipo de roles Disponibles</label>
													</center>
													"?>
														<?php
															include "library/listas dinamicas/lista_Dinamica_rol.php";
														?>
													<?php echo "
												</div>
											</div>

											<div class='row'>
												<div  class='col-md-6'>
													<label>Nombre Usuario </label>
													<input class='form-control' type='text' name='name_usuario' value='$registro[NombreUsuario]' onkeypress='return onlyWords(event)'><br><br>
												</div>

												<div class='col-md-6'>
													<label>Contraseña </label>
													<input class='form-control' type='text' name='pass_usuario' value='$registro[password]'><br><br>
												</div>
											</div>

											<div class='row'>
												<div class='col-md-6'>
													<label>Sexo Actual </label>
													<input class='form-control' type='text' name='' value='$valor_Sexo_Seleccionado' readonly><br><br>
												</div>

												<div class='col-md-6'>
													<center>
														<label>Sexo </label>
													</center>
													<select name='t_sexo'>
														<option value='M'>Masculino</option>
														<option value='F'>Femenino</option>
													</select>
												</div>
											</div>

											<div class='row'>
												<div class='col-md-12'>
													<hr>
													<button type='submit' id='a_evaluador' class='btn btn-warning btn-md'>
														<span class='glyphicon glyphicon-ok'></span>
													</button>
												</div>
											</div>
										</center>
									</form>
								</div>
							</div>
							<div class='modal-footer form-inline'>
								<button type='button' class='btn btn-danger btn-md' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
							</div>
						</div>
					</div>
				</div>";
			}
			echo "</table>";
		?>
	</div>

	<!-- <table id="table_prueba">
		<thead>
			<th>Titulo1</th>
			<th>Titulo2</th>
			<th>Titulo3</th>
			<th>Titulo4</th>
			<th>Titulo5</th>
		</thead>
		<tbody>
			<tr>
				<td>contenido1</td>
				<td>contenido2</td>
				<td>contenido3</td>
				<td>contenido4</td>
				<td>contenido5</td>
			</tr>
			<tr>
				<td>hola</td>
				<td>hi</td>
				<td>te amo</td>
				<td>amor</td>
				<td>color</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>
			<tr>
				<td>Contendio 1</td>
				<td>Contendio 2</td>
				<td>Contendio 3</td>
				<td>Contendio 4</td>
				<td>Contendio 5</td>
			</tr>

		</tbody>
	</table> -->

	<!--Modal cuando se registra un evaluador-->
	<div class="modal fade" id="registrar_Evaluador">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"> Registro del Evaluador</span></h4>
				</div>

				<div class="modal-body">
					<form action="registro_Evaluador.php" method="post" enctype="multipart/form-data" name="f_registro">
						<center>
							<input type="hidden" name="desde" value="Evaluadores">
							<input type="hidden" name="opcion" value="Registro">

							<div class="col-md-12">
								<div id="container_check_full_name"></div>
							</div>

							<button id="button_clean_full_name" class="btn btn-primary fa fa-eraser fa-2x hide_button"> Limpiar</button>

							<div class="row">
								<div class="col-md-6">
									<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Colocar nombre" onkeypress="return onlyWords(event)" onchange="check_full_name(this.form.nombre.value,this.form.apellido.value,this.form.desde.value,this.form.opcion.value);" autofocus required><br><br>
								</div>
								<div class="col-md-6">
									<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Colocar apellido" onkeypress="return onlyWords(event)" onchange="check_full_name(this.form.nombre.value,this.form.apellido.value,this.form.desde.value,this.form.opcion.value)" required><br><br>
								</div>
							</div>

							<label>Tipo de documentos Disponibles</label><br>
							<?php
								include "library/listas dinamicas/lista_Dinamico_t_Documento.php";
							?>

							<div id="check_document_bd"></div>
							<input type="text" name="documento" class="form-control" id="numero_documento" placeholder="Colocar documento" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_digit_document(this.form.documento.value,'Evaluadores.php'); check_document_duplicate_evaluador();" required><br>

							<label>Elegir Sexo</label><br>
							<select name="elegir_sexo" class="l_sexo">
								<option value="M">Masculino</option>
								<option value="F">Femenino</option>
							</select><br><br>

							<div  id="container_check_age"></div>
							<input type="text" name="edad" id="edad" class="form-control" placeholder="Colocar edad" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_age(this.form.edad.value , 'Evaluadores.php');" required><br><br>

							<div id="container_check_number_phone"></div>
							<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Colocar telefono" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="check_number_phone(this.form.telefono.value,this.form.desde.value)" required><br><br>

							<strong class="campos_opcionales"> *Opcional*</strong>
							<div id="container_check_email"></div>
							<input type="email" name="correo" id="email" class="form-control" placeholder="Colocar correo" onchange="check_email(this.form.correo.value)"><br><br>

							<div id="container_check_date_born"></div>
							<label>Fecha de Nacimiento</label><br>
							<input type="date" name="f_nacimiento" id="f_nacimiento" class="form-control" placeholder="AAAA-MM-DD" onchange="check_date_born(this.form.f_nacimiento.value,this.form.edad.value);" required><br><br>

							<div class="" id="container_check_username"></div>
							<input type="text" name="txtusuario" id="txtusuario" class="form-control" placeholder="Colocar Usuario" onchange="check_username(this.form.txtusuario.value,'Evaluadores');" required><br><br>

							<button type="button" class="btn btn-md btn-warning hide_container" id="ayuda_mostrar_pass" data-toggle="tooltip" data-placement="left" title="Para mostrar la contraseña le das click al icono del ojo , para ocultar le das doble click al mismo icono.">
								<span class="fa fa-info"></span>
							</button>

							<div id="container_check_password"></div>
							<input type="password" id="txtpass" name="txtpass" class="form-control" placeholder="Colocar Contraseña" onchange="check_password(this.form.txtpass.value,'Evaluadores') , show_input_pasword();" required><br>
							<i class="fa fa-eye hide_container" id="show_pass"></i><br><br>

							<div id="container_extensiones_agree"></div>
							<strong class="campos_opcionales"> *Opcional*</strong><br>
							<label class="control-label">Cargar Foto del Evaluador </label>
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

	<!--Modal cuando hay evaluadores inactivos-->
	<div class="modal fade bs-example-modal-lg" id="evaluadores_inactivos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						<span class="glyphicon glyphicon-arrow-down">
							Evaluadores Inactivos
						</span>
					</h4>
				</div>

				<div class="modal-body">
					<center>
						<div class="row">
							<a href='library/reportes/Evaluador/exportar_all_evaluadores_inactivos.php' id="all_download_actived_log" onclick="alert_dinamic(event , 'Evaluadores Inactivos' , 'library/reportes/Evaluador/exportar_all_evaluadores_inactivos.php')" class="glyphicon glyphicon-download-alt btn btn-default btn-lg center-a hide-container"></a>
							<button id="ocultar_form_activacion" onclick="hidden_form_actived()" class="fa fa-eye-slash fa-3x btn btn-default btn-lg center-a-hidden hide_container"></button>
						</div>
					</center>
					<div id="container_actived">
					</div>

					<?php
						$show = mysqli_query($conexion,"SELECT * FROM reporte_usuario_inactivo");
						$count = $show->num_rows;
						if ($count >= 1) {
							echo "<script> document.getElementById('all_download_actived_log').style.display = 'inline-block'; </script>";
							echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
								echo "<tr class='active'>
								<th><span class='fa fa-file-image-o'> Foto</span></th>
								<th><span class='fa fa-hashtag'></span> ID Evaluador</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Apellido</th>
								<th><span class='glyphicon glyphicon-pencil'></span> Numero Documento</th>
								<th><span class='glyphicon glyphicon-pushpin'></span> Correo</th>
								<th><span class='fa fa-file-pdf-o'></span> Exportar PDF</th>
								<th><span class='glyphicon glyphicon-saved'></span> Activar Evaluador</th>
								</tr>";
								while($registro = mysqli_fetch_array($show)){
									if ($registro["correo"] == "") {
										$valor_correo_evaluador = "No se ha ingresado ningun correo";
									}else {
										$valor_correo_evaluador = $registro["correo"];
									}
									//Sacamos el idDatos del Evaluador para poder enviarla por el formulario donde se va activar el Evaluador
									$valor_id = $registro["idDatos"];
									$valor_nombre_completo = $registro['nombre'] ." ". $registro['apellido'];
									echo"<tr>
											<td><img width='100 height='100' src='$registro[foto]' alt='Foto del Evaluador Inactivo' class='foto_generica'></td>
											<td>$registro[idDatos]</td>
											<td>$registro[nombre]</td>
											<td>$registro[apellido]</td>
											<td>$registro[documento]</td>
											<td>$valor_correo_evaluador</td>
											<td> <a href='library/reportes/Evaluador/exportar_registro_evaluador_inactivo.php?id_eva=$registro[documento]' class='glyphicon glyphicon-download-alt btn btn-default btn-md'></a> </td>
											<form>
												<input type='text' name='nombre_completo' value='$valor_nombre_completo' hidden>
												<input type='text' name='id' value='$valor_id' hidden>
												<input type='text' name='from' value='activar_evaluador.php' hidden>
												<td> <input class='btn btn-primary' onclick='show_container_description_actived(this.form.nombre_completo.value,this.form.id.value,this.form.from.value);' value='Seleccionar' readonly> </td>
											</form>
									</tr>";
								}
							echo "</table>";
						}else {
							only_empty_user_disabled('Evaluadores');
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
					<h4 class="modal-title"><span class="fa fa-anchor"> Total Menú Evaluadores Por Genero</span></h4>
				</div>

				<div class="modal-body">
					<center>
						<div class="row">
							<h3>General</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-star fa-2x"></span>
										Activos
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $total_evaluadores; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
										<span class="fa fa-star-o fa-2x"></span>
										Inactivos
										<input type="text" class="btn btn-danger btn-md redondear" value="<?php echo $total_evaluadores_inactivos; ?>" disabled>
								</label>
							</div>
						</div>

						<hr>

						<div class="row">
							<h3>Activos</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-user fa-3x"></span>
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $Evaluadores_Hombres_Activos; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
									<span class="fa fa-female fa-3x"></span>
										<input type="text" class="btn btn-primary btn-md redondear" value="<?php echo $Evaluadores_Mujeres_Activos; ?>" disabled>
								</label>
							</div>
						</div>

						<hr>

						<div class="row">
							<h3>Inactivos</h3>
							<div class="col-md-6">
								<label>
									<span class="fa fa-user fa-3x"></span>
										<input type="text" class="btn btn-success btn-md redondear" value="<?php echo $Evaluadores_Hombres_Inactivos; ?>" disabled>
								</label>
							</div>
							<div class="col-md-6">
								<label>
									<span class="fa fa-female fa-3x"></span>
										<input type="text" class="btn btn-primary btn-md redondear" value="<?php echo $Evaluadores_Mujeres_Inactivos; ?>" disabled>
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