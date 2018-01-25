<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$nombre_neurologico = $_REQUEST["valor_neurologico"];

	$consulta_Saber_si_Existe = "SELECT nombre_neurologico FROM reporte_a_neurologico WHERE nombre_neurologico = '$nombre_neurologico'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		message_mistake_validator("El Nombre que ingreso de la Alteracion Neurologico ya se encuentra en el sistema");
		enable_function_js("", "nombre_neurologico", "registro_neurologico");
	}else{
		disable_function_js("", "nombre_neurologico", "registro_neurologico");
	}

	$conexion->close();
?>