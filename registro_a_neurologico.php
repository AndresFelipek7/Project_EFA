<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valor_a_Neurologico = [$_POST['nombre_neurologico'] , $_POST['descripcion_neurologico'], $_POST['valor_neurologico']];

	$consulta_a_Neurologico = "INSERT INTO alteraciones_neurologicas (nombre_a_neurologico , descripcion_a_neurologico, valor_item) VALUES ('$traer_Valor_a_Neurologico[0]' , '$traer_Valor_a_Neurologico[1]', '$traer_Valor_a_Neurologico[2]')";
	$resultado = $conexion -> query($consulta_a_Neurologico);

	if($resultado){
		$consulta_Traer_id_Neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Valor_a_Neurologico[0]'";
		$resultado_consulta = $conexion ->query($consulta_Traer_id_Neurologico);
		$count = $resultado_consulta->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado_consulta);
			$_SESSION['idNeurologico'] = $row['id_a_neurologico'];
		}
		echo "<script>  alert_dinamic_create('Alteracion Neurologica','pagina_sugerencia_neurologico.php' , 'de la'); </script>";
	}else{
		echo "<script>  alert_dinamic_mistake('Alteracion Neurologica','a_neurologico.php' , 'de la'); </script>";
	}

	$conexion->close();
?>