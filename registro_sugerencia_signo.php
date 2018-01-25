<?php
	include "library/conec.php";
	include 'lib_required_sweetalert.php';

	$traer_Valores_formulario_Sugerencia_signo = [$_POST["orden_reposo"] , $_POST["recomendacion"] , $_SESSION["idSigno"]];

	$insertar_Recomendacion = "INSERT INTO sugerencia (id_orden , id_signo , descripcion_sugerencia) VALUES ('$traer_Valores_formulario_Sugerencia_signo[0]' , '$traer_Valores_formulario_Sugerencia_signo[2]' , '$traer_Valores_formulario_Sugerencia_signo[1]')";
	$resultado = $conexion ->query($insertar_Recomendacion);

	echo ($resultado) ? "<script> alert_dinamic_create('Sugerencia del Signo','signos.php' , 'de la'); </script>" : "<script> alert_dinamic_mistake('Sugerencia del Signo','pagina_sugerencia_signo.php' , 'de la'); </script>";

	$conexion->close();
?>