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
							<span class="glyphicon glyphicon-bookmark"> Información General</span>
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

			<!--CONTENEDOR MENU ESTADO DE INGRESO DEL CONDUCTOR-->
			<div class='panel panel-warning text-center'>
				<div class='panel-heading' role='tab' id='headingThree'>
					<h4 class='panel-title'>
						<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse4' aria-expanded='false' aria-controls='collapseThree'>
							<span class="glyphicon glyphicon-eye-open"> Estado del Conductor</span>
						</a>
					</h4>
				</div>

				<div id='collapse4' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
					<div class='panel-body text-center'>
						<form action='reporte_Evaluacion.php' method='post' enctype="multipart/form-data" class='formulario' name="f_evaluacion">
							<button type="button" class="btn btn-md btn-primary" id="ayuda_signo" data-toggle="tooltip" data-placement="right" title="Los signos de fatiga es lo que se puede medir mediante algun instrumento con ese objetivo"><span class="fa fa-info"></span></button>
							<br>
							<div>
								<div class="col-md-12">
									<div id="container_extensiones_agree" class="center_element"></div>
									<center>
										<label>Cargar Descargable Mi Fit</label>
										<input type="file" name="photo" id="descargable_fit" onchange="check_photo(this.form.photo.value,'evaluacion');">
									</center>
									<hr>
								</div>
								<div class="col-md-12">
									<button type="button" class="btn btn-md btn-primary" id="ayuda_pulsaciones" data-toggle="tooltip" data-placement="left" title="Las pulsaciones es el pulso que presente el conductor durante la evaluacion de fatiga , si por alguna razon las pulsaciones superan las 100 por minuto es necesario repetir la medicion de las pulsaciones para estar seguros. solo se coloca el numero entero en este campo."><span class="fa fa-info"></span></button>
									<center>
										<label>Valor Pulsaciones </label>
										<input type="number" name="pulsaciones" class="form-control" id="pulsaciones" placeholder="Ingrese valor numerico" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="limit_pulsation_hearth(); style_border_input('pulsaciones','verde')" required>
									</center>
									<hr>
								</div>
								<div class="col-md-12">
									<a href="#usuario_contraseña_conductor" data-toggle='modal' class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a>
									<button type="button" class="btn btn-md btn-primary" id="ayuda_sueño_profundo" data-toggle="tooltip" data-placement="right" title="Sueño profundo consiste en el tiempo en que el conductor a dormido."><span class="fa fa-info"></span></button>
									<center>
										<input type="hidden" name="desde" value="form_evaluacion">
										<input type="hidden" name="path_from" value="evaluacion.php">

										<label>Sueño Total Manilla </label><br>
										<select id="solo_sueño_manilla" name="solo_sueño_manilla" onchange="show_container_checked('solo_sueño_manilla','container_deep_sleep_only_hour','container_deep_sleep_only_minutes','container_deep_sleep_both_time')">
											<option value="hora">Solo hora</option>
											<option value="minutos">Solo Minutos</option>
											<option value="ambos">Hora y minutos</option>
										</select><br><br>

										<div id="container_deep_sleep_only_hour">
											<input type="number" class="form-control" name="solo_hora_sueno" id="solo_hora_sueno" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno.value,this.form.path_from.value,this.form.id_input_hour.value)">
										</div>
										<div id="container_deep_sleep_only_minutes" class="hide_container">
											<input type='number' class='form-control' id="solo_minutos_sueno" name='solo_minutos_sueno' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno.value,this.form.path_from.value,this.form.id_input_minutes.value)">
										</div>
										<div id="container_deep_sleep_both_time" class="row hide_container">
											<div class="col-md-6">
												<input type="number" class="form-control" id="solo_hora_sueno_both" name="solo_hora_sueno_both" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno_both.value,this.form.path_from.value,this.form.id_input_hour_both.value)">
											</div>
											<div class="col-md-6">
												<input type='number' class='form-control' id="solo_minutos_sueno_both" name='solo_minutos_sueno_both' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno_both.value,this.form.path_from.value,this.form.id_input_minutes_both.value)">
											</div>
										</div>
									</center>
									<hr>
								</div>
								<!-- CODIGO CUANDO ESTA EL SUEÑO PROFUNDO Y SUEÑO LIGERO  -->
								<!-- <div class="col-md-12">
									<button type="button" class="btn btn-md btn-primary" id="ayuda_sueño_profundo" data-toggle="tooltip" data-placement="left" title="Sueño profundo consiste en el tiempo en que el conductor a dormido."><span class="fa fa-info"></span></button>
									<center>
										<input type="hidden" name="desde" value="form_evaluacion">
										<input type="hidden" name="path_from" value="evaluacion.php">
										<input type="hidden" name="id_input_hour" value="solo_hora_sueno">
										<input type="hidden" name="id_input_minutes" value="solo_minutos">
										<input type="hidden" name="id_input_hour_both" value="solo_hora_sueno_both">
										<input type="hidden" name="id_input_minutes_both" value="solo_minutos_both">

										<label>Sueño Profundo </label><br>
										<select id="sueño_profundo" name="sueño_profundo" onchange="show_container_checked('sueño_profundo','container_deep_sleep_only_hour','container_deep_sleep_only_minutes','container_deep_sleep_both_time')">
											<option value="hora">Solo hora</option>
											<option value="minutos">Solo Minutos</option>
											<option value="ambos">Hora y minutos</option>
										</select><br><br>

										<div id="container_deep_sleep_only_hour">
											<input type="number" class="form-control" name="solo_hora_sueno" id="solo_hora_sueno" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno.value,this.form.path_from.value,this.form.id_input_hour.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
										</div>
										<div id="container_deep_sleep_only_minutes" class="hide_container">
											<input type='number' class='form-control' id="solo_minutos_sueno" name='solo_minutos_sueno' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno.value,this.form.path_from.value,this.form.id_input_minutes.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
										</div>
										<div id="container_deep_sleep_both_time" class="row hide_container">
											<div class="col-md-6">
												<input type="number" class="form-control" id="solo_hora_sueno_both" name="solo_hora_sueno_both" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno_both.value,this.form.path_from.value,this.form.id_input_hour_both.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
											</div>
											<div class="col-md-6">
												<input type='number' class='form-control' id="solo_minutos_sueno_both" name='solo_minutos_sueno_both' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno_both.value,this.form.path_from.value,this.form.id_input_minutes_both.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
											</div>
										</div>
									</center>
									<hr>
								</div>

								<div class="col-md-12">
									<button type="button" class="btn btn-md btn-primary" id="ayuda_sueño_profundo" data-toggle="tooltip" data-placement="left" title="Sueño Ligero consiste en el tiempo de sueño donde el conductor no esta descansando de forma adecuada para el cuerpo."><span class="fa fa-info"></span></button>
									<center>
										<input type="hidden" name="desde" value="form_evaluacion">
										<input type="hidden" name="path_from" value="evaluacion.php">
										<input type="hidden" name="id_input_hour_ligero" value="solo_hora_sueno_ligero">
										<input type="hidden" name="id_input_minutes_ligero" value="solo_minutos_ligero">
										<input type="hidden" name="id_input_hour_both_ligero" value="solo_hora_sueno_both_ligero">
										<input type="hidden" name="id_input_minutes_both_ligero" value="solo_minutos_both_ligero">

										<label>Sueño Ligero </label><br>
										<select id="sueño_ligero" name="sueño_ligero" onchange="show_container_checked('sueño_ligero','container_deep_sleep_only_hour_light','container_deep_sleep_only_minutes_light','container_deep_sleep_both_time_light')">
											<option value="hora">Solo hora</option>
											<option value="minutos">Solo Minutos</option>
											<option value="ambos">Hora y minutos</option>
										</select><br><br>

										<div id="container_deep_sleep_only_hour_light">
											<input type="number" class="form-control" name="solo_hora_sueno_ligero" id="solo_hora_sueno_ligero" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno_ligero.value,this.form.path_from.value,this.form.id_input_hour_ligero.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
										</div>
										<div id="container_deep_sleep_only_minutes_light" class="hide_container">
											<input type='number' class='form-control' id="solo_minutos_sueno_ligero" name='solo_minutos_sueno_ligero' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno_ligero.value,this.form.path_from.value,this.form.id_input_minutes_ligero.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
										</div>
										<div id="container_deep_sleep_both_time_light" class="row hide_container">
											<div class="col-md-6">
												<input type="number" class="form-control" id="solo_hora_sueno_both_ligero" name="solo_hora_sueno_both_ligero" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno_both_ligero.value,this.form.path_from.value,this.form.id_input_hour_both_ligero.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
											</div>
											<div class="col-md-6">
												<input type='number' class='form-control' id="solo_minutos_sueno_both_ligero" name='solo_minutos_sueno_both_ligero' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno_both_ligero.value,this.form.path_from.value,this.form.id_input_minutes_both_ligero.value),show_all_time_sleep(this.form.sueño_profundo.value,this.form.sueño_ligero.value)">
											</div>
										</div>
									</center>
									<div id="content_all_time_both_sleep" class="hide_container"></div>
									<hr>
								</div> -->
							</div>
							<?php include 'library/listas dinamicas/lista_Dinamica_signos.php';?><br><br>
								<div class="style_check_estado_signo">
									<input type="checkbox" name="otro_estado" id="otro_estado" value="otro_sintoma" onclick="show_others_options('otro_estado','container_other_state');">
									<label for="otro_estado">Otro Estado</label><br>
								</div>

								<div id="container_other_state" class="hide_container">
									<textarea name="valor_otro_estado_signo" id="valor_otro_estado" class="borde_textarea" placeholder="Colocar Estado del Conductor" cols="90" rows="5" onkeypress='return onlyWords(event)' onchange="style_border_input('valor_otro_estado','verde')"></textarea>
								</div>
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
						<center>
							<button type="button" class="btn btn-md btn-primary" id="ayuda_interrogatorio" data-toggle="tooltip" data-placement="right" title="En este Menu es necesario saber las horas que el conductor indique en cada caso"><span class="fa fa-info"></span></button>
							<h4>Informacion en Horas</h4>
							<h4 class="input_obligatory">Campo Obligatorio *</h4>
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

							<!--  Campo Tiempo Alistamiento -->
							<div class="col-md-12">
								<center>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_interrogatorio_descanso" data-toggle="tooltip" data-placement="top" title="Descanso inactivo consiste en las horas despues de conducir o de su jornada laboral"><span class="fa fa-info"></span></button>
									<input type="hidden" name="desde" value="form_evaluacion">
									<input type="hidden" name="path_from" value="evaluacion.php">
									<input type="hidden" name="id_input_hour" value="solo_hora_alistamiento">
									<input type="hidden" name="id_input_minutes" value="solo_minutos_alistamiento">
									<input type="hidden" name="id_input_hour_both" value="hora_alistamiento">
									<input type="hidden" name="id_input_minutes_both" value="minutos_alistamiento">

									<label class="input_obligatory">*</label>
									<label>Tiempo de Alistamiento </label><br>
									<select id="descanso_inactivo" name="descanso_inactivo" onchange="show_container_checked('descanso_inactivo','container_only_hour','container_only_minutes','container_both_times')">
										<option value="hora">Solo hora</option>
										<option value="minutos">Solo Minutos</option>
										<option value="ambos">Hora y minutos</option>
									</select><br><br>

									<div id="container_only_hour">
										<input type="number" class="form-control" name="solo_hora_alistamiento" id="solo_hora_alistamiento" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_alistamiento.value,this.form.path_from.value,this.form.id_input_hour.value)">
									</div>
									<div id="container_only_minutes" class="hide_container">
										<input type='number' class='form-control' id="solo_minutos_alistamiento" name='solo_minutos_alistamiento' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_alistamiento.value,this.form.path_from.value,this.form.id_input_minutes.value)">
									</div>
									<div id="container_both_times" class="row hide_container">
										<div class="col-md-6">
											<input type="number" class="form-control" id="hora_alistamiento" name="hora_alistamiento" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.hora_alistamiento.value,this.form.path_from.value,this.form.id_input_hour_both.value)">
										</div>
										<div class="col-md-6">
											<input type='number' class='form-control' id="minutos_alistamiento" name='minutos_alistamiento' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.minutos_alistamiento.value,this.form.path_from.value,this.form.id_input_minutes_both.value)">
										</div>
									</div>
								</center>
								<hr>
							</div>

							<!-- Campo Camarote -->
							<div class="col-md-12 hide_container" id="camarote">
								<center>
									<button type="button" id="ayuda_camarote" class="btn btn-xs btn-primary" id="ayuda_interrogatorio_camarote" data-toggle="tooltip" data-placement="top" title="Camarote son las horas que descansa cuando el destino supera las 8 horas de recorrido"><span class="fa fa-info"></span></button>
									<input type="hidden" name="desde" value="form_evaluacion">
									<input type="hidden" name="path_from" value="evaluacion.php">
									<input type="hidden" name="id_input_hour_c" value="solo_hora_camarote">
									<input type="hidden" name="id_input_minutes_c" value="solo_minutos_camarote">
									<input type="hidden" name="id_input_hour_both_c" value="hora_camarote">
									<input type="hidden" name="id_input_minutes_both_c" value="minutos_camarote">

									<label class="input_obligatory">*</label>
									<label>Camarote </label><br>
									<select name='tiempo_camarote' id="tiempo_camarote" onchange="show_container_checked('tiempo_camarote','container_only_hour_camarote','container_only_minutes_camarote','container_both_times_camarote')">
										<option value="hora">Solo hora</option>
										<option value="minutos">Solo Minutos</option>
										<option value="ambos">Hora y minutos</option>
									</select><br><br>

									<div id="container_only_hour_camarote">
										<input type="number" class="form-control" name="solo_hora_camarote" id="solo_hora_camarote" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_camarote.value,this.form.path_from.value,this.form.id_input_hour_c.value)">
									</div>
									<div id="container_only_minutes_camarote" class="hide_container">
										<input type='number' class='form-control' id="solo_minutos_camarote" name='solo_minutos_camarote' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_camarote.value,this.form.path_from.value,this.form.id_input_minutes_c.value)">
									</div>
									<div id="container_both_times_camarote" class="row hide_container">
										<div class="col-md-6">
											<input type="number" class="form-control" id="hora_camarote" name="hora_camarote" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.hora_camarote.value,this.form.path_from.value,this.form.id_input_hour_both_c.value)">
										</div>
										<div class="col-md-6">
											<input type='number' class='form-control' id="minutos_camarote" name='minutos_camarote' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.minutos_camarote.value,this.form.path_from.value,this.form.id_input_minutes_both_c.value)">
										</div>
									</div>
								</center>
								<hr>
							</div>

							<!-- Campo Conduciendo -->
							<div class="col-md-12">
								<center>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_interrogatorio_conduciendo" data-toggle="tooltip" data-placement="top" title="Horas conduciendo significa las horas que lleva detras del volante"><span class="fa fa-info"></span></button>
									<input type="hidden" name="desde" value="form_evaluacion">
									<input type="hidden" name="path_from" value="evaluacion.php">
									<input type="hidden" name="id_input_hour_conduciendo" value="solo_hora_conduciendo">
									<input type="hidden" name="id_input_minutos_conduciendo" value="solo_minutos_conduciendo">
									<input type="hidden" name="id_input_hour_both_conduciendo" value="hora_conduciendo">
									<input type="hidden" name="id_input_minutos_both_conduciendo" value="minutos_conduciendo">

									<label class="input_obligatory">*</label>
									<label>Conduciendo </label><br>
									<select name='conduciendo' id="conduciendo" onchange="show_container_checked('conduciendo','container_only_hour_conduciendo','container_only_minutes_conduciendo','container_both_times_conduciendo')">
										<option value="hora">Solo hora</option>
										<option value="minutos">Solo Minutos</option>
										<option value="ambos">Hora y minutos</option>
									</select><br><br>

									<div id="container_only_hour_conduciendo">
										<input type="number" class="form-control" name="solo_hora_conduciendo" id="solo_hora_conduciendo" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_conduciendo.value,this.form.path_from.value,this.form.id_input_hour_conduciendo.value)">
									</div>
									<div id="container_only_minutes_conduciendo" class="hide_container">
										<input type='number' class='form-control' id="solo_minutos_conduciendo" name='solo_minutos_conduciendo' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_conduciendo.value,this.form.path_from.value,this.form.id_input_minutos_conduciendo.value)">
									</div>
									<div id="container_both_times_conduciendo" class="row hide_container">
										<div class="col-md-6">
											<input type="number" class="form-control" id="hora_conduciendo" name="hora_conduciendo" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.hora_conduciendo.value,this.form.path_from.value,this.form.id_input_hour_both_conduciendo.value)">
										</div>
										<div class="col-md-6">
											<input type='number' class='form-control' id="minutos_conduciendo" name='minutos_conduciendo' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.minutos_conduciendo.value,this.form.path_from.value,this.form.id_input_minutos_both_conduciendo.value)">
										</div>
									</div>
								</center>
								<hr>
							</div>

							<div class=' col-md-12'>
								<div class="contenedor_otra_actividad">
									<input type="checkbox" name="actividad" id="otra_actividad_checkbox"  onclick="show_other_activity();">
									<label for="otra_actividad_checkbox"> Otra Actividad</label>
								</div><br>

								<div id="contenedor_o_actividad" class="hide_container">
									<center>
										<input type="hidden" name="desde" value="form_evaluacion">
										<input type="hidden" name="path_from" value="evaluacion.php">
										<input type="hidden" name="id_input_hour_o" value="solo_hora_o">
										<input type="hidden" name="id_input_minutos_o" value="solo_minutos_o">
										<input type="hidden" name="id_input_hour_both_o" value="hora_o">
										<input type="hidden" name="id_input_minutos_both_o" value="minutos_o">

										<label>Tiempo en otra Actividad </label><br>
										<select name='otra_actividad' id="otra_actividad" onchange="show_container_checked('otra_actividad','container_only_hour_o','container_only_minutes_o','container_both_times_o')">
											<option value="hora">Solo hora</option>
											<option value="minutos">Solo Minutos</option>
											<option value="ambos">Hora y minutos</option>
										</select><br><br>

										<div id="container_only_hour_o">
											<input type="number" class="form-control" name="solo_hora_o" id="solo_hora_o" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_o.value,this.form.path_from.value,this.form.id_input_hour_o.value)">
										</div>
										<div id="container_only_minutes_o" class="hide_container">
											<input type='number' class='form-control' id="solo_minutos_o" name='solo_minutos_o' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_o.value,this.form.path_from.value,this.form.id_input_minutos_o.value)">
										</div>
										<div id="container_both_times_o" class="row hide_container">
											<div class="col-md-6">
												<input type="number" class="form-control" id="hora_o" name="hora_o" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.hora_o.value,this.form.path_from.value,this.form.id_input_hour_both_o.value)">
											</div>
											<div class="col-md-6">
												<input type='number' class='form-control' id="minutos_o" name='minutos_o' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.minutos_o.value,this.form.path_from.value,this.form.id_input_minutos_both_o.value)">
											</div>
										</div>
									</center>

									<br><br>
									<div class=' col-md-12'>
										<label>Cuales Actividades?</label><br>
										<textarea name="cual_actividad" cols="90" rows="5" class="borde_textarea" id="other_activity" placeholder="Ingresar cuales fueron las otras Actividades" onkeypress='return onlyWords(event)' onchange="style_border_input('other_activity','verde')"></textarea>
									</div>
								</div>
							</div>

							<div class='col-md-12'>
								<hr>
							</div><br>

							<!-- Campo Tiempo de Sueño Efectivo -->
							<div class='col-md-12'>
								<center>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_tiempo_sueño" data-toggle="tooltip" data-placement="left" title="Tiempo de sueño consiste en las horas que a dormido en la casa"><span class="fa fa-info"></span></button>
									<input type="hidden" name="desde" value="form_evaluacion">
									<input type="hidden" name="path_from" value="evaluacion.php">
									<input type="hidden" name="id_input_hour_sueno" value="solo_hora_sueno_c">
									<input type="hidden" name="is_input_minutos_sueno" value="solo_minutos_sueno_c">
									<input type="hidden" name="id_input_hour_both_sueno" value="hora_sueno_c">
									<input type="hidden" name="id_input_minutos_sueno" value="minutos_sueno_c">

									<label class="input_obligatory">*</label> <label>Tiempo de Sueño Efectivo </label><br>
									<select name='sueno_efectivo' id="sueno_efectivo" onchange="show_container_checked('sueno_efectivo','container_only_hour_sueno','container_only_minutes_sueno','container_both_times_sueno')">
										<option value="hora">Solo hora</option>
										<option value="minutos">Solo Minutos</option>
										<option value="ambos">Hora y minutos</option>
									</select><br><br>

									<div id="container_only_hour_sueno">
										<input type="number" class="form-control" name="solo_hora_sueno_c" id="solo_hora_sueno_c" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_sueno_c.value,this.form.path_from.value,this.form.id_input_hour_sueno.value)">
									</div>
									<div id="container_only_minutes_sueno" class="hide_container">
										<input type='number' class='form-control' id="solo_minutos_sueno_c" name='solo_minutos_sueno_c' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_sueno_c.value,this.form.path_from.value,this.form.is_input_minutos_sueno.value)">
									</div>
									<div id="container_both_times_sueno" class="row hide_container">
										<div class="col-md-6">
											<input type="number" class="form-control" id="hora_sueno_c" name="hora_sueno_c" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.hora_sueno_c.value,this.form.path_from.value,this.form.id_input_hour_both_sueno.value)">
										</div>
										<div class="col-md-6">
											<input type='number' class='form-control' id="minutos_sueno_c" name='minutos_sueno_c' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.minutos_sueno_c.value,this.form.path_from.value,this.form.id_input_minutos_sueno.value)">
										</div>
									</div>
								</center>
								<hr>
							</div><br><br>

							<!-- Tiempo de Descanso Extralaboral -->
							<div class='col-md-12'>
								<center>
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_tiempo_descanso" data-toggle="tooltip" data-placement="left" title="Tiempo descanso es durante su jornada laboral Ejemplo = Alistamiento del vehiculo , almorzando ,comprando la tasa de uso "><span class="fa fa-info"></span></button>
									<input type="hidden" name="desde" value="form_evaluacion">
									<input type="hidden" name="path_from" value="evaluacion.php">
									<input type="hidden" name="id_input_hour_td" value="solo_hora_td">
									<input type="hidden" name="id_input_minutos_td" value="solo_minutos_td">
									<input type="hidden" name="id_input_hour_both_td" value="hora_td">
									<input type="hidden" name="id_input_minutos_both_td" value="minutos_td">

									<label class="input_obligatory">*</label> <label>Tiempo de Descanso Extralaboral </label><br>
									<select name='tiempo_descanso' id="tiempo_descanso" onchange="show_container_checked('tiempo_descanso','container_only_hour_td','container_only_minutes_td','container_both_times_td')">
										<option value="hora">Solo hora</option>
										<option value="minutos">Solo Minutos</option>
										<option value="ambos">Hora y minutos</option>
									</select><br><br>

									<div id="container_only_hour_td">
										<input type="number" class="form-control" name="solo_hora_td" id="solo_hora_td" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.solo_hora_td.value,this.form.path_from.value,this.form.id_input_hour_td.value)">
									</div>
									<div id="container_only_minutes_td" class="hide_container">
										<input type='number' class='form-control' id="solo_minutos_td" name='solo_minutos_td' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.solo_minutos_td.value,this.form.path_from.value,this.form.id_input_minutos_td.value)">
									</div>
									<div id="container_both_times_td" class="row hide_container">
										<div class="col-md-6">
											<input type="number" class="form-control" id="hora_td" name="hora_td" placeholder="Ingreso Hora" onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_hour_more_12(this.form.hora_td.value,this.form.path_from.value,this.form.id_input_hour_both_td.value)">
										</div>
										<div class="col-md-6">
											<input type='number' class='form-control' id="minutos_td" name='minutos_td' placeholder='Colocar Minutos' onkeypress="return justNumbers(event,this.form.desde.value);" onchange="stop_value_minutes_more_60(this.form.minutos_td.value,this.form.path_from.value,this.form.id_input_minutos_both_td.value)">
										</div>
									</div>
								</center>
							</div><br>

							<div class='col-md-12'>
								<hr>
							</div><br>

							<div class="col-md-12">
								<div id="check_born_copilot"></div>
							</div>

							<div class='col-md-6'>
								<label>Acompañante </label>
								<input type='text' name='copiloto' id="copiloto" class="form-control" placeholder="Nombre Copiloto" onkeypress="return onlyWords(event)" onchange="style_border_input('copiloto','verde'),check_born_copilot_required();">
							</div><br>

							<div class='col-md-6'>
								<label>Origen del Acompañante </label>
								<input type='text' name='origen_copiloto' id="origen_copiloto" class="form-control" onkeypress="return onlyWords(event)" onchange="style_border_input('origen_copiloto','verde'),check_born_copilot_required()" placeholder="Ciudad de Origen">
							</div><br>
						</center>
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
					<div class='panel-body text-center'>
						<button type="button" class="btn btn-md btn-primary" id="ayuda_sintoma" data-toggle="tooltip" data-placement="right" title="Los sintomas de fatiga es lo que el conductor dice que siente en el momento de hacer la evaluacion de fatiga"><span class="fa fa-info"></span></button>
						<h4>Seleccion Multiple</h4>
						<hr>
						<div class="style_check_sintomas">
							<?php
								include "library/checkbox dinamicos/checkbox_sintomas.php";
							?>
						</div>

						<hr>
						<label>El conductor Presenta Sensacion de Hormigueo en? </label><br>
						<select class="l_sintomas" name="hormigueo_opcion" required>
							<option value="Cara">Cara</option>
							<option value="Manos">Manos</option>
							<option value="Piernas">Piernas</option>
							<option value="all_options">Todas las anteriores</option>
							<option value="none_options" selected>Ninguna</option>
						</select>
						<hr>
						<div class="style_check_sintomas">
							<input type="checkbox" id="otro_sintoma" value="otro_sintoma" onclick="show_others_options('otro_sintoma','container_other_sintoma');">
							<label for="otro_sintoma">Otro Sintoma</label><br>
						</div>

						<div id="container_other_sintoma" class="hide_container">
							<textarea name="valor_otro_sintoma" id="valor_otro_sintoma" class="borde_textarea" placeholder="Colocar cuales sintomas" cols="90" rows="5" onkeypress='return onlyWords(event)' onchange="style_border_input('valor_otro_sintoma','verde')"></textarea>
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
						<input type='checkbox' id="otra_a_emocional" value="otra_a_emocional" onclick="show_others_options('otra_a_emocional','contenedor_alteracines_emocionales');">
						<label for="otra_a_emocional">Otra Alteracion Emocional</label>

						<div id="contenedor_alteracines_emocionales" class="hide_container">
							<textarea  name="otra_alteracion_emocional" id="otra_alteracion_emocional" class="borde_textarea" placeholder="Colocar cuales Alteraciones Emocionales" cols="90" rows="5" onkeypress='return onlyWords(event)' onchange="style_border_input('otra_alteracion_emocional','verde')"></textarea>
						</div>
					</div>
				</div>
			</div><br><br>

			<div class='text-center'>
				<button class='btn btn-success' type='submit' id="enviar_evaluacion" name="enviar_evaluacion"><span class="glyphicon glyphicon-ok"></span> </button>
				</center>
			</div>
		</div>

		<!--AQUI COLOCAMOS LA INFORMACION DEL CONDUCTOR AL LADO DERECHO-->
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

	<!--MODAL PARA MOSTRAR USUARIO Y CONTRASEÑA DEL CONDUCTOR-->
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