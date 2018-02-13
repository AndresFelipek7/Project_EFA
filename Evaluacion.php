<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Registro | Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
	<?php
		//Esta variable nos sirve para impedir la recarga de la pagina del formulario para que no se duplique la evaluacion en la BD
		//Cuando aqui se envie la evaluacion a registro evaluacion va la variable global Verificar en 1 para saber que se envio solo una vez
		$verificar_recarga = 1;
		$_SESSION["verificar"] = 0;
		$_SESSION["verificar"] = $verificar_recarga;
	?>
</head>
<body>
	<?php include 'library/Head/Header-main.php'; ?>

	<?php
		//Variable de sesion para saber cuando inicio la evaluacion el evaluador para hacer una validacion de seguridad de forma interna
		$_SESSION['tiempo_inicio'] = date("i:s");
	?>

	<div class='container text-center'>
		<div class="row">
			<h2>EFA</h2>
			<h5 class="mensaje_actualiza_info_conductor"><strong>*Se recomienda Mirar el porcentaje de la bateria de la manilla , si esta por debajo del 15% se debe Cargar Inmediatamente*</strong></h5>
		</div>
	</div><br><br>

	<!-- contenedor de los menus de la evaluacion -->
	<div class='container'>
		<!--Contenedor donde se encuentran todos los menus-->
		<div class='panel-group container col-md-8' role='tablist' aria-multiselectable='true'>

			<!--CONTENEDOR DE INFORMACION GENERAL-->
			<div class='panel panel-info text-center'>
				<div class='panel-heading' role='tab' id='headingOne'>
					<h4 class='panel-title'>
						<a  role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
							<span class="glyphicon glyphicon-bookmark"> Informacion General</span>
						</a>
					</h4>
				</div>

				<div id='collapseOne' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>
					<div class='panel-body'>
						<div>
							<div class="col-md-6">
								<label> <span class="glyphicon glyphicon-screenshot"></span> Fecha: </label>
								<script>
									var meses = new Array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
									var diasSemana = new Array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
									var f = new Date();
									document.write(diasSemana[f.getDay()] + ', ' + f.getDate() + ' de ' + meses[f.getMonth()] + ' de ' + f.getFullYear());
								</script><br>
							</div>
							<div class="col-md-6">
								<label> <span class="fa fa-bell"></span> Hora: </label>
								<script>
									var separador = ":";
									var crear_objeto_date = new Date();
									var traer_hora = crear_objeto_date.getHours();
									var traer_minuto = crear_objeto_date.getMinutes();
									var meridiano = " am";

										//Para identificar cuando son las 12 del dia y no aparezca AM
										if(traer_hora == 12) {
											meridiano = " pm";
										}

										//Para que cuando pase las 12 no nos de la hora militar
										if(traer_hora > 12){
											traer_hora -= 12;
											meridiano = " pm";
										}

										//Para cuando las horas son menor a 10 horas
										if (traer_hora < 10) {
											traer_hora = "0" + traer_hora;
										}

										if (traer_minuto < 10) {
											traer_minuto = "0" + traer_minuto;
										}

										var hora_final = traer_hora + separador + traer_minuto + meridiano;
										document.write(hora_final);
									</script>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--CONTENEDOR MENU INTERROGATORIO-->
			<div class='panel panel-warning text-center'>
				<div class='panel-heading' role='tab' id='headingTwo'>
					<h4 class='panel-title'>
						<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>
							<span class="glyphicon glyphicon-signal"> Interrogatorio </span>
						</a>
					</h4>
				</div>

				<div id='collapseTwo' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingTwo'>
					<div class='panel-body'>
						<form action='registro_Evaluacion.php' method='post' enctype="multipart/form-data" class='formulario' name="f_evaluacion">
							<center>
								<button type="button" class="btn btn-md btn-primary" id="ayuda_interrogatorio" data-toggle="tooltip" data-placement="right" title="En este Menu es necesario saber las horas que el conductor indique en cada caso"><span class="fa fa-info"></span></button>
								<h4>Informacion en Horas</h4>
								<h4 class="input_obligatory">Campo Obligatorio *</h4>
								<button type="reset" class="btn btn-warning" onclick="hide_new_input_destiny();"> <span class="glyphicon glyphicon-remove"></span></button>
								<hr>

								<div class=' col-md-6'>
									<label>Origen </label>
									<input type="text" class="form-control" value="Bogotá" readonly><br>
								</div>

								<div class=' col-md-6'>
									<label class="input_obligatory">*</label>
									<?php
										include 'library/listas dinamicas/lista_Dinamica_destino.php';
									?>
								</div>

								<div id="container_distance_time"></div>
								<div class='col-md-12'>
									<hr>
								</div><br>

								<div class=' col-md-4'>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_interrogatorio_descanso" data-toggle="tooltip" data-placement="top" title="Descanso inactivo consiste en las horas despues de conducir o de su jornada laboral"><span class="fa fa-info"></span></button>
									<label class="input_obligatory">*</label> <label>Descanso | Inactivo </label>
									<select name='descanso' id="hora_descanso" class="l_tiempo" required>
										<?php
											for ($i=1; $i < 13; $i++) {
												echo "<option value='$i'> $i </option>";
											}
										?>
									</select>
								</div>

								<div class=' col-md-4'>
									<div id="camarote" class="hide_container">
										<button type="button" id="ayuda_camarote" class="btn btn-xs btn-primary" id="ayuda_interrogatorio_camarote" data-toggle="tooltip" data-placement="top" title="Camarote son las horas que descansa cuando el destino supera las 8 horas de recorrido"><span class="fa fa-info"></span></button>
										<label class="input_obligatory">*</label> <label>Camarote </label>
										<select name='camarote' class="l_tiempo" id="hora_camarote">
											<?php
												for ($i=1; $i < 13; $i++) {
													echo "<option value='$i'> $i </option>";
												}
											?>
										</select>
									</div>
								</div>

								<div class=' col-md-4'>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_interrogatorio_conduciendo" data-toggle="tooltip" data-placement="top" title="Horas conduciendo significa las horas que lleva detras del volante"><span class="fa fa-info"></span></button>
									<label class="input_obligatory">*</label> <label>Conduciendo </label>
									<select name='conduciendo' class="l_tiempo" id="hora_conduciendo" onchange="check_hour_all_destiny();" required>
										<?php
											for ($i=1; $i < 22; $i++) {
												echo "<option value='$i'> $i </option>";
											}
										?>
									</select>
								</div><br><br>

								<div class=' col-md-12'>
									<div class="contenedor_otra_actividad">
										<input type="checkbox" name="actividad" id="otra_actividad_checkbox"  onclick="show_other_activity();">
										<label for="otra_actividad_checkbox"> Otra Actividad</label>
									</div><br>

									<div id="contenedor_o_actividad" class="hide_container">
										<div class=' col-md-12'>
											<label>Cuantas Horas </label><br>
											<select name="otra_actividad" class="l_tiempo" id="otra_actividad" onclick="check_hour_all_destiny()">
												<?php
												for ($i=0; $i < 13; $i++) {
													echo "<option value='$i'> $i </option>";
												}
											?>
											</select><br><br>
										</div>

										<div class=' col-md-12'>
											<label>Cuales Actividades?</label><br>
											<textarea name="cual_actividad" cols="90" rows="5" class="borde_textarea" id="other_activity" placeholder="Ingresar cuales fueron las otras Actividades" onkeypress='return onlyWords(event)' onchange="style_border_input('other_activity','verde')"></textarea>
										</div>
									</div>
								</div>

								<div class='col-md-12'>
									<hr>
								</div><br>

								<div class='col-md-6'>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_tiempo_sueño" data-toggle="tooltip" data-placement="left" title="Tiempo de sueño consiste en las horas que a dormido en la casa"><span class="fa fa-info"></span></button>
									<label class="input_obligatory">*</label> <label>Tiempo de Sueño Efectivo </label>
									<input type='text' name='sueño_efectivo_previo' class="form-control" id="sueño_efectivo_previo" placeholder="Ingresar Hora" onkeypress="return justNumbers(event);" onchange="check_hour_break(); style_border_input('sueño_efectivo_previo','verde')" required><br>
								</div><br>

								<div class='col-md-6'>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_tiempo_descanso" data-toggle="tooltip" data-placement="left" title="Tiempo descanso es durante su jornada laboral Ejemplo = Alistamiento del vehiculo , almorzando ,comprando la tasa de uso "><span class="fa fa-info"></span></button>
									<label class="input_obligatory">*</label> <label>Tiempo de Descanso </label>
									<input type='text' name='tiempo_descanso'  class="form-control" id='tiempo_descanso' placeholder="Ingresar Hora" onkeypress="return justNumbers(event);" onchange="check_hour_break(); style_border_input('tiempo_descanso','verde')" required><br>
								</div><br>

								<div class='col-md-12'>
									<hr>
								</div><br>

								<div class='col-md-6'>
									<label>Acompañante </label>
									<input type='text' name='copiloto' id="copiloto" class="form-control" placeholder="Nombre Copiloto" onkeypress="return onlyWords(event)" onchange="style_border_input('copiloto','verde')">
								</div><br>

								<div class='col-md-6'>
									<label>Origen del Acompañante </label>
									<input type='text' name='origen_copiloto' id="origen_copiloto" class="form-control" onkeypress="return onlyWords(event)" onchange="style_border_input('origen_copiloto','verde')" placeholder="Ciudad de Origen">
								</div><br>
					</div>
				</div>
			</div>

			<!--CONTENEDOR MENU SINTOMAS FATIGA-->
			<div class='panel panel-warning text-center'>
				<div class='panel-heading' role='tab' id='headingThree'>
					<h4 class='panel-title'>
						<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>
							<span class="glyphicon glyphicon-heart"> Sintomas</span>
						</a>
					</h4>
				</div>

				<div id='collapseThree' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
					<div class='panel-body text-center style_check_sintomas'>
						<button type="button" class="btn btn-md btn-primary" id="ayuda_sintoma" data-toggle="tooltip" data-placement="right" title="Los sintomas de fatiga es lo que el conductor dice que siente en el momento de hacer la evaluacion de fatiga"><span class="fa fa-info"></span></button>
						<h4>Seleccion Multiple</h4>
						<a class="btn btn-success" onclick="select_all_checkbox()"> <span class="fa fa-check-square"></span> Marcar Todos</a>
						<a class="btn btn-warning" onclick="desmarcar_todo_checkbox()"><span class="fa fa-minus-square"></span> Desmarcar Todos</a>
						<hr>
						<?php
							include "library/checkbox dinamicos/checkbox_sintomas.php";
						?>
						<hr>
						<input type="checkbox" name="sintomas[]" id="otro_sintoma" value="otro_sintoma" onclick="show_others_options('otro_sintoma','container_other_sintoma');">
						<label for="otro_sintoma">Otro Sintoma</label><br>

						<div id="container_other_sintoma" class="hide_container">
							<textarea name="valor_otro_sintoma" id="valor_otro_sintoma" class="borde_textarea" placeholder="Colocar cuales sintomas" cols="90" rows="5" onkeypress='return onlyWords(event)' onchange="style_border_input('valor_otro_sintoma','verde')"></textarea>
						</div>
					</div>
				</div>
			</div>

			<!--CONTENEDOR MENU SIGNOS FATIGA-->
			<div class='panel panel-warning text-center'>
				<div class='panel-heading' role='tab' id='headingThree'>
					<h4 class='panel-title'>
						<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse4' aria-expanded='false' aria-controls='collapseThree'>
							<span class="glyphicon glyphicon-eye-open"> Signos</span>
						</a>
					</h4>
				</div>

				<div id='collapse4' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
					<div class='panel-body text-center'>
						<button type="button" class="btn btn-md btn-primary" id="ayuda_signo" data-toggle="tooltip" data-placement="right" title="Los signos de fatiga es lo que se puede medir mediante algun instrumento con ese objetivo"><span class="fa fa-info"></span></button>
						<br>
						<?php include 'library/listas dinamicas/lista_Dinamica_signos.php';?>
						<hr>
						<a href="#sincronizar_manilla" data-toggle='modal' class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span></a>
						<?php
							$traer_id_conductor = $_POST['valor_id'];

							$consulta_Traer_pass_user_fit = "SELECT usuario_fit , pass_fit FROM conductor WHERE id_conductor = '$traer_id_conductor'";
							$resultado_fit = $conexion ->query($consulta_Traer_pass_user_fit);
							$count_fit = $resultado_fit->num_rows;

							if($count_fit >= 1) {
								$fila = mysqli_fetch_array($resultado_fit);
								$traer_usuario = $fila["usuario_fit"];
								$traer_contraseña = $fila["pass_fit"];
							}
						?>
						<a href="#usuario_contraseña_conductor" data-toggle='modal' class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a>
						<div>
							<div class="col-md-12">
								<button type="button" class="btn btn-md btn-primary" id="ayuda_sueño_profundo" data-toggle="tooltip" data-placement="left" title="Sueño profundo consiste en el tiempo en que el conductor a dormido profundamente para poder descansar lo mas posible"><span class="fa fa-info"></span></button>
								<center>
									<input type="hidden" name="desde" value="form_evaluacion">
									<input type="hidden" name="path_from" value="evaluacion.php">
									<input type="hidden" name="id_input_hour" value="solo_hora_sueno">
									<input type="hidden" name="id_input_minutes" value="solo_minutos">
									<input type="hidden" name="id_input_hour_both" value="solo_hora_sueno_both">
									<input type="hidden" name="id_input_minutes_both" value="solo_minutos_both">

									<label>Sueño Profundo </label><br>
									<select id="sueño_profundo" name="sueño_profundo" onchange="show_container_checked();">
										<option value="hora">Solo hora</option>
										<option value="minutos">Solo Minutos</option>
										<option value="ambos">Hora y minutos</option>
									</select><br><br>

									<div id="container_deep_sleep_only_hour">
										<input type="number" class="form-control" name="solo_hora_sueno" id="solo_hora_sueno" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_24(this.form.solo_hora_sueno.value,this.form.path_from.value,this.form.id_input_hour.value);" required>
									</div>
									<div id="container_deep_sleep_only_minutes" class="hide_container">
										<input type='number' class='form-control' id="solo_minutos" name='solo_minutos_sueno' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno.value,this.form.path_from.value,this.form.id_input_minutes.value);" required>
									</div>
									<div id="container_deep_sleep_both_time" class="row hide_container">
										<div class="col-md-6">
											<input type="number" class="form-control" id="solo_hora_sueno_both" name="solo_hora_sueno_both" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_24(this.form.solo_hora_sueno_both.value,this.form.path_from.value,this.form.id_input_hour_both.value);" required>
										</div>
										<div class="col-md-6">
											<input type='number' class='form-control' id="solo_minutos_both" name='solo_minutos_sueno_both' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno_both.value,this.form.path_from.value,this.form.id_input_minutes_both.value);" required>
										</div>
									</div>
								</center>
								<hr>
							</div>

							<div class="col-md-12">
								<button type="button" class="btn btn-xs btn-primary" id="ayuda_pulsaciones" data-toggle="tooltip" data-placement="left" title="Las pulsaciones es el pulso que presente el conductor durante la evaluacion de fatiga , si por alguna razon las pulsaciones superan las 100 por minuto es necesario repetir la medicion de las pulsaciones para estar seguros. solo se coloca el numero entero en este campo."><span class="fa fa-info"></span></button>
								<center>
									<label>Valor Pulsaciones </label>
									<input type="text" name="pulsaciones" class="form-control" id="pulsaciones" placeholder="Ingrese valor numerico" onkeypress="return justNumbers(event);" onchange="limit_pulsation_hearth(); style_border_input('pulsaciones','verde')">
								</center>
							</div>

							<div class="col-md-12">
								<div id="container_extensiones_agree" class="center_element"></div>
								<center>
									<label>Cargar Descargable Mi Fit</label>
									<input type="file" name="photo" id="descargable_fit" onchange="check_photo(this.form.photo.value,'evaluacion');">
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--CONTENEDOR MENU ALTERACIONES EMOCIONALES-->
			<div class='panel panel-warning text-center'>
				<div class='panel-heading' role='tab' id='headingThree'>
					<h4 class='panel-title'>
						<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse5' aria-expanded='false' aria-controls='collapseThree'>
							<span class="fa fa-thumbs-up"> Alteraciones Emocionales</span>
						</a>
					</h4>
				</div>

				<div id='collapse5' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
					<div class='panel-body text-center style_check_emocional'>
						<button type="button" class="btn btn-md btn-primary" id="ayuda_a_emocional" data-toggle="tooltip" data-placement="right" title="Son los estado emocionales como se encuentra el conductor en el momento de la evaluacion"><span class="fa fa-info"></span></button>
						<h4>Seleccion Multiple</h4>
						<hr>
						<?php
							include "library/checkbox dinamicos/checkbox_emocional.php";
						?>
						<hr>
						<input type='checkbox' name='alteraciones_emocionales[]' id="otra_a_emocional" value="otra_a_emocional" onclick="show_others_options('otra_a_emocional','contenedor_alteracines_emocionales');">
						<label for="otra_a_emocional">Otra Alteracion Emocional</label>

						<div id="contenedor_alteracines_emocionales" class="hide_container">
							<textarea  name="otra_alteracion_emocional" id="otra_alteracion_emocional" class="borde_textarea" placeholder="Colocar cuales Alteraciones Emocionales" cols="90" rows="5" onkeypress='return onlyWords(event)' onchange="style_border_input('otra_alteracion_emocional','verde')"></textarea>
						</div>
					</div>
				</div>
			</div>

			<!--CONTENEDOR MENU ALTERACIONES NEUROLOGICAS-->
			<div class='panel panel-warning text-center'>
				<div class='panel-heading' role='tab' id='headingThree'>
					<h4 class='panel-title'>
						<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse6' aria-expanded='false' aria-controls='collapseThree'>
							<span class="fa fa-diamond"> Alteraciones Neurologicas</span>
						</a>
					</h4>
				</div>

				<div id='collapse6' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
					<div class='panel-body text-center style_check_neurologico'>
						<button type="button" class="btn btn-md btn-primary" id="ayuda_a_neurologico" data-toggle="tooltip" data-placement="right" title="Es el estado neurologico en el que se encuentra el conductor"><span class="fa fa-info"></span></button>
						<h4>Seleccion Multiple</h4>
						<h4>En este menu se completa con las alteraciones que no presenta</h4>
						<h4><span class="label label-warning">Ejemplo : No esta atento , No esta cordinado , No tiene reflejos</span></h4>
						<hr>
						<?php
							include "library/checkbox dinamicos/checkbox_neurologico.php";
						?>
						<hr>
						<input type='checkbox' name='alteraciones_neurologicas[]' id="otra_a_neurologica" value="otra_a_neurologica" onclick="show_others_options('otra_a_neurologica','contenedor_alteraciones_neurologicas');">
						<label for="otra_a_neurologica">Otra Alteracion Neurologica</label>

						<div id="contenedor_alteraciones_neurologicas" class="hide_container">
							<textarea  name="otra_alteracion_neurologica" class="borde_textarea" id="otra_alteracion_neurologica" placeholder="Colocar cuales Alteraciones Neurologicas" cols="90" rows="5" onkeypress='return onlyWords(event)' onchange="style_border_input('otra_alteracion_neurologica','verde')"></textarea>
						</div>
					</div>
				</div>
			</div><br>

			<div class='text-center'>
				<button class='btn btn-success' type='submit' id="enviar_evaluacion" name="enviar_evaluacion"><span class="glyphicon glyphicon-ok"></span> </button>
				</center>
			</div>
		</div>

		<!--Aqui colocamos la informacion del conductor al lado derecho-->
		<aside class='col-md-4'>
			<a href='#seccion' data-toggle='collapse' class='btn btn-success' id="aside_conductor"><span class="glyphicon glyphicon-chevron-down" id="text_aside_info_driver"> Mostrar Informacion del Conductor</span></a>

			<div class='collapse' id='seccion'>
				<br>
				<div class='well text-center'>
					<?php
						$consulta_conductor = "SELECT * FROM reporte_conductor_activo WHERE id_conductor = '$traer_id_conductor'";
						$resultado = $conexion -> query($consulta_conductor);
						$count = $resultado->num_rows;

						if($count >=1) {
							$row = mysqli_fetch_array($resultado);
							$_SESSION["foto"] = $row['foto'];
							$_SESSION["registro"]= $row['id_conductor'];
							$_SESSION["nombre"] = $row['nombre'];
							$_SESSION["apellido"] = $row['apellido'];
							$_SESSION["documento"] = $row['documento'];
							$_SESSION["edad"] = $row['edad'];
							$_SESSION["telefono"] = $row['telefono'];
							$_SESSION["placa"] = $row['Placa'];
						}
					?>

					<img width="100"  height="100" src="<?php echo $_SESSION['foto']; ?>" class="foto_generica"><br><br>
					<label>Nombre = </label> <?php echo $_SESSION["nombre"] ?><br>
					<label>Apellido = </label> <?php echo $_SESSION["apellido"] ?><br>
					<label>Numero Documento = </label> <?php echo $_SESSION["documento"] ?><br>
					<label>Edad = </label> <?php echo $_SESSION["edad"] ?><br>
					<label>Telefono = </label> <?php echo $_SESSION["telefono"] ?><br>
					<label>Placa = </label> <?php echo $_SESSION["placa"] ?><br>
				</div>
			</div>
		</aside>
	</div>

	<!--Modal para como sincronizar la manilla con la app mi fit-->
	<div class="modal fade" id="sincronizar_manilla">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-info"> Sincronizar la Manilla</span></h4>
				</div>

				<div class="modal-body text-center">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Pasos para Sincronizar</h3>
						</div>
						<div class="panel-body">
							<label><strong>Paso 1:</strong></label> Abrir la aplicacion mi fit en su Celular<br>
						<label><strong>Paso 2:</strong></label> Ingresar usuario y contraseña del conductor al que se le esta haciendo la evaluacion de fatiga<br>
						<label><strong>Paso 3:</strong></label> Ir al menu principal de la aplicacion mi fit , en el apartado de sincronizar manilla en el menu principal <br>
						<label><strong>Paso 4:</strong></label> Esperar unos segundos hasta que sincronice toda la informacion <br>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal para mostrar usuario y contraseña del conductor-->
	<div class="modal fade" id="usuario_contraseña_conductor">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-info"> Credenciales del Conductor</span></h4>
				</div>

				<div class="modal-body text-center">
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Usuario</h3>
								</div>
								<div class="panel-body">
									<label><?php echo $traer_usuario; ?></label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">Contraseña</h3>
								</div>
								<div class="panel-body">
									<label><?php echo $traer_contraseña; ?></label>
								</div>
							</div>
						</div>
					</div>

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