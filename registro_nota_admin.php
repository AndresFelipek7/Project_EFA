<?php

	session_start();
	//Incluimos la conexion de la BD
	include "library/conec.php";

	//Capturamos los datos del formulario

	$nota_Admin = $_REQUEST["valor_nota_admin"];
	$id_Dato_admin = $_SESSION["idDatos"];

	$traer_Id_usuario = "SELECT id_usuario FROM usuario WHERE id_datos = '$id_Dato_admin'";
	$resultado = $conexion ->query($traer_Id_usuario);
	$count = $resultado->num_rows;

	//Si es mayor a 1 significa que encontro lo que estabamos buscando
	if($count >= 1) {
		$row = mysqli_fetch_array($resultado);
		$id_usuario = $row["id_usuario"];

		//Hacemos la actualizacion en la tabla usuario donde se encuentra el campo notas importantes que es solo para el admin
		$actualizar_Nota = "UPDATE usuario SET notas_importantes = '$nota_Admin' WHERE id_usuario = '$id_usuario'";
		$resultado_actualizar_nota = $conexion ->query($actualizar_Nota);

		if(!$resultado_actualizar_nota) {
			echo "
				<div class='alert alert-danger text-center'>
					<label>
						Ha ocurrido un error cuando se intento guardar la nota
					</label>
				</div>";
		}
	}else{
		echo "<script> alert('Ha ocurrido un problema , por favor vuelva a intentarlo') </script>";
		echo "<script> window.location = 'main_admin.php' </script>";
	}

	//Cerramos la conexion a la Bd
	$conexion->close();

?>