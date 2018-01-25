<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_signo = [$_POST['id_signo'],$_POST['nombre_signo'],$_POST['descripcion_signo']];

	$actualizar_Signo = "UPDATE signos_fatiga SET nombre_signo = '$traer_Valores_Actualizar_signo[1]' , descripcion_signo = '$traer_Valores_Actualizar_signo[2]' WHERE id_signo = '$traer_Valores_Actualizar_signo[0]'";
	$resultado = $conexion -> query($actualizar_Signo);

	if($resultado){
		echo "<script> alert_dinamic_edit('Signo','signos.php'); </script>";
	}else{
		echo "<script> alert_dinamic_fail_edit('Signo','signos.php'); </script>";
	}

	$conexion->close();


?>