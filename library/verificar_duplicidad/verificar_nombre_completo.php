<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre = $_REQUEST["valor_nombre"];
	$apellido = $_REQUEST["valor_apellido"];
	$desde = $_REQUEST["valor_menu"];

	switch ($desde) {
		case 'Evaluadores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_usuario_activo WHERE nombre = '$nombre' AND apellido = '$apellido'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if($count == 1) {
				message_mistake_validator("La persona que esta Registrando ya se encuentra en el sistema.");
				enable_function_js('yes','nombre_apellido');
			}else {
				#Zona de codigo para verificar en el lado de los evaluadores inactivos
					$consulta_Saber_si_Existe = "SELECT * FROM reporte_usuario_inactivo WHERE nombre = '$nombre' AND apellido = '$apellido'";
					$resultado = $conexion ->query($consulta_Saber_si_Existe);
					$count = $resultado->num_rows;

					if($count == 1) {
						message_mistake_disabled_validator("No se puede Registrar porque es un Evaluador Inactivo , es decir que ya esta registrado en el sistema.");
						enable_function_js('yes','nombre_apellido');
					}else{
						disable_function_js('yes','nombre_apellido');
					}
				#Terminacion
			}
			break;
		case 'Conductores':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_conductor_activo WHERE nombre = '$nombre' AND apellido = '$apellido'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado->num_rows;

			if($count == 1) {
				message_mistake_validator("La persona que esta Registrando ya se encuentra en el sistema.");
				enable_function_js('yes','nombre_apellido');
			}else{
				#Zona de codigo para verificar que no este el conductor en los inactivos
					$consulta_Saber_si_Existe = "SELECT * FROM reporte_conductor_inactivo WHERE nombre = '$nombre' AND apellido = '$apellido'";
					$resultado = $conexion ->query($consulta_Saber_si_Existe);
					$count = $resultado->num_rows;

					if($count == 1) {
						message_mistake_disabled_validator("No se puede Registrar porque es un Conductor Inactivo , es decir que ya esta registrado en el sistema.");
						enable_function_js('yes','nombre_apellido');
					}else {
						disable_function_js('yes','nombre_apellido');
					}
				#Terminacion
			}

			break;
		case 'Administrador':
			$consulta_Saber_si_Existe = "SELECT * FROM reporte_administrador_activo WHERE nombre = '$nombre' AND apellido = '$apellido'";
			$resultado = $conexion ->query($consulta_Saber_si_Existe) or die("Ha ocurrio un error");
			$count = $resultado->num_rows;

			if($count == 1) {
				message_mistake_validator("La persona que esta Registrando ya se encuentra en el sistema.");
				enable_function_js('yes','nombre_apellido');
			}else {
				//Zona de codigo para validar que no este el administrador en los inactivos
					$consulta_Saber_si_Existe = "SELECT * FROM reporte_administrador_inactivo WHERE nombre = '$nombre' AND apellido = '$apellido'";
					$resultado = $conexion ->query($consulta_Saber_si_Existe);
					$count = $resultado->num_rows;

					if($count == 1) {
						message_mistake_disabled_validator("No se puede Registrar porque es un Administrador Inactivo , es decir que ya esta registrado en el sistema.");
						enable_function_js('yes','nombre_apellido');
					}else {
						disable_function_js('yes','nombre_apellido');
					}
				//Terminacion
			}

			break;
		default:
			echo "<script>
				alert_dinamic_outside_place('$desde.php');
			</script>";
			break;
	}

	$conexion->close();
?>