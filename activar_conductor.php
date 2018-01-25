<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$observaciones = $_POST["observaciones_activacion"];
	$id_dato = $_POST["id_dato"];

	$consulta_Activar_conductor  = "UPDATE datos_basicos SET estado = '1' , observaciones_activacion = '$observaciones' WHERE id_datos = '$id_dato'";
	$activar_conductor = $conexion ->query($consulta_Activar_conductor);

	echo ($activar_conductor) ? "<script> alert_dinamic_actived('Conductor','Conductores.php'); </script>" : "<script> alert_dinamic_actived_error('Conductor','Conductores.php'); </script>";

	$conexion->close();
?>