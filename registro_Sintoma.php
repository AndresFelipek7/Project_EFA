<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valor_sintoma = [$_POST['nombre_sintoma'] , $_POST['descripcion_sintoma']];

	$consulta_Sintoma = "INSERT INTO sintomas (nombre_sintoma , descripcion_sintoma) VALUES ('$traer_Valor_sintoma[0]' , '$traer_Valor_sintoma[1]')";
	$resultado = $conexion -> query($consulta_Sintoma);

	if($resultado){
		$consulta_Traer_id_Sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_Valor_sintoma[0]'";
		$resultado_consulta = $conexion ->query($consulta_Traer_id_Sintoma);
		$count = $resultado_consulta->num_rows;

		if($count >=1) {
			$row = mysqli_fetch_array($resultado_consulta);
			$_SESSION['idSintoma'] = $row['id_sintoma'];
		}
		echo "<script>  alert_dinamic_create('Sintoma de Fatiga','pagina_sugerencia_sintoma.php'); </script>";
	}else{
		echo "<script>  alert_dinamic_mistake('Sintoma de Fatiga','sintomas.php'); </script>";
	}

	$conexion->close();
?>