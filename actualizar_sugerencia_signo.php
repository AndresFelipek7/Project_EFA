<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_signo = [$_POST['id_sugerencia'] , $_POST['reposo'] , $_POST['nombre_signo'] , $_POST["nombre_signo_before"],  $_POST['descripcion_signo']];

	$consulta_Traer_id_signo = "SELECT id_signo FROM signos_fatiga WHERE nombre_signo = '$traer_Valores_Actualizar_signo[3]'";
	$resultado_id_signo = $conexion ->query($consulta_Traer_id_signo);
	$count = $resultado_id_signo->num_rows;

	//Sies mayor a 1 significa que encontro lo que estabamos buscando
	if($count >= 1) {
		$row = mysqli_fetch_array($resultado_id_signo);
		$id_signo = $row["id_signo"];

		$actualizar_Signo_en_su_tabla = "UPDATE signos_fatiga SET nombre_signo = '$traer_Valores_Actualizar_signo[2]' WHERE id_signo = '$id_signo'";
		$resultado_actualizar_Signo_en_su_tabla = $conexion -> query($actualizar_Signo_en_su_tabla);

		$actualizar_Signo_tabla_sugerencia = "UPDATE sugerencia SET id_orden = '$traer_Valores_Actualizar_signo[1]' , id_signo = '$id_signo' , descripcion_sugerencia = '$traer_Valores_Actualizar_signo[4]' WHERE id_sugerencia = '$traer_Valores_Actualizar_signo[0]'";
		$resultado_Signo_sugerencia = $conexion -> query($actualizar_Signo_tabla_sugerencia);

		if($resultado_actualizar_Signo_en_su_tabla){
			if($resultado_Signo_sugerencia) {
				echo "<script> alert_dinamic_edit('Sugerencia del Signo','sugerencia.php','de la'); </script>";
			}else{
				echo "<script> alert_dinamic_fail_edit('Sugerencia del Signo','sugerencia.php','de la'); </script>";
			}
		}else{
			echo "<script> alert_dinamic_fail_edit('Sugerencia del Signo','sugerencia.php','de la'); </script>";
		}
	}else{
		echo "<script> alert_dinamic_fail_edit('Sugerencia del Signo','sugerencia.php','de la'); </script>";
	}

	$conexion->close();
?>