<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valor_Documento = $_POST['documento'];

	$consulta_T_Documento = "INSERT INTO tipo_documento (nombre_documento) VALUES ('$traer_Valor_Documento')";
	$resultado = $conexion -> query($consulta_T_Documento);

	echo ($resultado) ? "<script> alert_dinamic_create('Tipo Documento','t_documento.php'); </script>" : "<script> alert_dinamic_mistake('Tipo Documento','t_documento.php'); </script>";

	$conexion->close();
?>