<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_a_Emocional = [$_POST['id_sugerencia'] , $_POST['reposo'] , $_POST['nombre_emocional'] , $_POST["nombre_emocional_before"],  $_POST['descripcion_emocional']];

	$consulta_Traer_id_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Valores_Actualizar_a_Emocional[3]'";
	$resultado_id_emocional = $conexion ->query($consulta_Traer_id_emocional);
	$count = $resultado_id_emocional->num_rows;

	if($count >= 1) {
		$row = mysqli_fetch_array($resultado_id_emocional);
		$id_emocional = $row["id_a_emocional"];

		//Hacemos una actualizacion en la tabla alteraciones emocionales si se presentae l caso
		$actualizar_Emocional_en_su_tabla = "UPDATE alteraciones_emocionales SET nombre_a_emocional = '$traer_Valores_Actualizar_a_Emocional[2]' WHERE id_a_emocional = '$id_emocional'";
		$resultado_actualizar_emocional_en_su_tabla = $conexion -> query($actualizar_Emocional_en_su_tabla);

		//Hacemos una actualizacion de la sugerencia si esta con informacon incorrecta
		$actualizar_a_Emocional_tabla_sugerencia = "UPDATE sugerencia SET id_orden = '$traer_Valores_Actualizar_a_Emocional[1]' , id_a_emocional = '$id_emocional' , descripcion_sugerencia = '$traer_Valores_Actualizar_a_Emocional[4]' WHERE id_sugerencia = '$traer_Valores_Actualizar_a_Emocional[0]'";
		$resultado_emocional_sugerencia = $conexion -> query($actualizar_a_Emocional_tabla_sugerencia);

		if($resultado_actualizar_emocional_en_su_tabla){
			if($resultado_emocional_sugerencia) {
				echo "<script> alert_dinamic_edit('Sugerencia de la Alteracion Emocional','sugerencia.php','de la'); </script>";
			}else{
				echo "<script> alert_dinamic_fail_edit('Sugerencia de la Alteracion Emocional','sugerencia.php','de la'); </script>";
			}
		}else{
			echo "<script> alert_dinamic_fail_edit('Sugerencia de la Alteracion Emocional','sugerencia.php','de la'); </script>";
		}
	}else{
		echo "<script> alert_dinamic_fail_edit('Sugerencia de la Alteracion Emocional','sugerencia.php','de la'); </script>";
	}

	//Cerramos la conexion a la BD
	$conexion->close();
?>