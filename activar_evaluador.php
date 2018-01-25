<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$observaciones = $_POST["observaciones_activacion"];
	$id_dato = $_POST["id_dato"];

	$consulta_Activar_evaluador  = "UPDATE datos_basicos SET estado = '1' , observaciones_activacion = '$observaciones' WHERE id_datos = '$id_dato'";
	$activar_evaluador = $conexion ->query($consulta_Activar_evaluador);

	echo ($activar_evaluador) ? "<script> alert_dinamic_actived('Evaluador','Evaluadores.php'); </script>" : "<script> alert_dinamic_actived_error('Evaluador','Evaluadores.php'); </script>";

	$conexion->close();
?>