<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_a_Neurologico = [$_POST['id_neurologico'],$_POST['nombre_neurologico'],$_POST['descripcion_neurologico']];

	$actualizar_a_Neurologico = "UPDATE alteraciones_neurologicas SET nombre_a_neurologico = '$traer_Valores_Actualizar_a_Neurologico[1]' , descripcion_a_neurologico = '$traer_Valores_Actualizar_a_Neurologico[2]' WHERE id_a_neurologico = '$traer_Valores_Actualizar_a_Neurologico[0]'";
	$resultado = $conexion -> query($actualizar_a_Neurologico);

	if($resultado){
		echo "<script> alert_dinamic_edit('Alteracion Neurologica','a_neurologico.php','de la'); </script>";
	}else{
		echo "<script> alert_dinamic_fail_edit('Alteracion Neurologica','a_neurologico.php','de la'); </script>";
	}

	$conexion->close();
?>