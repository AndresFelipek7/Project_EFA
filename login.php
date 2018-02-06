<?php
	include 'library/Head/Head_common.php';
	include "library/conec.php";
	include 'library/Footer.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	if(mysqli_connect_errno()){
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}

	$consulta = "SELECT * FROM usuario WHERE nombre_usuario = '$username' AND pass_usuario = '$password'";
	$resultado = $conexion ->query($consulta);
	$count = $resultado->num_rows;

	if($count >= 1){
		$row = mysqli_fetch_array($resultado);
		$_SESSION['name_user'] = $row['nombre_usuario'];
		$_SESSION['idDatos'] = $row['id_datos'];
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['perfil'] = $row['id_rol'];
		$entrada = $_SESSION['perfil'];
		$nombre_usuario = $_SESSION['name_user'];

		$consulta_Saber_si_Esta_activo = "SELECT estado FROM datos_basicos WHERE id_datos = '$_SESSION[idDatos]'";
		$resultado_activo = $conexion ->query($consulta_Saber_si_Esta_activo);
		$count_activo = $resultado_activo->num_rows;

		if($count_activo == 1) {
			$fila = mysqli_fetch_array($resultado_activo);
			$valor_estado = $fila['estado'];

			if($valor_estado == 1) {
				if($entrada == 2){
					header("location: main_admin.php");
				}
				else{
					echo "<script> alert_dinamic_hi_evaluador(); </script>";
				}
			}else{
				echo "<script> alert_dinamic_disabled_user(); </script>";
			}
		}else{
			echo "<script> alert_dinamic_error_login(); </script>";
		}
	}else{
		echo "<script> alert_dinamic_error_login(); </script>";
	}

	$conexion->close();
?>