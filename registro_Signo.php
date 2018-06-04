<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valor_signo = [$_POST['nombre_signo'] , $_POST['descripcion_signo'], $_POST['valor_signo']];

	$consulta_Signo = "INSERT INTO signos_fatiga (nombre_signo , descripcion_signo, valor_item) VALUES ('$traer_Valor_signo[0]' , '$traer_Valor_signo[1]', '$traer_Valor_signo[2]')";
	$resultado = $conexion ->query($consulta_Signo);

	if($resultado){
		$consulta_Traer_id_Signo = "SELECT id_signo FROM signos_fatiga WHERE nombre_signo = '$traer_Valor_signo[0]'";
		$resultado_consulta = $conexion ->query($consulta_Traer_id_Signo);
		$count = $resultado_consulta->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado_consulta);
			$_SESSION['idSigno'] = $row['id_signo'];
		}
		echo "<script>  alert_dinamic_create('Signo de Fatiga','pagina_sugerencia_signo.php'); </script>";
	}else{
		echo "<script>  alert_dinamic_mistake('Signo de Fatiga','signos.php'); </script>";
	}

	$conexion->close();
?>