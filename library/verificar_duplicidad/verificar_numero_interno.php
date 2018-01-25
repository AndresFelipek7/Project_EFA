<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$numero_interno = $_REQUEST["valor_numero"];
	$saber_cantidad_digitos = strlen($numero_interno);

	$consulta_Saber_si_Existe = "SELECT numero_interno FROM reporte_vehiculo WHERE numero_interno = '$numero_interno'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if ($count == 1) {
		message_mistake_validator("El numero interno $numero_interno ya esta Registrado , por favor verificar.");
		enable_function_js("", "numero_interno", "registrar_vehiculo");
	}else if ($saber_cantidad_digitos != 4){
		message_mistake_validator("La cantidad de digitos ingresada es incorrecta , Debe de ser de 4 digitos");
		enable_function_js("", "numero_interno", "registrar_vehiculo");
	}else {
		disable_function_js("", "numero_interno", "registrar_vehiculo");
	}

	$conexion->close();
?>