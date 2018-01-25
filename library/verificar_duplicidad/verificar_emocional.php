<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre_emocional = $_REQUEST["valor_emocional"];

	$consulta_Saber_si_Existe = "SELECT nombre_emocional FROM reporte_emocional WHERE nombre_emocional = '$nombre_emocional'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		message_mistake_validator("El Nombre que ingreso de la Aletracion Emocional ya se encuentra en el sistema.");
		enable_function_js("", "nombre_emocional", "registro_emocional");
	}else{
		disable_function_js("", "nombre_emocional", "registro_emocional");
	}

	$conexion->close();
?>