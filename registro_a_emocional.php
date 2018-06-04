<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valor_a_Emocional = [$_POST['nombre_emocional'] , $_POST['descripcion_emocional'], $_POST['valor_emocional']];
	$consulta_a_Emocional = "INSERT INTO alteraciones_emocionales (nombre_a_emocional , descripcion_a_emocional, valor_item) VALUES ('$traer_Valor_a_Emocional[0]' , '$traer_Valor_a_Emocional[1]', '$traer_Valor_a_Emocional[2]')";
	$resultado = $conexion -> query($consulta_a_Emocional);

	if($resultado){
		$consulta_Traer_id_Emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Valor_a_Emocional[0]'";
		$resultado_consulta = $conexion ->query($consulta_Traer_id_Emocional);
		$count = $resultado_consulta->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado_consulta);
			$_SESSION['idEmocional'] = $row['id_a_emocional'];
		}
		echo "<script>  alert_dinamic_create('Alteracion Emocional','pagina_sugerencia_emocional.php' , 'de la'); </script>";
	}else{
		echo "<script>  alert_dinamic_mistake('Alteracion Emocional','a_emocional.php' , 'de la'); </script>";
	}

	$conexion->close();
?>