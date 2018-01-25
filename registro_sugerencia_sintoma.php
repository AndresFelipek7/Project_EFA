<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valores_formulario_Sugerencia = [$_POST["orden_reposo"] , $_POST["recomendacion"] , $_SESSION["idSintoma"]];

	$insertar_Recomendacion = "INSERT INTO sugerencia (id_orden , id_sintoma , descripcion_sugerencia) VALUES ('$traer_Valores_formulario_Sugerencia[0]' , '$traer_Valores_formulario_Sugerencia[2]' , '$traer_Valores_formulario_Sugerencia[1]')";
	$resultado = $conexion ->query($insertar_Recomendacion);

	echo ($resultado) ? "<script> alert_dinamic_create('Sugerencia del Sintoma','sintomas.php' , 'de la'); </script>" : "<script> alert_dinamic_mistake('Sugerencia del Sintoma','pagina_sugerencia_sintoma.php' , 'de la'); </script>";

	$conexion->close();
?>