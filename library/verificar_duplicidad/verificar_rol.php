<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre_rol = $_REQUEST["valor_rol"];

	$consulta_Saber_si_Existe = "SELECT nombre_perfil FROM reporte_rol WHERE nombre_perfil = '$nombre_rol'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		message_mistake_validator("El Nombre que ingreso del rol ya se encuentra en la sistema.");
		enable_function_js("", "nombre_rol", "registrar_rol");
	}else{
		disable_function_js("", "nombre_rol", "registrar_rol");
	}

	$conexion->close();
?>