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
	 * @param $contenMessage, $add_class_optional
	 * @return Un panel con el mensaje de error
	 */
	function message_mistake_validator($contentMessage , $add_class_optional = ""){
		echo "
			<div class='alert alert-danger $add_class_optional'>
				<span class='fa fa-minus-circle fa-2x'></span><br>
				<label> $contentMessage </label>
			</div>";
	}

	/**
	 * Funcion para avisar que la nueva persona que quiere registrar ya esta en el sistema inactivo
	 *
	 * @param $contentMessage
	 * @return un Mensaje
	 */
	function message_mistake_disabled_validator($contentMessage = "",$add_class_optional = "") {
		echo "
			<div class='alert alert-warning $add_class_optional'>
				<span class='fa fa-info'></span><br>
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
		echo "
			<div class='alert alert-$addClass container text-center'>
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
	 * Funcion para la consulta de el menu de Alteracion neurologico
	 *
	 * @param
	 * @return
	 */
	function query_neurologico($nameSearch,$conexion) {
		$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$nameSearch'";
		$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
		$count = $resultado ->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado);
			$id_a_neurologico = $row['id_a_neurologico'];
			$nombre_a_neurologico = $row['nombre_a_neurologico'];
			$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
			$info_neurologico = ["id_a_neurologico" => $id_a_neurologico, "nombre_a_neurologico" => $nombre_a_neurologico, "descripcion_a_neurologico" => $descripcion_a_neurologico];
			return $info_neurologico;
		}else {
			return "Ha ocurrido un erro inesperado.";
		}
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
			return $info_signo = ["id_signo" => $id_signo, "nombre_signo" => $nombre_Signo, "descripcion_signo" => $descripcion_Signo];
		}else {
			return "Ha ocurrido un erro inesperado.";
		}
	}
?>