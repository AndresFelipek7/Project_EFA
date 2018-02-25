<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Evaluacion de Fatiga</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor donde se encuentra el buscador y los botones de acceso directo del menu-->
	<div class="container">
		<center class="container-fluid">
			<h2>Menú Evaluacion de Fatiga
				<button type="button" class="btn btn-md btn-primary" id="ayuda_general_busqueda_evaluacion" data-toggle="tooltip" data-placement="right" title="Se puede buscar por todos los nombres de la cabecera de la tabla"><span class="fa fa-info"></span></button>
			</h2>
			<input class="form-control colocar-icono" type="text" name="buscar" id="input" placeholder="Buscar..." autofocus="autofocus" onkeyup="doSearch()"><br>
			<div class="col-md-3">
				<label><span class="glyphicon glyphicon-star"></span></label> <strong>Total Evaluaciones Realizadas</strong>
				<input type="text"  class="btn btn-primary btn-md ancho_submenu" value="<?php echo $total_evaluaciones; ?>" disabled>
			</div>
			<div class="col-md-3">
				<label><span class="glyphicon glyphicon-star-empty"></span> </label><strong> Evaluaciones de la Fecha</strong>
				<input type="text" class="btn btn-danger btn-md ancho_fecha_evaluacion" value="<?php echo $fecha_formulario_busqueda;?>" disabled/><br>
			</div>
			<div class="col-md-3">
				<label><span class="glyphicon glyphicon-star"></span></label><strong> Total Evaluaciones del Dia</strong>
				<input type="text"  class="btn btn-primary btn-md ancho_submenu" value="<?php echo $total_dia_evaluacion; ?>" disabled>
			</div>

			<div class="col-md-3">
				<a href='#contenedor_buscar_otro_dia' data-toggle='modal' class="btn btn-warning glyphicon glyphicon-option-vertical btn-lg"></a>
			</div>

		</center><br>
	</div>

	<!--Contenedor donde se crea la tabla con la informacion de la BD-->
	<div class="container" id="contenido_Bd">
		<?php
			//Es verdadero cuando en el modal se lanza el formulario con la fecha de busqueda diferente a la del dia
			if($_POST) {
				//Fecha traida desde el formulario
				$fecha_form = $_POST["buscar_fecha_evaluacion"];

				//Variables que me permiten filtrar por dia las evaluaciones realizadas y mostrarlas en la tabla , ademas de concatenarlo con cadena de texto como es el tipo en la bd
				$fecha_inicio =$fecha_form." "."00:00:00";
				$fecha_final =$fecha_form." "."23:59:59";

				$consulta = "SELECT * FROM reporte_evaluacion_fatiga WHERE fecha_hora BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY nivel_fatiga DESC";
				$show = $conexion ->query($consulta);
				$count = $show->num_rows;

				if($count >= 1) {
					$p2 = "hola";
					echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
						//Encabezados con etiqueta TR
						echo "<tr class='active'>
								<form action='' method='POST'>
									<input type='hidden' name='fecha_inicio' value='$fecha_inicio'>
									<input type='hidden' name='fecha_final' value='$fecha_final'>
									<input type='hidden' name='date_common' value='$fecha_form'>
									<input type='hidden' name='path' value='library/reportes/Evaluaciones/exportar_all_evaluaciones.php?'>
									<th>
										<button onclick='alert_dinamic_reporte_test(event,this.form.fecha_inicio.value,this.form.fecha_final.value,this.form.path.value,this.form.date_common.value)' class='btn btn-info tamaño-botones-general'>
											<span class='glyphicon glyphicon-download-alt'></span>
										</button>
									</th>
								</form>
								<th><span class='glyphicon glyphicon-map-marker'></span> ID Evaluacion</th>
								<th><span class='glyphicon glyphicon-calendar'></span> Fecha y Hora</th>
								<th><span class='glyphicon glyphicon-pushpin'></span> ID Conductor</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Conductor</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Apellido Conductor</th>
								<th># Documento Conductor</th>
								<th><span class='glyphicon glyphicon-map-marker'></span> ID Evaluador</th>
								<th><span class='glyphicon glyphicon-hourglass'></span> Orden Reposo</th>
								<th><span class='glyphicon glyphicon-heart'></span> Nivel Fatiga</th>
							</tr>";

						foreach ($show as $registro) {
							//Sacamos el nivel de fatiga para poder mostrar de forma grafica el nivel de fatiga
							$nivel = $registro["nivel_fatiga"];
							//Enlazamos el archivo verificar_estado_campo para los campos que no tiene informacion , con esto le decimos al usuario que esa informacion no esta en la BD
							//Se coloco todos esos condicionales en un archivo aparte para poder mirarmas facil los errores
							include "library/verificar_estado_campo.php";

							$traer_informacion_evaluador = "SELECT * FROM reporte_evaluador WHERE id_usuario = $registro[id_evaluador] LIMIT 1";
							$show_info_evaluador = $conexion ->query($traer_informacion_evaluador);
							$count_evaluador = $show_info_evaluador->num_rows;

							if ($count_evaluador >= 1) {
								foreach ($show_info_evaluador as $registro_evaluador) {
									echo"<tr>
									<td>
										<div class='btn-group dropup'>
											<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
												<span class='glyphicon glyphicon-plus'></span>
											</button>
											<ul class='dropdown-menu' role='menu'>
												<li><a href='#all$registro[id_evaluacion]' data-toggle='modal'><span class='glyphicon glyphicon-list-alt'></span> Ver Registro Completo</a></li>
												<li><a href='library/reportes/Evaluaciones/exportar_registro_evaluacion_fatiga.php?id_fa=$registro[id_evaluacion]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Evaluacion</a></li>
											</ul>
										</div>
									</td>

									<td>$registro[id_evaluacion]</td>
									<td>$registro[fecha_hora]</td>
									<td>$registro[id_conductor]</td>
									<td>$registro[nombre_conductor]</td>
									<td>$registro[apellido_conductor]</td>
									<td>$registro[numero_documento]</td>
									<td>$registro[id_evaluador]</td>
									<td>$registro[orden_reposo]</td>
									"?>
										<?php
											/*
												Cuando la variable $nivel vale 1 significa que tiene nivel Bajo
												Cuando la variable $nivel vale 2 significa que tiene nivel Medio
												Cuando la variable $nivel vale 3 significa que tiene nivel Alto
											*/
											if ($nivel == "1") {
												$valor_color = "rgb(200,255,200)";
												$valor_nivel_en_letras = "Bajo";
											}else if ($nivel == "2") {
												$valor_color = "rgb(200,200,255)";
												$valor_nivel_en_letras = "Medio";
											}else {
												$valor_color = "rgb(255,200,200)";
												$valor_nivel_en_letras = "Alto";
											}
										?>
									<?php echo "
									<td style='background:"?>
										<?php echo $valor_color; ?>
											<?php echo "; border-radius:60px 60px 60px 60px;'>$valor_nivel_en_letras
									</td>
								</tr>

								<div class='modal fade' id='all$registro[id_evaluacion]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
									<div class='modal-dialog modal-lg'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title'><span class='glyphicon glyphicon-list-alt'></span> Registro Completo</h4>
											</div>
											<div class='modal-body'>
												<center>
													<div class='row'>
														<div class='col-md-6'>
															<label>ID Evaluacion : </label> $registro[id_evaluacion] <br>
														</div>
														<div class='col-md-6'>
															<label>Fecha/Hora : </label> $registro[fecha_hora] <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Informacion Conductor<br><br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6'>
															<div class='pull-right'>
																<img width='200' height='200' src='$registro[foto_conductor]' class='foto foto_conductor'>
															</div>
														</div>

														<div class='col-md-6 pull-left info_conductor'>
															<label>ID Conductor : </label> $registro[id_conductor] <br>
															<label>Nombre : </label> $registro[nombre_conductor] <br>
															<label>Apellido : </label> $registro[apellido_conductor] <br>
															<label>Numero documento : </label> $registro[numero_documento] <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<br>
															<br>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Informacion Evaluador<br><br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6 pull-left info_evaluador'>
															<label>ID Evaluador: </label> $registro[id_evaluador] <br>
															<label>Nombre Evaluador: </label> $registro_evaluador[nombre] <br>
															<label>Apellido Evaluador: </label> $registro_evaluador[apellido] <br>
															<label>Documento Evaluador: </label> $registro_evaluador[documento] <br>
														</div>
														<div class='col-md-6'>
															<div class='pull-right'>
																<img width='200' height='200' src='$registro_evaluador[foto]' class='foto'><br>
															</div>
														</div>

													</div>

													<div class='row'>
														<div class='col-md-12'>
															<br>
															<br>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Menú Sintomas </h3><br>
															"?>
																<?php
																	include "library/convertir/convertir_ids_sintomas.php";
																?>
															<?php echo "
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Signo Selecionado </h3><br> $registro[nombre_signo] <br>
															<h3>Otro Estado</h3> $registro[otro_estado_signo]
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															"?>
																<?php
																	include "library/convertir/convertir_ids_nivel_riesgo.php";
																?>
															<?php echo "
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6'>
															<label>Orden Reposo : </label> <strong class='orden_reposo'>$registro[orden_reposo]</strong> <br>
														</div>
														<div class='col-md-6'>
															<label>Nivel Fatiga : </label> <strong class='orden_reposo'>$valor_nivel_en_letras</strong> <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Menú Interrogatorio</h3><br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6'>
															<label>Destino: </label> $registro[destino] <br>
															<label>Distancia en Km: </label> $registro[distancia_km] <br>
															<label>Tiempo Llegada: </label> $registro[tiempo_llegada] <br>
															<label>Ciudad: </label> $registro[origen_evaluacion] <br>
															<label>Descanso: </label> $registro[horas_descanso] Horas<br>
															<label>Camarote: </label> $camarote<br>
															<label>Horas Conduciendo: </label> $registro[horas_conducidas] Horas<br>
															<label>Sugerencia Horas Conducidas: </label> $registro[sugerencia_horas_conducidas] Minutos<br>
														</div>
														<div class='col-md-6'>
															<label>Tiempo en Otra Actividad: </label> $otra_actividad<br>
															<label>Cual Actividad: </label> $cual_actividad <br>
															<label>Tiempo Sueño: </label> $registro[horas_sueno] Minutos<br>
															<label>Tiempo Sueño Por la Manilla: </label> $registro[tiempo_sueno_manilla] Minutos<br>
															<label>Pulsaciones Conductor: </label> $valor_pulsaciones<br>
															<label>Tiempo Descanso: </label> $registro[tiempo_descanso] Horas<br>
															<label>El conductor con la informacion del sueño dijo la: </label> $registro[respuesta_conductor_sueno] <br>
															<label>Nombre copiloto: </label> $info_copiloto <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<label>Origen copiloto: </label> $origen_copiloto <br><hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<div>
																<h3>Menú Alteraciones Emocionales</h3><br>
															</div>

															<div>
																"?>
																	<?php
																		include "library/convertir/convertir_ids_emocional.php";
																	?>
																<?php echo "
															</div>
														</div>
													</div>


													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Menú Alteraciones Neurologicas</h3><br>
															"?>
																<?php
																	include "library/convertir/convertir_ids_neurologico.php";
																?>
															<?php echo "
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Descargable Mi Fit</h3><br>
															<img src='$registro[descargable_fit]' class='photo_fit img-responsive img-rounded' all='descargable mi fit'>
														</div>
													</div>
												</center>
											</div>
											<div class='modal-footer'>
												<button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
											</div>
										</div>
									</div>
								</div>";
								}
							}
						}

					echo "</table>";
				}else {
					echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
						echo "<tr class='active text-center'>
								<th><center> <strong> Tabla Evaluacion de Fatiga </strong></center></th>
							</tr>";
						echo "<tr>
								<td><h2>No hay Evaluaciones Regiastradas este Dia<h2></td>
							</tr>";
					echo "</table>";
					//Poder desactivar el boton de busqueda cuando no hay evaluaciones
					echo "<script>
							document.getElementById('input').disabled=true;
						</script>";
				}
			//Se por sta opcion cuando se encuentra en la primera recarga de la pagina evaluaciones de ese mismo dia
			}else {
				//Sacamos la fecha del dia
				$fecha_form = date("Y-m-d");
				//Las variables fecha_inicio y fecha_final se encuentran declaradas en el archivo Header_Admin.php linea 57
				$consulta = "SELECT * FROM reporte_evaluacion_fatiga WHERE fecha_hora BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY nivel_fatiga DESC";
				//$consulta = "SELECT * FROM reporte_evaluacion_fatiga WHERE fecha_hora BETWEEN '$fecha_inicio' AND '$fecha_final' ORDER BY nivel_fatiga DESC";
				$show = $conexion ->query($consulta);
				$count = $show->num_rows;

				if($count >= 1) {
					echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
						//Encabezados con etiqueta TR
						echo "<tr class='active'>
								<form action='' method='POST'>
									<input type='hidden' name='fecha_inicio' value='$fecha_inicio'>
									<input type='hidden' name='fecha_final' value='$fecha_final'>
									<input type='hidden' name='date_common' value='$fecha_form'>
									<input type='hidden' name='path' value='library/reportes/Evaluaciones/exportar_all_evaluaciones.php?'>
									<th>
										<button onclick='alert_dinamic_reporte_test(event,this.form.fecha_inicio.value,this.form.fecha_final.value,this.form.path.value,this.form.date_common.value)' class='btn btn-info tamaño-botones-general'>
											<span class='glyphicon glyphicon-download-alt'></span>
										</button>
									</th>
								</form>

								<th><span class='glyphicon glyphicon-map-marker'></span> ID Evaluacion</th>
								<th><span class='glyphicon glyphicon-calendar'></span> Fecha y Hora</th>
								<th><span class='glyphicon glyphicon-pushpin'></span> ID Conductor</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Nombre Conductor</th>
								<th><span class='glyphicon glyphicon-list-alt'></span> Apellido Conductor</th>
								<th># Documento Conductor</th>
								<th><span class='glyphicon glyphicon-hourglass'></span> Orden Reposo</th>
								<th><span class='glyphicon glyphicon-heart'></span> Nivel Fatiga</th>
							</tr>";

						foreach ($show as $registro) {
							//Sacamos el nivel de fatga para poder decirle en forma de texto que nivel de fatiga tiene y no un numero
							$nivel = $registro["nivel_fatiga"];
							//Enlazamos el archivo verificar_estado_campo para los campos que no tiene informacion , con esto le decimos al usuario que esa informacion no esta en la BD
							//Se coloco todos esos condicionales en un archivo aparte para poder mirarmas facil los errores
							include "library/verificar_estado_campo.php";

							$traer_informacion_evaluador = "SELECT * FROM reporte_evaluador WHERE id_usuario = $registro[id_evaluador] LIMIT 1";
							$show_info_evaluador = $conexion ->query($traer_informacion_evaluador);
							$count_evaluador = $show_info_evaluador->num_rows;

							if ($count_evaluador >= 1) {
								foreach ($show_info_evaluador as $registro_evaluador) {
									echo"<tr>
									<td>
										<div class='btn-group dropup'>
											<button class='btn btn-default dropdown-toggle' data-toggle='dropdown' data-target='#completo_Registro'>
												<span class='glyphicon glyphicon-plus'></span>
											</button>
											<ul class='dropdown-menu' role='menu'>
												<li><a href='#all$registro[id_evaluacion]' data-toggle='modal'><span class='glyphicon glyphicon-list-alt'></span> Ver Registro Completo</a></li>
												<li><a href='library/reportes/Evaluaciones/exportar_registro_evaluacion_fatiga.php?id_fa=$registro[id_evaluacion]'><span class='glyphicon glyphicon-download-alt'></span> Exportar Evaluacion</a></li>
											</ul>
										</div>
									</td>

									<td>$registro[id_evaluacion]</td>
									<td>$registro[fecha_hora]</td>
									<td>$registro[id_conductor]</td>
									<td>$registro[nombre_conductor]</td>
									<td>$registro[apellido_conductor]</td>
									<td>$registro[numero_documento]</td>
									<td>$registro[orden_reposo]</td>
									"?>
										<?php
											/*
												Cuando la variable $nivel vale 1 significa que tiene nivel Bajo
												Cuando la variable $nivel vale 2 significa que tiene nivel Medio
												Cuando la variable $nivel vale 3 significa que tiene nivel Alto
											*/
											if ($nivel == "1") {
												$valor_color = "rgb(200,255,200)";
												$valor_nivel_en_letras = "Bajo";
											}else if ($nivel == "2") {
												$valor_color = "rgb(200,200,255)";
												$valor_nivel_en_letras = "Medio";
											}else {
												$valor_color = "rgb(255,200,200)";
												$valor_nivel_en_letras = "Alto";
											}
										?>
									<?php
										echo "<td style='background:"
									?>
											<?php echo $valor_color; ?>
											<?php echo "; border-radius:60px 60px 60px 60px;'>$valor_nivel_en_letras
									</td>
								</tr>

								<div class='modal fade' id='all$registro[id_evaluacion]' tabindex='-1' role='dialog' aria-labelladby='myLargeModalLabel' aria-hidden='true'>
									<div class='modal-dialog modal-lg'>
										<div class='modal-content'>
											<div class='modal-header'>
												<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
												<h4 class='modal-title'><span class='glyphicon glyphicon-list-alt'></span> Registro Completo</h4>
											</div>
											<div class='modal-body'>
												<center>
													<div class='row'>
														<div class='col-md-6'>
															<label>ID Evaluacion : </label> $registro[id_evaluacion] <br>
														</div>
														<div class='col-md-6'>
															<label>Fecha/Hora : </label> $registro[fecha_hora] <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Informacion Conductor<br><br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6'>
															<div class='pull-right'>
																<img width='200' height='200' src='$registro[foto_conductor]' class='foto foto_conductor'>
															</div>
														</div>

														<div class='col-md-6 pull-left info_conductor'>
															<label>ID Conductor : </label> $registro[id_conductor] <br>
															<label>Nombre : </label> $registro[nombre_conductor] <br>
															<label>Apellido : </label> $registro[apellido_conductor] <br>
															<label>Numero documento : </label> $registro[numero_documento] <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<br>
															<br>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Informacion Evaluador<br><br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6 pull-left info_evaluador'>
															<label>ID Evaluador: </label> $registro[id_evaluador] <br>
															<label>Nombre Evaluador: </label> $registro_evaluador[nombre] <br>
															<label>Apellido Evaluador: </label> $registro_evaluador[apellido] <br>
															<label>Documento Evaluador: </label> $registro_evaluador[documento] <br>
														</div>
														<div class='col-md-6'>
															<div class='pull-right'>
																<img width='200' height='200' src='$registro_evaluador[foto]' class='foto'><br>
															</div>
														</div>

													</div>

													<div class='row'>
														<div class='col-md-12'>
															<br>
															<br>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Menú Sintomas </h3><br>
															"?>
																<?php
																	include "library/convertir/convertir_ids_sintomas.php";
																?>
															<?php echo "
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Estado del conductor Selecionado </h3><br> $registro[nombre_signo] <br>
															<h3>Otro Estado</h3> $registro[otro_estado_signo]
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															"?>
																<?php
																	include "library/convertir/convertir_ids_nivel_riesgo.php";
																?>
															<?php echo "
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6'>
															<label>Orden Reposo : </label> <strong class='orden_reposo'>$registro[orden_reposo]</strong> <br>
														</div>
														<div class='col-md-6'>
															<label>Nivel Fatiga : </label> <strong class='orden_reposo'>$valor_nivel_en_letras</strong> <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Menú Interrogatorio</h3><br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-6'>
															<label>Destino: </label> $registro[destino] <br>
															<label>Distancia en Km: </label> $registro[distancia_km] <br>
															<label>Tiempo Llegada: </label> $registro[tiempo_llegada] <br>
															<label>Ciudad: </label> $registro[origen_evaluacion] <br>
															<label>Descanso: </label> $registro[horas_descanso] Horas<br>
															<label>Camarote: </label> $camarote<br>
															<label>Horas Conduciendo: </label> $registro[horas_conducidas] Horas<br>
															<label>Sugerencia Horas Conducidas: </label> $registro[sugerencia_horas_conducidas] Minutos<br>
														</div>
														<div class='col-md-6'>
															<label>Tiempo en Otra Actividad: </label> $otra_actividad<br>
															<label>Cual Actividad: </label> $cual_actividad <br>
															<label>Tiempo Sueño: </label> $registro[horas_sueno] Minutos<br>
															<label>Tiempo Sueño Por la Manilla: </label> $registro[tiempo_sueno_manilla] Minutos<br>
															<label>Pulsaciones Conductor: </label> $valor_pulsaciones<br>
															<label>Tiempo Descanso: </label> $registro[tiempo_descanso] Horas<br>
															<label>El conductor con la informacion del sueño dijo la: </label> $registro[respuesta_conductor_sueno] <br>
															<label>Nombre copiloto: </label> $info_copiloto <br>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<label>Origen copiloto: </label> $origen_copiloto <br><hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<div>
																<h3>Menú Alteraciones Emocionales</h3><br>
															</div>

															<div>
																"?>
																	<?php
																		include "library/convertir/convertir_ids_emocional.php";
																	?>
																<?php echo "
															</div>
														</div>
													</div>


													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Menú Alteraciones Neurologicas</h3><br>
															"?>
																<?php
																	include "library/convertir/convertir_ids_neurologico.php";
																?>
															<?php echo "
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<hr>
														</div>
													</div>

													<div class='row'>
														<div class='col-md-12'>
															<h3>Descargable Mi Fit</h3><br>
															<img src='$registro[descargable_fit]' class='photo_fit img-responsive img-rounded' all='descargable mi fit'>
														</div>
													</div>
												</center>
											</div>
											<div class='modal-footer'>
												<button type='button' class='btn btn-danger btn-lg' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
											</div>
										</div>
									</div>
								</div>";
								}
							}
						}

					echo "</table>";
				}else {
					echo "<table class='table table-bordered table-hover table-condensed text-center' id='table'>";
						echo "<tr class='active text-center'>
								<th><center> <strong> Tabla Evaluacion de Fatiga </strong></center></th>
							</tr>";
						echo "<tr>
								<td><h3>No se ha realizado ninguna Evaluacion el Dia de Hoy</h3></td>
							</tr>";
					echo "</table>";
					//Poder desactivar el boton de busqueda cuando no hay evaluaciones
					echo "<script>
							document.getElementById('input').disabled=true;
						</script>";
				}
			}
		?>
	</div>

	<!--Modal de mas opciones-->
	<div id="contenedor_buscar_otro_dia" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-option-vertical"> Mas Opciones</span></h4>
				</div>

				<div class="modal-body">
					<form action="" method="post">
						<center>
							<h3>Ingresar Fecha de Busqueda</h3>
							<!--<input type="text" id="datepicker" name="buscar_fecha_evaluacion" placeholder="Seleccionar Fecha" required><br><br><hr>-->
							<input type="date" name="buscar_fecha_evaluacion" placeholder="AAAA-MM-DD" required><br><br>
							<button type="submit" class="glyphicon glyphicon-search btn btn-success"></button>
							<hr>
							<div class="row">
								<h3>Nivel de Fatiga del dia
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_nivel_fatiga_dia" data-toggle="tooltip" data-placement="right" title="Aqui presentamos el total de los conductores en su nivel de fatiga del dia seleccionado o el dia en que se encuentra.">
										<span class="glyphicon glyphicon-info-sign"></span>
									</button>
								</h3>
								<div class="col-md-4">
									<label><span class="glyphicon glyphicon-bookmark"></span> </label><strong> Alto</strong>
									<input type="text" class="btn btn-danger btn-lg redondear_caja" value="<?php echo $total_Nivel_alto; ?>" disabled/><br>
								</div>
								<div class="col-md-4">
									<label><span class="glyphicon glyphicon-bookmark"></span> </label><strong> Medio</strong>
									<input type="text" class="btn btn-primary btn-lg redondear_caja" value="<?php echo $total_Nivel_medio; ?>" disabled/><br>
								</div>
								<div class="col-md-4">
									<label>
										<span class="glyphicon glyphicon-bookmark"></span>
									</label>
									<strong> Bajo</strong>
									<input type="text" class="btn btn-success btn-lg redondear_caja" value="<?php echo $total_Nivel_bajo; ?>" disabled/><br>
								</div>
							</div>

							<hr>
							<div class="row">
								<h3>Nivel General de Fatiga <button type="button" class="btn btn-xs btn-primary" id="ayuda_nivel_fatiga_general" data-toggle="tooltip" data-placement="right" title="Aqui presentamos el total del nivel de fatiga en todas las evaluaciones hechas hasta la fecha."><span class="glyphicon glyphicon-info-sign"></span></button></h3>
								<div class="col-md-4">
									<label><span class="glyphicon glyphicon-flag"></span> </label><strong> Alto</strong>
									<input type="text"  class="btn btn-danger btn-lg redondear_caja" value="<?php echo $total_Nivel_alto_general; ?>" disabled/><br>
								</div>

								<div class="col-md-4">
									<label><span class="glyphicon glyphicon-flag"></span> </label><strong> Medio</strong>
									<input type="text"  class="btn btn-primary btn-lg redondear_caja" value="<?php echo $total_Nivel_medio_general; ?>" disabled/><br>
								</div>

								<div class="col-md-4">
									<label><span class="glyphicon glyphicon-flag"></span> </label><strong> Bajo</strong>
									<input type="text"  class="btn btn-default btn-lg redondear_caja" value="<?php echo $total_Nivel_bajo_general; ?>" disabled/><br>
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
	</div><br>

	<?php include 'library/Footer.php'; ?>
</body>
</html>