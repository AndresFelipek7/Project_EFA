<?php
	include "library/conec.php";
	include 'lib_required_sweetalert.php';

	$traer_Valores_formulario_Sugerencia_neurologico = [$_POST["orden_reposo"] , $_POST["recomendacion"] , $_SESSION["idNeurologico"]];

	$insertar_Recomendacion = "INSERT INTO sugerencia (id_orden , id_a_neurologico , descripcion_sugerencia) VALUES ('$traer_Valores_formulario_Sugerencia_neurologico[0]' , '$traer_Valores_formulario_Sugerencia_neurologico[2]' , '$traer_Valores_formulario_Sugerencia_neurologico[1]')";
	$resultado = $conexion ->query($insertar_Recomendacion);

	echo ($resultado) ? "<script> alert_dinamic_create('Sugerencia de la Alteracion Neurologica','a_neurologico.php' , 'de la'); </script>" : "<script> alert_dinamic_mistake('Sugerencia de la Alteracion Neurologica','pagina_sugerencia_neurologico.php' , 'de la'); </script>";

	$conexion->close();
?>