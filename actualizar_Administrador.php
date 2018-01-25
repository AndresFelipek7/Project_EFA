<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Administrador = [$_POST['idDatos'] , $_POST['nombre'] ,$_POST['apellido'] , $_POST['t_documento'] , $_POST['documento'] , $_POST['edad'] , $_POST['telefono'] , $_POST['correo'] , $_POST['nacimiento'] , $_POST['estado'] , $_POST['name_usuario'] , $_POST['pass_usuario'],$_POST['elegir_sexo']];

	$archivo = $_FILES['foto']['tmp_name'];
	$ruta = "contenido/Administrador/" . $_FILES['foto'] ['name'];
	move_uploaded_file($archivo,$ruta);

	switch ($archivo) {
		//El caso es verdadero cuando se ha cargado una nueva foto para cambiar la anterior
		case true:
			//Sacamos la ruta de la foto anterior para poder eliminar la foto antigua y actualizar con la nueva foto cargada
			$Foto_Bd = "SELECT foto FROM datos_basicos WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";
			$resultado = $conexion->query($Foto_Bd) or die("Problemas al buscar la ruta en la bd");
			$count = $resultado->num_rows;

			if($count == 1) {
				$row = mysqli_fetch_array($resultado);
				$ruta_Foto = $row['foto'];

					//Condicional para saber si la nueva foto cargada es diferente a la foto generica que se le coloca a un administrador cuando se ingresa sin foto
					if($ruta != "contenido/Foto Generica.png") {
						//Condicional para saber si la ruta_foto de la BD es diferente de la ruta donde se encuentra la foto generica
						if($ruta_Foto !=  "contenido/Foto Generica.png") {
								//Con la funcion unlink es para eliminar la foto anterior
								unlink($ruta_Foto);
								$path_rename_image = "contenido/Administrador/CC-$traer_Valores_Actualizar_Administrador[4].jpg";
								rename($ruta , $path_rename_image);

								$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Administrador[1]' , apellido = '$traer_Valores_Actualizar_Administrador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Administrador[3]' , documento = '$traer_Valores_Actualizar_Administrador[4]' , edad = '$traer_Valores_Actualizar_Administrador[5]' , telefono = '$traer_Valores_Actualizar_Administrador[6]' , correo = '$traer_Valores_Actualizar_Administrador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Administrador[8]' , estado = '$traer_Valores_Actualizar_Administrador[9]' , observaciones_activacion = '' , Sexo = '$traer_Valores_Actualizar_Administrador[12]' , foto = '$path_rename_image' WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";
								$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '2' , nombre_usuario = '$traer_Valores_Actualizar_Administrador[10]' , pass_usuario = '$traer_Valores_Actualizar_Administrador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";

								$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
								$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

								if($actualizacion_DatosBasicos){
									if($actualizacion_Usuario){
										echo "<script> alert_dinamic_edit('Administrador','administrador.php'); </script>";
									}else{
										echo "<script> alert_dinamic_fail_edit('Administrador','administrador.php'); </script>";
									}
								}else{
									echo "<script> alert_dinamic_fail_edit('Administrador','administrador.php'); </script>";
								}
						//Si por alguna razon la variable ruta_foto es igual con la cadena que la comparamos no eliminamos la foto anterior porque es la foto generica
						}else{
							$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Administrador[1]' , apellido = '$traer_Valores_Actualizar_Administrador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Administrador[3]' , documento = '$traer_Valores_Actualizar_Administrador[4]' , edad = '$traer_Valores_Actualizar_Administrador[5]' , telefono = '$traer_Valores_Actualizar_Administrador[6]' , correo = '$traer_Valores_Actualizar_Administrador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Administrador[8]' , estado = '$traer_Valores_Actualizar_Administrador[9]' , foto = '$path_rename_image' , observaciones_activacion = '' WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";
							$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '2' , nombre_usuario = '$traer_Valores_Actualizar_Administrador[10]' , pass_usuario = '$traer_Valores_Actualizar_Administrador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";

							$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
							$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

							if($actualizacion_DatosBasicos){
								if($actualizacion_Usuario){
									echo "<script> alert_dinamic_edit('Administrador','administrador.php'); </script>";
								}else{
									echo "<script> alert_dinamic_fail_edit('Administrador','administrador.php'); </script>";
								}
							}else{
								echo "<script> alert_dinamic_fail_edit('Administrador','administrador.php'); </script>";
							}
						}
					}else{
						echo "<script> alert('Tiene foto generica en la base de datos'); </script>";
					}
			}
			break;
		//Caso para cuando no se ingresa foto para actualizar
		case false:
			//Hacemos la actualizacion de los ddatos basicos pero sin la foto porque no se ingreso ninguna para cambio
			$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Administrador[1]' , apellido = '$traer_Valores_Actualizar_Administrador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Administrador[3]' , documento = '$traer_Valores_Actualizar_Administrador[4]' , edad = '$traer_Valores_Actualizar_Administrador[5]' , telefono = '$traer_Valores_Actualizar_Administrador[6]' , correo = '$traer_Valores_Actualizar_Administrador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Administrador[8]' , estado = '$traer_Valores_Actualizar_Administrador[9]' , observaciones_activacion = '' , Sexo = '$traer_Valores_Actualizar_Administrador[12]' WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";

			$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '2' , nombre_usuario = '$traer_Valores_Actualizar_Administrador[10]' , pass_usuario = '$traer_Valores_Actualizar_Administrador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Administrador[0]'";

			$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
			$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

			if($actualizacion_DatosBasicos){
				if($actualizacion_Usuario){
					echo "<script> alert_dinamic_edit('Administrador','administrador.php'); </script>";
				}else{
					echo "<script> alert_dinamic_fail_edit('Administrador','administrador.php'); </script>";
				}
			}else{
				echo "<script> alert_dinamic_fail_edit('Administrador','administrador.php'); </script>";
			}
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('administrador.php'); </script>";
			break;
	}

	$conexion->close();

?>