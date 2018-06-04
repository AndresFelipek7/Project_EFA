<?php
	include 'library/conec.php';
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_a_Neurologico = [$_POST['id_neurologico'],$_POST['nombre_neurologico'],$_POST['descripcion_neurologico'], $_POST['valor_neurologico']];

	$actualizar_a_Neurologico = "UPDATE alteraciones_neurologicas SET nombre_a_neurologico = '$traer_Valores_Actualizar_a_Neurologico[1]' , descripcion_a_neurologico = '$traer_Valores_Actualizar_a_Neurologico[2]', valor_item = '$traer_Valores_Actualizar_a_Neurologico[3]' WHERE id_a_neurologico = '$traer_Valores_Actualizar_a_Neurologico[0]'";
	$resultado = $conexion -> query($actualizar_a_Neurologico);

	echo ($resultado) ? "<script> alert_dinamic_edit('Alteracion Neurologica','a_neurologico.php','de la'); </script>" : "<script> alert_dinamic_fail_edit('Alteracion Neurologica','a_neurologico.php','de la'); </script>";

	$conexion->close();
?>