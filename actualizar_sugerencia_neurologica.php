<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_neurologico = [$_POST['id_sugerencia'] , $_POST['reposo'] , $_POST['nombre_neurologico'] , $_POST["nombre_neurologico_before"],  $_POST['descripcion_neurologico']];

	$consulta_Traer_id_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Valores_Actualizar_neurologico[3]'";
	$resultado_id_a_neurologico = $conexion ->query($consulta_Traer_id_neurologico);
	$count = $resultado_id_a_neurologico->num_rows;

	if($count >= 1) {
		$row = mysqli_fetch_array($resultado_id_a_neurologico);
		$id_a_neurologico = $row["id_a_neurologico"];

		$actualizar_Neurologico_en_su_tabla = "UPDATE alteraciones_neurologicas SET nombre_a_neurologico = '$traer_Valores_Actualizar_neurologico[2]' WHERE id_a_neurologico = '$id_a_neurologico'";
		$resultado_actualizar_Neurologico_en_su_tabla = $conexion -> query($actualizar_Neurologico_en_su_tabla);

		$actualizar_Neurologico_tabla_sugerencia = "UPDATE sugerencia SET id_orden = '$traer_Valores_Actualizar_neurologico[1]' , id_a_neurologico = '$id_a_neurologico' , descripcion_sugerencia = '$traer_Valores_Actualizar_neurologico[4]' WHERE id_sugerencia = '$traer_Valores_Actualizar_neurologico[0]'";
		$resultado_Neurologico_sugerencia = $conexion -> query($actualizar_Neurologico_tabla_sugerencia);

		if($resultado_actualizar_Neurologico_en_su_tabla){
			if($resultado_Neurologico_sugerencia) {
				echo "<script> alert_dinamic_edit('Sugerencia de la Alteracion Neurologica','sugerencia.php','de la'); </script>";
			}else{
				echo "<script> alert_dinamic_fail_edit('Sugerencia de la Alteracion Neurologica','sugerencia.php','de la'); </script>";
			}
		}else{
			echo "<script> alert_dinamic_fail_edit('Sugerencia de la Alteracion Neurologica','sugerencia.php','de la'); </script>";
		}
	}else{
		echo "<script> alert_dinamic_fail_edit('Sugerencia de la Alteracion Neurologica','sugerencia.php','de la'); </script>";
	}

	//Cerramos la conexion a la BD
	$conexion->close();
?>