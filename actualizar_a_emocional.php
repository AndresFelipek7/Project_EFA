<?php
	include 'library/conec.php';
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_a_Emocional = [$_POST['id_emocional'],$_POST['nombre_emocional'],$_POST['descripcion_emocional'], $_POST['valor_emocional']];

	$actualizar_a_Emocional = "UPDATE alteraciones_emocionales SET nombre_a_emocional = '$traer_Valores_Actualizar_a_Emocional[1]' , descripcion_a_emocional = '$traer_Valores_Actualizar_a_Emocional[2]', valor_item = '$traer_Valores_Actualizar_a_Emocional[3]' WHERE id_a_emocional = '$traer_Valores_Actualizar_a_Emocional[0]'";
	$resultado = $conexion -> query($actualizar_a_Emocional);

	echo ($resultado) ? "<script> alert_dinamic_edit('Alteracion Emocional','a_emocional.php','de la'); </script>" : "<script> alert_dinamic_fail_edit('Alteracion Emocional','a_emocional.php','de la'); </script>";

	$conexion->close();
?>