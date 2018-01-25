<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre_signo = $_REQUEST["valor_signo"];

	$consulta_Saber_si_Existe = "SELECT nombre_signo FROM reporte_signos WHERE nombre_signo = '$nombre_signo'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		message_mistake_validator("El Nombre que ingreso del signo ya se encuentra en el sistema.");
		enable_function_js("", "nombre_signo", "registro_signo");
	}else{
		disable_function_js("", "nombre_signo", "registro_signo");
	}

	$conexion->close();
?>