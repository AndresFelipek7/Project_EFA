<?php
	session_start();
	include "library/conec.php";
	include "methods_backend.php";

	$nota_Admin = $_REQUEST["valor_nota_admin"];
	$id_Dato_admin = $_SESSION["idDatos"];

	$traer_Id_usuario = "SELECT id_usuario FROM usuario WHERE id_datos = '$id_Dato_admin'";
	$resultado = $conexion ->query($traer_Id_usuario);
	$count = $resultado->num_rows;

	if($count >= 1) {
		$row = mysqli_fetch_array($resultado);
		$id_usuario = $row["id_usuario"];

		$actualizar_Nota = "UPDATE usuario SET notas_importantes = '$nota_Admin' WHERE id_usuario = '$id_usuario'";
		$resultado_actualizar_nota = $conexion ->query($actualizar_Nota);

		if(!$resultado_actualizar_nota) {
			message_mistake_validator("Ha ocurrido un error cuando se intento guardar la nota");
		}
	}else{
		echo "<script> alert_dinamic_outside_place('main_admin.php') </script>";
	}

	$conexion->close();
?>