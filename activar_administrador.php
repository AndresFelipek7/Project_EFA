<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$observaciones = $_POST["observaciones_activacion"];
	$id_dato = $_POST["id_dato"];

	$consulta_Activar_administrador  = "UPDATE datos_basicos SET estado = '1' , observaciones_activacion = '$observaciones' WHERE id_datos = '$id_dato'";
	$activar_administrador = $conexion ->query($consulta_Activar_administrador);

	echo ($activar_administrador) ? "<script> alert_dinamic_actived('Administrador','administrador.php'); </script>" : "<script> alert_dinamic_actived_error('Administrador','administrador.php'); </script>";

	$conexion->close();
?>