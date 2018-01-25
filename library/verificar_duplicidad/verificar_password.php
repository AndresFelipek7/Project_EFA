<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$password = $_REQUEST["pass"];
	$desde_form = $_REQUEST["desde_form"];

	switch ($desde_form) {
		case 'Evaluadores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_usuario_activo WHERE password = '$password'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if ($count == 1) {
				message_mistake_validator("La contraseña no se puede utilizar, por favor colocar otra.");
				enable_function_js('','txtpass');
			}else {
				$consulta_Saber_si_Existe = "SELECT * FROM reporte_usuario_inactivo WHERE password = '$password'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if ($count == 1) {
					message_mistake_validator("La contraseña no se puede utilizar, por favor colocar otra.");
					enable_function_js('','txtpass');
				}else {
					disable_function_js('','txtpass');
				}
			}
			break;
		case 'Conductores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_conductor_activo WHERE pass_fit = '$password'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if ($count == 1) {
				message_mistake_validator("La contraseña no se puede utilizar, por favor colocar otra.");
				enable_function_js('','txtpass');
			}else {
				$consulta_Saber_si_Existe = "SELECT * FROM reporte_conductor_inactivo WHERE pass_fit = '$password'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if ($count == 1) {
					message_mistake_validator("La contraseña no se puede utilizar, por favor colocar otra.");
					enable_function_js('','txtpass');
				}else {
					disable_function_js('','txtpass');
				}
			}
			break;
		case 'Administradores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_administrador_activo WHERE password = '$password'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if ($count == 1) {
				message_mistake_validator("La contraseña no se puede utilizar, por favor colocar otra.");
				enable_function_js('','txtpass');
			}else {
				$consulta_Saber_si_Existe = "SELECT * FROM reporte_administrador_inactivo WHERE password = '$password'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if ($count == 1) {
					message_mistake_validator("La contraseña no se puede utilizar, por favor colocar otra.");
					enable_function_js('','txtpass');
				}else {
					disable_function_js('','txtpass');
				}
			}
			break;
		default:
			if ($desde_form == "Evaluadores" || $desde_form == "Administradores" || $desde_form == "Conductores") {
				echo "<script>
					alert_dinamic_outside_place('main_admin.php');
				</script>";
			}else {
				echo "<script>
					alert_dinamic_outside_place('test.php');
				</script>";
			}

			break;
	}

	$conexion->close();
?>