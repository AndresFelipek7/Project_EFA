<?php
	include "library/conec.php";

	/**
	 * Funcion para habilitar las funciones de js
	 *
	 * @param $add_boton_clean,$id_inputs,$option_menu
	 * @return Habilita las funciones de js
	 */
	function enable_function_js($add_boton_clean = "",$id_input = "",$option_menu = "") {
		if ($add_boton_clean == "yes") {
			echo "<script>
					show_button_clear_inputs();
				</script>";
		}else if($option_menu != "") {
			echo "<script>
					document.getElementById('$option_menu').disabled=true;
					style_border_input('$id_input' , 'rojo');
				</script>";
		}
		echo "<script>
			flag_validacion_info_register = 1;

			style_border_input('$id_input' , 'rojo');

			document.getElementById('boton_registrar').disabled=true;
			document.getElementById('habeas').disabled=true;
			document.getElementById('contenedor_habeas_data').style.display='none';
			document.f_registro.habeas.checked=0 ;

			$('#label_habeas').text('Acepto las condiciones de uso');
		</script>";
	}

	/**
	 * Funcion para deshabilitar las funciones de js
	 *
	 * @param $add_boton_clean,$id_input,$option_menu
	 * @return Deshabilita las funciones de js
	 */
	function disable_function_js($add_boton_clean = "",$id_input = "",$option_menu = ""){
		if ($add_boton_clean == "yes") {
			echo "<script>
				hide_button_clear_inputs();
			</script>";
		}else if($option_menu != "") {
			echo "<script>
					document.getElementById('$option_menu').disabled=false;
					style_border_input('$id_input' , 'verde');
				</script>";
		}

		echo "<script>
			flag_validacion_info_register = 0;

			style_border_input('$id_input' , 'verde');

			document.getElementById('boton_registrar').disabled=true;
			document.getElementById('habeas').disabled=false;
			document.getElementById('contenedor_habeas_data').style.display='none';
			document.f_registro.habeas.checked=0 ;

			$('#label_habeas').text('Acepto las condiciones de uso');
		</script>";
	}

	/**
	 * Funcion para avisar cuando hay usuarios inactivos
	 *
	 * @param $nameModule,$type_rol
	 * @return devuelve contenido
	 */
	function only_empty_user_disabled($nameModule = "",$type_rol = "") {
		if ($type_rol == "Admin") {
			echo "<script> document.getElementById('all_download_actived_log').style.display = 'none'; </script>";
		}
		echo "<center><div class='panel panel-primary'>
				<div class='panel-heading'>
					<h3 class='panel-title'>Aviso!</h3>
				</div>
				<div class='panel-body'>
					<h4>En este momento no hay $nameModule Inactivos en el sistema. </h4>
				</div>
			</div></center>";
	}

	/**
	 * Funcion para mensajes de error
	 *
	 * @param $contenMessage
	 * @return Un panel con el mensaje de error
	 */
	function message_compare_sleep_fit($addClass,$contentMessage){
		echo "<div class='alert alert-$addClass'>
				<span class='fa fa-bell fa-2x'></span><br>
				<label> $contentMessage </label>
			</div>";
	}

	/**
	 * Funcion para mostrar una alerta de informacion despues de hacer la evaluacion de fatiga
	 *
	 * @param $contentMessage,$typeError
	 * @return una alerta de informacion
	 */
	function alert_dinamic_time_doing_test($contentMessage = "",$typeError = "") {
		echo "<script>
			swal({
				title: 'Aviso!',
				text: '$contentMessage',
				type: '$typeError'
			});
		</script>";
	}

	/**
	 * Funcion para obtener los minutos de las horas de tiempo sueño
	 *
	 * @param $minutes
	 * @return los minutos de la hora que le pasamos
	 */
	function getMinutes($minutes) {
		return (($minutes*60)/1);
	}

	/**
	 * Funcion para cambiar el signo de un numero
	 *
	 * @param $numeric
	 * @return el numero positivo
	 */
	function change_negative_numeric($numeric) {
		return $numeric * (-1);
	}

	/**
	 * Funcion para mostrar el panel de la informacion con respecto a las pulsaciones
	 *
	 * @param $addClass,$addIcon,$contentMessage
	 * @return un panel
	 */
	function panel_info_pulsaciones($addClass,$addIcon,$contentMessage) {
		echo "<div class='alert alert-$addClass'>
				<span class='fa fa-$addIcon fa-2x'></span><br>
				<label> $contentMessage </label>
			</div>";
	}

	/**
	 * Funcion para mostrar una alerta de Boostrap en el reporte completo de evaluacion de fatiga rol admin
	 *
	 * @param $addClass, $contentMessage
	 * @return un contenedor de alerta
	 */
	function container_alert($addClass,$contentMessage) {
		echo "<div class='alert alert-$addClass col-md-6'>
				$contentMessage
			</div>";
	}

	/**
	 * Funcion para crear un modal Dinamico
	 *
	 * @param $addClass,$nameItem,$contentMessage
	 * @return Crea un modal en pantalla
	 */
	function panel_info_for_modal($addClass,$nameItem,$contentMessage) {
		echo "<div class='panel $addClass text-center'>
				<div class='panel-heading'><strong>$nameItem</strong></div>
				<div class='panel-body'>
					<div>
						$contentMessage.'<br>'
					</div>
				</div>
			</div>";
	}

	/**
	 * Funcion para mostrar un modal de Boostrap en pantalla
	 *
	 * @param $idModal,$titleModal,$content
	 * @return un modal
	 */
	function show_modal($idModal,$titleModal,$arrayContent) {
		echo "<div class='modal fade' id='$idModal'>
				<div class='modal-dialog modal-lg'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<h4 class='modal-title'> <span class='glyphicon glyphicon-eye-open'></span> $titleModal</h4>
						</div>
						<div class='modal-body text-center'>
							$arrayContent
						</div>
						<div class='modal-footer form-inline'>
							<button type='button' class='btn btn-danger' data-dismiss='modal'><span class='glyphicon glyphicon-remove'></span> </button>
						</div>
					</div>
				</div>
			</div>";
	}

	/**
	 * Funcion para hacer la consulta en el modulo de Signos
	 *
	 * @param $nameSearch, $conexion
	 * @return Un arreglo con la informacion pedida
	 */
	function query_signo($nameSearch,$conexion) {
		$consulta_Buscar_signo = "SELECT * FROM signos_fatiga WHERE id_signo = '$nameSearch'";
		$resultado = $conexion -> query($consulta_Buscar_signo);
		$count = $resultado ->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado);
			$id_signo = $row['id_signo'];
			$nombre_Signo = $row['nombre_signo'];
			$descripcion_Signo = $row['descripcion_signo'];
			$valor_item = $row['valor_item'];
			return $info_signo = ["id_signo" => $id_signo, "nombre_signo" => $nombre_Signo, "descripcion_signo" => $descripcion_Signo, "valor_item" => $valor_item];
		}else {
			return "Ha ocurrido un erro inesperado.";
		}
	}

	/**
	 * Funcion para hacer la consulta del modulo Emocional
	 *
	 * @param $nameSearch, $conexion
	 * @return Un arreglo con la info de la Bd
	 */
	function query_emocional($nameSearch,$conexion) {
		$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = '$nameSearch'";
		$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
		$count = $resultado ->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado);
			$id_a_emocional = $row['id_a_emocional'];
			$nombre_a_emocional= $row['nombre_a_emocional'];
			$descripcion_a_emocional = $row['descripcion_a_emocional'];
			$valor_item = $row['valor_item'];
			$info_emocional = ["id_emocional" => $id_a_emocional, "nombre_emocional" => $nombre_a_emocional, "descripcion_emocional" => $descripcion_a_emocional, "valor_item" => $valor_item];
			return $info_emocional;
		}
	}

	/**
	 * Funcion para hacer la consulta del modulo de Sintomas
	 *
	 * @param $nameSearch, $conexion
	 * @return Un objeto con la informacion
	 */
	function query_sintomas($nameSearch,$conexion) {
		$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = '$nameSearch'";
		$resultado = $conexion -> query($consulta_Buscar_sintoma);
		$count = $resultado ->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado);
			$id_sintoma = $row['id_sintoma'];
			$nombre_Sintoma = $row['nombre_sintoma'];
			$descripcion_Sintoma = $row['descripcion_sintoma'];
			$valor_item = $row['valor_item'];
			$info_sintomas = ["id_sintoma" => $id_sintoma, "nombre_sintoma" => $nombre_Sintoma, "descripcion_sintoma" => $descripcion_Sintoma, "valor_item" => $valor_item];
			return $info_sintomas;
		}
	}

	/**
	 * Funcion de las sugerencia de todo los modulos
	 *
	 * @param $nameColum,$nameSearch,$conexion
	 * @return Una consulta
	 */
	function query_sugerencia($nameColum,$nameSearch,$conexion) {
		$consulta_Sugerencia = "SELECT * FROM sugerencia WHERE $nameColum = '$nameSearch'";
		$resultado = $conexion -> query($consulta_Sugerencia);
		$count_Sugerencia = $resultado ->num_rows;

		if($count_Sugerencia >= 1) {
			$row = mysqli_fetch_array($resultado);
			$id_sugerencia = $row['id_sugerencia'];
			$id_orden = $row['id_orden'];
			$sugerencia = $row['descripcion_sugerencia'];
			$info_sugerencia = ["id_sugerencia" => $id_sugerencia, "id_orden" => $id_orden, "descripcion_sugerencia" => $sugerencia];
			return $info_sugerencia;
		}
	}

	/**
	 * funcion para mostrar el tiempo del descanso del conductor
	 *
	 * @param $addClass,$titleAlert,$content
	 * @return Un contenedor tipo alert de Boosptrap 3
	 */
	function alert_sleep_driver($addClass,$titleAlert,$content) {
		echo "<div class='alert alert-$addClass'>
				<strong>$titleAlert</strong><br>$content
			</div>";
	}

	/**
	 * Funcin para mostrar el contenedor de descanso del conductor dependiendo de las horas conducidas
	 *
	 * @param $timeSleep
	 * @return Container
	 */
	function container_sleep_driver_all($timeSleep) {
		echo "<div class='container style-container-sleep-driver'>
				<div class='row col-md-4'>
					<div class='alert alert-info'>
						<strong>Antes del viaje</strong><br>
						$timeSleep
					</div>
				</div>
				<div class='row col-md-4'>
					<div class='alert alert-warning'>
						<strong>Durante el Viaje</strong><br>
						$timeSleep
					</div>
				</div>
				<div class='row col-md-4'>
					<div class='alert alert-danger'>
						<strong>Despues del viaje</strong><br>
						$timeSleep
					</div>
				</div>
		</div>";
	}

	/**
	 * Funcion para las alertas de las sugerencias de los modulos de las dos alteraciones, sintomas y pilares
	 *
	 * @param $addClass, $subtitleAlert, $contentImprove
	 * @return un container alert
	 */
	function alert_improve_driver($addClass, $subtitleAlert, $contentImprove) {
		echo "<div class='alert alert-$addClass'>
				<button class='close' data-dismiss='alert'><span>&times;</span></button>
				<br>$subtitleAlert
				$contentImprove
			</div>";
	}

	/**
	 * Alerta que nos dice el nivel de fatiga del conductor en pantalla
	 *
	 * @param $contenMessage, $levelTired, $typeError
	 * @return una alerta
	 */
	function show_tired_driver_level($levelTired,$contentMessage,$typeError) {
		echo "<script>
			swal({
				title: 'Nivel de Fatiga $levelTired!',
				text: '$contentMessage',
				type: '$typeError'
			});
		</script>";
	}

	/**
	 * Funcion para mostrar un panel en el reportde de fatiga del evaluador
	 *
	 * @param $addTypePanel,$levelTired,$content,$pathPhoto
	 * @return un panel con dos columnas
	 */
	function panel_level_tired_driver($addTypePanel,$levelTired,$content,$pathPhoto) {
		echo "<div class='container-fluid' style='margin-top:2%;'>
			<div class='row'>
				<div class='col-md-6'>
					<div class='panel panel-$addTypePanel'>
						<div class='panel-heading'><h1>Nivel de Fatiga $levelTired</h1></div>
						<div class='panel-body'>$content</div>
					</div>
				</div>
				<div class='col-md-6'>
					$pathPhoto
				</div>
			</div>
		</div>";
	}

	/**
	 * Funcion para mostrar una redireccion en una alerta(Parcial)
	 *
	 * @param $content
	 * @return Una alerta
	 */
	function alert_time_report($content) {
		echo "<script>
				alert('$content');
				window.location = 'test.php';
			</script>";
	}

	/**
	 * Funcion para mostrar errores en el lado del Frontend
	 *
	 * @param $content
	 * @return Un contenedor tipo alert de Boosptrap 3
	 */
	function message_mistake_validator($content) {
		echo "<div class='alert alert-danger'>
				<strong>Aviso!</strong><br>$content
			</div>";
	}
?>