<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre_sintoma = $_REQUEST["valor_sintoma"];

	$consulta_Saber_si_Existe = "SELECT nombre_sintoma FROM reporte_sintomas WHERE nombre_sintoma = '$nombre_sintoma'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		message_mistake_validator("El Nombre que ingreso del sintoma ya se encuentra en la sistema.");
		enable_function_js("", "nombre_sintoma", "registrar_sintoma");
	}else{
		disable_function_js("", "nombre_sintoma", "registrar_sintoma");
	}

	$conexion->close();
?>