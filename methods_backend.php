<?php
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
	 * Funcion para mostrar una alerta de informacion
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
	 * Funcion para obtener los minutos de las horas
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
?>