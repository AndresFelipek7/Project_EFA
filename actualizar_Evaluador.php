<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Evaluador = [$_POST['idDatos'] , $_POST['nombre'] ,$_POST['apellido'] , $_POST['t_documento'] , $_POST['documento'] , $_POST['edad'] , $_POST['telefono'] , $_POST['correo'] , $_POST['nacimiento'] , $_POST['estado'] , $_POST['name_usuario'] , $_POST['pass_usuario'] , $_POST['id_rol'] , $_POST['t_sexo']];

	$archivo = $_FILES['foto']['tmp_name'];
	$ruta = "contenido/Evaluador/" . $_FILES['foto'] ['name'];
	move_uploaded_file($archivo,$ruta);

	switch ($archivo) {
		case true:
			//Sacamos la ruta de la foto anterior para poder eliminarla y solo dejar la actualizada
			$Foto_Bd = "SELECT foto FROM datos_basicos WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";
			$resultado = $conexion->query($Foto_Bd) or die("Problemas al buscar la ruta en la bd");
			$count = $resultado->num_rows;

			//Si es igual a uno significa que encontro la ruta de la foto con el id correspondiente
			if($count == 1) {
				$row = mysqli_fetch_array($resultado);
				$ruta_Foto = $row['foto'];

				//Si la variable ruta que es la que tiene la nueva imagen es diferente contenido/Foto Generica , eso significa que la dos fotos son diferentes en nombre
				if($ruta != "contenido/Foto Generica.png") {
					/*Si la variale de la ruta foto que se encuentra en la bd es diferente de contenido/Foto_generica , eso significa que es diferente
					eso lo hacemos porque si no colocamos este condicional la foto generica que tenemos por fuera de las carpetas siempre se va ha eliminar en el
					siguiente proceso de la parte verdadera de este condicional*/
					if($ruta_Foto !=  "contenido/Foto Generica.png") {
							//si es verdadero con la funcion unlink eliminamos lo que tenga la variable ruta_foto que no es mas que la ruta de la foto antigua para no tener la foto nueva y la antigua en la misma carpeta
							unlink($ruta_Foto);
							$path_rename_image = "contenido/Evaluador/CC-$traer_Valores_Actualizar_Evaluador[4].jpg";
							rename($ruta , $path_rename_image);

							//Condicional para identificar cuando el evaluador se va ha desactivar para eliminar el contenido de la columna observaciones activacion en datos basicos para que no quede lleno
							if($traer_Valores_Actualizar_Evaluador[9] == 2) {
								$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Evaluador[1]' , apellido = '$traer_Valores_Actualizar_Evaluador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Evaluador[3]' , documento = '$traer_Valores_Actualizar_Evaluador[4]' , edad = '$traer_Valores_Actualizar_Evaluador[5]' , telefono = '$traer_Valores_Actualizar_Evaluador[6]' , correo = '$traer_Valores_Actualizar_Evaluador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Evaluador[8]' , Sexo = '$traer_Valores_Actualizar_Evaluador[13]' ,estado = '$traer_Valores_Actualizar_Evaluador[9]' , observaciones_activacion = '',  foto = '$path_rename_image' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";
								$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '$traer_Valores_Actualizar_Evaluador[12]' , nombre_usuario = '$traer_Valores_Actualizar_Evaluador[10]' , pass_usuario = '$traer_Valores_Actualizar_Evaluador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";

								$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
								$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

								if($actualizacion_DatosBasicos){
									if($actualizacion_Usuario){
										echo "<script> alert_dinamic_edit('Evaluador','Evaluadores.php'); </script>";
									}else{
										echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
									}
								}else{
									echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
								}
							//Si el estado no se cambio actualizamos todos los campos
							}else {
								$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Evaluador[1]' , apellido = '$traer_Valores_Actualizar_Evaluador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Evaluador[3]' , documento = '$traer_Valores_Actualizar_Evaluador[4]' , edad = '$traer_Valores_Actualizar_Evaluador[5]' , telefono = '$traer_Valores_Actualizar_Evaluador[6]' , correo = '$traer_Valores_Actualizar_Evaluador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Evaluador[8]' , Sexo = '$traer_Valores_Actualizar_Evaluador[13]' ,estado = '$traer_Valores_Actualizar_Evaluador[9]' , foto = '$path_rename_image' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";
								$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '$traer_Valores_Actualizar_Evaluador[12]' , nombre_usuario = '$traer_Valores_Actualizar_Evaluador[10]' , pass_usuario = '$traer_Valores_Actualizar_Evaluador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";

								$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
								$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

								if($actualizacion_DatosBasicos){
									if($actualizacion_Usuario){
										echo "<script> alert_dinamic_edit('Evaluador','Evaluadores.php'); </script>";
									}else{
										echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
									}
								}else{
									echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
								}
							}
					//Si la variable ruta_foto es igual a la cadena de foto genericca lo que hacemos es actualizar pero sin eliminar la foto porque es la misma
					}else{
						$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Evaluador[1]' , apellido = '$traer_Valores_Actualizar_Evaluador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Evaluador[3]' , documento = '$traer_Valores_Actualizar_Evaluador[4]' , edad = '$traer_Valores_Actualizar_Evaluador[5]' , telefono = '$traer_Valores_Actualizar_Evaluador[6]' , correo = '$traer_Valores_Actualizar_Evaluador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Evaluador[8]' , observaciones_activacion = '' , Sexo = '$traer_Valores_Actualizar_Evaluador[13]' ,estado = '$traer_Valores_Actualizar_Evaluador[9]' , foto = '$ruta' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";
						$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '$traer_Valores_Actualizar_Evaluador[12]' , nombre_usuario = '$traer_Valores_Actualizar_Evaluador[10]' , pass_usuario = '$traer_Valores_Actualizar_Evaluador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";

						$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
						$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

						if($actualizacion_DatosBasicos){
							if($actualizacion_Usuario){
								echo "<script> alert_dinamic_edit('Evaluador','Evaluadores.php'); </script>";
								/*echo '<script> alert(" Bien! Se han Actualizado los Datos Correctamente"); </script>';
								echo '<script> window.location="Evaluadores.php"; </script>';*/
							}else{
								echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
								/*echo '<script> alert(" Problemas al actualizar la tabla Usuario"); </script>';
								echo '<script> window.location="Evaluadores.php"; </script>';*/
							}
						}else{
							echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
							/*echo '<script> alert(" Problemas al actualizar la tabla datos Basicos"); </script>';
							echo '<script> window.location="Evaluadores.php"; </script>';*/
						}
					}
				}else{
					echo "Tiene foto generica en la base de datos";
				}
			}
			break;
		//Cuando no se ingresa foto para actualizar
		case false:
			//Este condicional es cuando el estado es desactivo del evaluador
			if($traer_Valores_Actualizar_Evaluador[9] == 2) {
				//Actualizamos todos los datos de la tabla datos basicos sin la foto porque no se ingreso nueva foto para actualizar
				$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Evaluador[1]' , apellido = '$traer_Valores_Actualizar_Evaluador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Evaluador[3]' , documento = '$traer_Valores_Actualizar_Evaluador[4]' , edad = '$traer_Valores_Actualizar_Evaluador[5]' , telefono = '$traer_Valores_Actualizar_Evaluador[6]' , correo = '$traer_Valores_Actualizar_Evaluador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Evaluador[8]' , Sexo = '$traer_Valores_Actualizar_Evaluador[13]' ,estado = '$traer_Valores_Actualizar_Evaluador[9]' , observaciones_activacion = '' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";

				$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '$traer_Valores_Actualizar_Evaluador[12]' , nombre_usuario = '$traer_Valores_Actualizar_Evaluador[10]' , pass_usuario = '$traer_Valores_Actualizar_Evaluador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";

				$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
				$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

				if($actualizacion_DatosBasicos){
					if($actualizacion_Usuario){
						echo "<script> alert_dinamic_edit('Evaluador','Evaluadores.php'); </script>";
					}else{
						echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
					}
				}else{
					echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
				}
			}else {
				//Actualizamos todos los datos de la tabla datos basicos sin la foto porque no se ingreso nueva foto para actualizar
				$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Evaluador[1]' , apellido = '$traer_Valores_Actualizar_Evaluador[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Evaluador[3]' , documento = '$traer_Valores_Actualizar_Evaluador[4]' , edad = '$traer_Valores_Actualizar_Evaluador[5]' , telefono = '$traer_Valores_Actualizar_Evaluador[6]' , correo = '$traer_Valores_Actualizar_Evaluador[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Evaluador[8]' , Sexo = '$traer_Valores_Actualizar_Evaluador[13]' ,estado = '$traer_Valores_Actualizar_Evaluador[9]' , observaciones_activacion = '' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";
				$consulta_Actualizar_Usuario = "UPDATE usuario SET id_rol = '$traer_Valores_Actualizar_Evaluador[12]' , nombre_usuario = '$traer_Valores_Actualizar_Evaluador[10]' , pass_usuario = '$traer_Valores_Actualizar_Evaluador[11]' WHERE id_datos = '$traer_Valores_Actualizar_Evaluador[0]'";

				$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
				$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Usuario) || die("Problemas al actualizar Informacion del Usuario!!!!");

				if($actualizacion_DatosBasicos){
					if($actualizacion_Usuario){
						echo "<script> alert_dinamic_edit('Evaluador','Evaluadores.php'); </script>";
					}else{
						echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
					}
				}else{
					echo "<script> alert_dinamic_fail_edit('Evaluador','Evaluadores.php'); </script>";
				}
			}
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('Evaluadores.php'); </script>";
			break;
	}

	$conexion->close();
?>