<?php
	include 'library/Head/Head_common.php';
	include "library/conec.php";
	include 'library/Footer.php';

	//Captura de las variables que se enviaron desde el formulario
	$username = $_POST['username'];
	$password = $_POST['password'];
	//Condicional por si pasa un error
	if(mysqli_connect_errno()){
		echo "Error de conexión a la BD: ".mysqli_connect_error();
		exit();
	}

	// usuario y clave enviados desde el Form
	$consulta = "SELECT * FROM usuario WHERE nombre_usuario = '$username' AND pass_usuario = '$password'";
	$resultado = $conexion ->query($consulta);
	$count = $resultado->num_rows;

	// Si encuentra un registro que conincida significa que hay coincidencia entre nombre y contraseña
	if($count >= 1){
		//Creando variables globales
		$row = mysqli_fetch_array($resultado);
		$_SESSION['name_user'] = $row['nombre_usuario'];
		$_SESSION['idDatos'] = $row['id_datos'];
		$_SESSION['id_usuario'] = $row['id_usuario'];
		$_SESSION['perfil'] = $row['id_rol'];
		$entrada = $_SESSION['perfil'];
		$nombre_usuario = $_SESSION['name_user'];

		//Consulta para saber si el usuario que se ingreso esta activo o desactivo
		$consulta_Saber_si_Esta_activo = "SELECT estado FROM datos_basicos WHERE id_datos = '$_SESSION[idDatos]'";
		$resultado_activo = $conexion ->query($consulta_Saber_si_Esta_activo);
		$count_activo = $resultado_activo->num_rows;

		//Condicional para saber si trajo algun registro de la BD
		if($count_activo == 1) {
			$fila = mysqli_fetch_array($resultado_activo);
			$valor_estado = $fila['estado'];

			//Condicional para saber si esta activo que es igual a 1
			if($valor_estado == 1) {
				//Condicional para redireccionar cuando es 2 es para el rol admin , sin es diferente es para evaluador por el momento
				if($entrada == 2){
					header("location: main_admin.php"); //Redirección del navegador
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

	//Cerramos la conexion a la Bd
	$conexion->close();
?>