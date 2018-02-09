<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Rutas</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--CONTENEDOR DONDE SE ENCUENTRA EL BUSCADOR Y LOS BOTONES DE ACCESO DIRECTO AL MENU-->
	<div class="container">
		<center class="container-fluid">
			<h2> Menú Rutas
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_rutas" data-toggle="tooltip" data-placement="left" title="Puede buscar por : Id Ruta , Codigo Ruta , Distancia en Km , Nombre Ruta  y Tiempo Recorrido"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
		</center>
		<a href="#registrar_Rutas" data-toggle="modal" class="btn btn-primary fa fa-user-plus fa-2x tamaño-botones-general" ></a>
		<a href='library/reportes/Ruta/exportar_all_rutas.php' class="btn btn-info" onclick="alert_dinamic(event , 'Las Rutas' , 'library/reportes/Ruta/exportar_all_rutas.php')"> <span class="glyphicon glyphicon-download-alt tamaño-botones-general"></span></a>
		<label class='alinear_total_derecha'><span class="glyphicon glyphicon-star"></span> Total Rutas : <input type="text" class="btn btn-danger btn-md" value="<?php echo $total_ruta; ?>" disabled></label>
	</div>

	<!--CONTENEDOR DONDE SE CREA LA TABLA CARGADA CON LA INFO DE LA BD-->
	<div class="container" id="contenid_Bd">
		<?php
			$show = mysqli_query($conexion,"SELECT * FROM rutas");
			echo "<table id='table' class='table table-bordered table-hover table-condensed text-center'>";
			//Encabezados con etiqueta TR
			echo "<tr class='active'>
					<th></th>
					<th><span class='glyphicon glyphicon-map-marker'></span> Id Ruta</th>
					<th><span class='glyphicon glyphicon-bookmark'></span> Codigo Ruta</th>
					<th><span class='glyphicon glyphicon-road'></span> Distancia en KM</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Nombre</th>
					<th><span class='glyphicon glyphicon-list-alt'></span> Tiempo Recorrido</th>
				</tr>";
			while($registro = mysqli_fetch_array($show)){
				/*Poder mostrar solo la distancia sin el km en la cadena de distancia
				En la priemra posicion del arreglo vamos a tener el numero entero de la distancia*/
				include "separar_distancia_ruta.php";


				/*Archivo que no sirve para poder separar las horas y os minutos y colcocarlo en cajas separa en la opcion editar*/
				include "separar_tiempo_recorrido_ruta.php";

				/*Se incluye este archvio para evitar que se muestre en la tabla principal 0 h 32 min sino que solo se muestre
				 32 min siempre y cuando el valor de las horas sea cero*/
				include "mostrar_solo_minutos.php";

				//Contenido con la etiqueta
				echo"<tr>
						<th>
							<div class='btn-group dropup'>
								<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
									<span class='glyphicon glyphicon-plus'></span>
								</button>
								<ul class='dropdown-menu' role='menu'>
									<li><a href='#edit$registro[id_ruta]' data-toggle='modal'><span class='glyphicon glyphicon-pencil'></span> Editar Registro</a></li>
									<li><a href='library/reportes/ruta/exportar_registro_ruta.php?id_ru=$registro[id_ruta]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Registro</a></li>
								</ul>
							</div>
						</th>

						<td>$registro[id_ruta]</td>
						<td>$registro[codigo_ruta]</td>
						<td>$registro[distancia_km]</td>
						<td>$registro[nombre_ruta]</td>
						<td>$mostrar_tiempo_recorrido</td>

					</tr>

					<div class='modal fade' id='edit$registro[id_ruta]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
						<div class='modal-dialog modal-lg'>
							<div class='modal-content'>
								<div class='modal-header'>
									<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
									<h4 class='modal-title'>
										<center>
											<span class='glyphicon glyphicon-pencil'></span>
											Actualizar Registro de $registro[nombre_ruta]
										</center>
									</h4>
								</div>
								<div class='modal-body text-left'>
									<div class='form-group text-center'>
										<form action='actualizar_Ruta.php' method='post' name='f_rutas_actualizar'>
											<center>
												<input type='text' name='id_ruta' value='$registro[id_ruta]' hidden><br><br>
												<div class='row'>
													<input type='hidden' name='registro' value='Actualizar Ruta'>

													<div class='col-md-6'>
														<label>Id Ruta </label>
														<input type='text' class='form-control' id='id_ruta_a' name='id_ruta' value='$registro[id_ruta]' disabled><br><br>
													</div>

													<div class='col-md-6'>
														<div id='verificar_codigo_ruta_Actualizar'></div>
														<label>Codigo Ruta Nacional </label>
														<input type='text' class='form-control' id='codigo_ruta_actualizar' name='codigo_ruta' value='$registro[codigo_ruta]' onkeypress='return justNumbers(event)' onchange='Impedir_codigo_duplicado(this.form.registro.value,this.form.id_ruta_a.value)'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-6'>
														<label>Distancia KM </label>
														<input type='text' class='form-control' name='distancia' value='$solo_numeros_distancia' onkeypress='return justNumbers(event)'><br><br>
													</div>

													<div class='col-md-6'>
														<div id='verificar_nombre_ruta_Actualizar'></div>
														<label>Nombre Ruta</label>
														<input type='text' class='form-control' id='codigo_ruta_a' name='ruta' value='$registro[nombre_ruta]' onkeypress='return onlyWords(event)' onchange='Impedir_nombre_ruta_duplicado(this.form.registro.value);'><br><br>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<label>Tiempo Recorrido </label>
														<div id='contenedor_validar_tiempo_recorrido'></div>
														<div class='row'>
															<div class='col-md-6'>
																<input type='hidden' value='campo_hora' name='campo_hora'>

																<label> Hora (h) </label>
																<input type='text' class='form-control' name='tiempo_hora' id='tiempo_hora' value='$solo_entero_hora_tiempo_recorrido_sin_espacio' onkeypress='return justNumbers(event)' onchange='validar_digitos_tiempo_recorrido(this.form.campo_hora.value,this.form.tiempo_hora.value,null)'><br>

																<div class='content_enabled_disabled_check_hour'>
																	<input type='checkbox' id='check_h' name='check_hora' onclick='enabled_disabled_check(this.form.campo_hora.value)'>
																	<label for='check_h' id='texto_adicional_tiempo_hora'> Activar</label>
																</div>

															</div>
															<div class='col-md-6'>
																<input type='hidden' value='campo_minuto' name='campo_minuto'>
																<label>Minutos (min) </label>
																<input type='text' class='form-control' name='tiempo_minuto' id='tiempo_minuto' value='$solo_entero_minuto_tiempo_recorrido_sin_espacio' onkeypress='return justNumbers(event)' onchange='validar_digitos_tiempo_recorrido(this.form.campo_minuto.value,null,this.form.tiempo_minuto.value)'><br>
																<div class='content_enabled_disabled_check_minute'>
																	<input type='checkbox' name='check_m' id='check_minuto' onclick='enabled_disabled_check(this.form.campo_minuto.value);'>
																	<label for='check_minuto' id='texto_adicional_tiempo_minuto'> Activar</label>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class='row'>
													<div class='col-md-12'>
														<hr>
														<button type='submit' class='btn btn-warning' id='actualizar_registro_ruta'>
															<span class='glyphicon glyphicon-ok'></span>
														</button>
													</div>
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

	<!--MODAL DE REGISTRO RUTAS-->
	<div class="modal fade" id="registrar_Rutas">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-user-plus"></span> Registro de Nueva Ruta</h4>
				</div>

				<div class="modal-body text-center">
					<form action="registro_Ruta.php" method="post">
						<center>
							<input type="hidden" name="desde" value="Rutas">
							<input type="hidden" name="registro" value="Registro Ruta">

							<div id="container_code_route"></div>
							<input type="text" class="form-control" id="codigo_ruta" name="codigo_ruta" placeholder="Colocar codigo de ruta" onkeypress="return justNumbers(event,this.form.desde.value)" onchange="check_duplicate_route(this.form.registro.value);" required><br><br>

							<input type="text" class="form-control" id="distancia" name="distancia" placeholder="Colocar Distancia de Recorrido" onkeypress="return justNumbers(event,this.form.desde.value)" onchange="style_border_input('distancia', 'verde')" required><label>KM</label><br><br>

							<div id="container_check_name"></div>
							<input type="text" class="form-control" name="nombre_ruta" id="nombre_ruta" placeholder="Colocar nombre de la ruta" onkeypress="return onlyWords(event)" onchange="check_name_route(this.form.registro.value);" required><br><br>

							<label>Elegir Tiempo de Recorrido:</label><br>
							<select id="seleccion_opcion_tiempo" name="seleccion_tiempo" onchange="show_container_time_route();" class="l_tiempo" required>
								<option value="Hora" selected>Solo Hora</option>
								<option value="Minuto">Solo Minutos</option>
								<option value="Ambos_tiempo">Horas y Minutos</option>
							</select><br><br>

							<div id="container_time_route">
								<input type='text' class='form-control' name='tiempo_recorrido_hora' id="tiempo_recorrido_hora" placeholder='Colocar Tiempo en horas' onkeypress='return justNumbers(event,this.form.desde.value)' onchange='stop_value_hour_more_24(this.form.tiempo_recorrido_hora.value,this.form.desde.value)' required><br><br>
							</div>

							<button type="submit" class="btn btn-primary glyphicon glyphicon-ok" id="registrar_ruta"></button>
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