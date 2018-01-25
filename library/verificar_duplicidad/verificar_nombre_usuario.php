<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$username = $_REQUEST["user_name"];
	$desde_form = $_REQUEST["desde_form"];

	switch ($desde_form) {
		case 'Evaluadores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_usuario_activo WHERE NombreUsuario = '$username'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if ($count == 1) {
				message_mistake_validator("El nombre de Usuario $username Ya esta en el sistema.");
				enable_function_js('','txtusuario');
			}else {
				$consulta_Saber_si_Existe = "SELECT * FROM reporte_usuario_inactivo WHERE NombreUsuario = '$username'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if ($count == 1) {
					message_mistake_disabled_validator("El nombre de Usuario $username Ya esta en el sistema inactivo.");
					enable_function_js('','txtusuario');
				}else {
					disable_function_js('','txtusuario');
				}
			}
			break;
		case 'Conductores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_conductor_activo WHERE usuario_fit = '$username'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if ($count == 1) {
				message_mistake_validator("El nombre de Usuario $username Ya esta en el sistema.");
				enable_function_js('','usuario_fit');
			}else {
				$consulta_Saber_si_Existe = "SELECT * FROM reporte_conductor_inactivo WHERE usuario_fit = '$username'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if ($count == 1) {
					message_mistake_disabled_validator("El nombre de Usuario $username Ya esta en el sistema inactivo.");
					enable_function_js('','usuario_fit');
				}else {
					disable_function_js('','usuario_fit');
				}
			}
			break;
		case 'Administradores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_administrador_activo WHERE NombreUsuario = '$username'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if ($count == 1) {
				message_mistake_validator("El nombre de Usuario $username Ya esta en el sistema.");
				enable_function_js('','txtusuario');
			}else {
				$consulta_Saber_si_Existe = "SELECT * FROM reporte_administrador_inactivo WHERE NombreUsuario = '$username'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if ($count == 1) {
					message_mistake_disabled_validator("El nombre de Usuario $username Ya esta en el sistema inactivo.");
					enable_function_js('','txtusuario');
				}else {
					disable_function_js('','txtusuario');
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