<?php
	include "library/conec.php";
	include 'lib_required_sweetalert.php';

	$traer_Valores_formulario_Sugerencia_emocional = [$_POST["orden_reposo"] , $_POST["recomendacion"] , $_SESSION["idEmocional"]];

	$insertar_Recomendacion = "INSERT INTO sugerencia (id_orden , id_a_emocional , descripcion_sugerencia) VALUES ('$traer_Valores_formulario_Sugerencia_emocional[0]' , '$traer_Valores_formulario_Sugerencia_emocional[2]' , '$traer_Valores_formulario_Sugerencia_emocional[1]')";
	$resultado = $conexion ->query($insertar_Recomendacion);

	echo ($resultado) ? "<script> alert_dinamic_create('Sugerencia de la Alteracion Emocional','a_emocional.php' , 'de la'); </script>" : "<script> alert_dinamic_mistake('Sugerencia de la Alteracion Emocional','pagina_sugerencia_emocional.php' , 'de la'); </script>";

	$conexion->close();
?>