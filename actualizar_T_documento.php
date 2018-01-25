<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_T_Documento = [$_POST['id_documento'],$_POST['documento']];

	$actualizar_T_Documento = "UPDATE tipo_documento SET nombre_documento = '$traer_Valores_Actualizar_T_Documento[1]' WHERE id_tipo_documento = '$traer_Valores_Actualizar_T_Documento[0]'";
	$Actualizar_Documento = $conexion -> query($actualizar_T_Documento);

	if(!$Actualizar_Documento){
		echo "<script> alert_dinamic_edit('Tipo Documento','t_documento.php'); </script>";
	}else{
		echo "<script> alert_dinamic_fail_edit('Tipo Documento','t_documento.php'); </script>";
	}

	//Cerramos la conexion a la BD
	$conexion->close();
?>