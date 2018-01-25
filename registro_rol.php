<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valor_Perfil = $_POST['rol'];

	$consulta_Perfil = "INSERT INTO roles (nombre_perfil) VALUES ('$traer_Valor_Perfil')";
	$resultado = $conexion -> query($consulta_Perfil);

	echo ($resultado) ? "<script> alert_dinamic_create('Rol','perfil.php'); </script>" : "<script> alert_dinamic_mistake('Rol','perfil.php'); </script>";

	$conexion->close();
?>