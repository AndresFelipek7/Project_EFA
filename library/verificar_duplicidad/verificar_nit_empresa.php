<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nit_empresa = $_REQUEST["valor_nit_empresa"];
	$separar_Nit = explode("-",$nit_empresa);

	if (count($separar_Nit) == 2 && $separar_Nit[1] != null) {
		$primera_parte_nit = strlen($separar_Nit[0]);
		$segunda_parte_nit = strlen($separar_Nit[1]);

		$verificar_si_son_numeros_primera_parte = is_numeric($separar_Nit[0]);
		$verificar_si_son_numeros_segunda_parte = is_numeric($separar_Nit[1]);

		if ($verificar_si_son_numeros_primera_parte == true && $verificar_si_son_numeros_segunda_parte == true) {
			if ($primera_parte_nit == 9 && $segunda_parte_nit == 1) {
				$consulta_Saber_si_Existe = "SELECT nit FROM reporte_empresa WHERE nit = '$nit_empresa'";
				$resultado = $conexion ->query($consulta_Saber_si_Existe);
				$count = $resultado->num_rows;

				if($count == 1) {
					message_mistake_validator("El NIT que ingreso de la Empresa ya se encuentra en la Base de datos.");
					enable_function_js("","nit","registrar_empresa");
				}else{
					disable_function_js("","nit","registrar_empresa");
				}
			}else {
				message_mistake_validator("El NIt ingresado no cumple con el formato , por favor verificar");
				enable_function_js("","nit","registrar_empresa");
			}
		}else {
			message_mistake_validator("El NIt ingresado no cumple con el formato porque presenta letras , por favor verificar");
			enable_function_js("","nit","registrar_empresa");
		}
	}else {
		message_mistake_validator("El NIt ingresado no cumple con el formato , por favor verificar");
		enable_function_js("","nit","registrar_empresa");
	}

	$conexion->close();
?>