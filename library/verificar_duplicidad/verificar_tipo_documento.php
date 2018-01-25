<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre_Tipo_documento = $_REQUEST["valor_t_documento"];

	$consulta_Saber_si_Existe = "SELECT nombre_documento FROM reporte_t_documento WHERE nombre_documento = '$nombre_Tipo_documento'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		message_mistake_validator("El Nombre que ingreso del Tipo Documento ya se encuentra en el sistema.");
		enable_function_js("", "nombre_t_documento", "registrar_tipo_documento");
	}else{
		disable_function_js("", "nombre_t_documento", "registrar_tipo_documento");
	}

	$conexion->close();
?>