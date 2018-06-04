<?php
	include 'library/conec.php';
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_sintoma = [$_POST['id_sintoma'],$_POST['sintoma'],$_POST['descripcion_sintoma'],$_POST['valor_sintoma']];

	$actualizar_Sintoma = "UPDATE sintomas SET nombre_sintoma = '$traer_Valores_Actualizar_sintoma[1]' , descripcion_sintoma = '$traer_Valores_Actualizar_sintoma[2]', valor_item = '$traer_Valores_Actualizar_sintoma[3]' WHERE id_sintoma = '$traer_Valores_Actualizar_sintoma[0]'";
	$resultado = $conexion -> query($actualizar_Sintoma);

	echo ($resultado) ? "<script> alert_dinamic_edit('Sintoma','sintomas.php'); </script>" : "<script> alert_dinamic_fail_edit('Sintoma','sintomas.php'); </script>";

	$conexion->close();
?>