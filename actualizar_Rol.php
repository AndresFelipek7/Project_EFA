<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Rol = [$_POST['id_rol'],$_POST['nombre_rol']];

	$actualizar_Perfil = "UPDATE roles SET nombre_perfil = '$traer_Valores_Actualizar_Rol[1]' WHERE id_rol = '$traer_Valores_Actualizar_Rol[0]'";
	$Actualizar_Rol = $conexion -> query($actualizar_Perfil);

	if($Actualizar_Rol){
		echo "<script> alert_dinamic_edit('Rol','perfil.php'); </script>";
	}else{
		echo "<script> alert_dinamic_fail_edit('Rol','perfil.php'); </script>";
	}

	$conexion->close();
?>