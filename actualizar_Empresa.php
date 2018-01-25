<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Empresa = [$_POST['id_empresa'],$_POST['ruta'],$_POST['nit'],$_POST['nombre_empresa']];

	$actualizacion_Empresa = "UPDATE empresa SET id_ruta = '$traer_Valores_Actualizar_Empresa[1]' , nit = '$traer_Valores_Actualizar_Empresa[2]' , nombre_empresa = '$traer_Valores_Actualizar_Empresa[3]' WHERE id_empresa = '$traer_Valores_Actualizar_Empresa[0]'";
	$Actualizacion = $conexion -> query($actualizacion_Empresa);

	if($Actualizacion) {
		echo "<script> alert_dinamic_edit('Empresa','empresas.php','de la'); </script>";
	}else{
		echo "<script> alert_dinamic_fail_edit('Empresa','empresas.php','de la'); </script>";
	}

	$conexion->close();
?>