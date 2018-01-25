<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$placa = $_REQUEST["valor_placa"];

	$consulta_Saber_si_Existe = "SELECT placa FROM reporte_vehiculo WHERE placa = '$placa'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if (strlen($placa) == 6) {
		if (!is_numeric($placa[0]) && !is_numeric($placa[1]) && !is_numeric($placa[2])) {
			if (is_numeric($placa[3]) && is_numeric($placa[4]) && is_numeric($placa[5])) {
				if($count == 1) {
					message_mistake_validator("La placa del vehiculo ya esta en el Sistema.");
					enable_function_js("", "placa", "registrar_vehiculo");
				}else{
					disable_function_js("", "placa", "registrar_vehiculo");
				}
			}else {
				message_mistake_validator("El formato ingresa de la placa no es correcto. Es necesario que las tres primeras sean letras y luego numeros");
				enable_function_js("", "placa", "registrar_vehiculo");
			}
		}else {
			message_mistake_validator("El formato ingresa de la placa no es correcto. Es necesario que las tres primeras sean letras y luego numeros");
			enable_function_js("", "placa", "registrar_vehiculo");
		}
	}else {
		message_mistake_validator("El Longitud ingresa de la placa no es correcto");
		enable_function_js("", "placa", "registrar_vehiculo");
	}

	$conexion->close();
?>