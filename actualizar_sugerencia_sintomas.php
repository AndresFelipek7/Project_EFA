<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_sintoma = [$_POST['id_sugerencia'] , $_POST['reposo'] , $_POST['nombre_sintoma'] , $_POST["nombre_sintoma_before"],  $_POST['descripcion_sintoma']];

	$consulta_Traer_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_Valores_Actualizar_sintoma[3]'";
	$resultado_id_sintoma = $conexion ->query($consulta_Traer_id_sintoma);
	$count = $resultado_id_sintoma->num_rows;

	//Si es mayor a 1 significa que encontro lo que estabamos buscando
	if($count >= 1) {
		$row = mysqli_fetch_array($resultado_id_sintoma);
		$id_sintoma = $row["id_sintoma"];

		$actualizar_Sintoma_en_su_tabla = "UPDATE sintomas SET nombre_sintoma = '$traer_Valores_Actualizar_sintoma[2]' WHERE id_sintoma = '$id_sintoma'";
		$resultado_actualizar_Sintoma_en_su_tabla = $conexion -> query($actualizar_Sintoma_en_su_tabla);

		$actualizar_Sintoma_tabla_sugerencia = "UPDATE sugerencia SET id_orden = '$traer_Valores_Actualizar_sintoma[1]' , id_sintoma = '$id_sintoma' , descripcion_sugerencia = '$traer_Valores_Actualizar_sintoma[4]' WHERE id_sugerencia = '$traer_Valores_Actualizar_sintoma[0]'";
		$resultado_Sintoma_sugerencia = $conexion -> query($actualizar_Sintoma_tabla_sugerencia);

		if(!$resultado_actualizar_Sintoma_en_su_tabla){
			if($resultado_Sintoma_sugerencia) {
				echo "<script> alert_dinamic_edit('Sugerencia del Sintoma','sugerencia.php','de la'); </script>";
			}else{
				echo "<script> alert_dinamic_fail_edit('Sugerencia del Sintoma','sugerencia.php','de la'); </script>";
			}
		}else{
			echo "<script> alert_dinamic_fail_edit('Sugerencia del Sintoma','sugerencia.php','de la'); </script>";
		}
	}else{
		echo "<script> alert_dinamic_fail_edit('Sugerencia del Sintoma','sugerencia.php','de la'); </script>";
	}

	$conexion->close();
?>