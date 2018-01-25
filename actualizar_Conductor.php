<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Conductor = [$_POST['idDatos'] ,$_POST['nombre'],$_POST['apellido'],$_POST['t_documento'],$_POST['documento'],$_POST['edad'],$_POST['telefono'],$_POST['correo'],$_POST['nacimiento'],$_POST['estado'],$_POST['id_empresa'],$_POST['placa'],$_POST['eps'],$_POST['arp'],$_POST['talla'],$_POST['peso'],$_POST['sanguineo'],$_POST['id_conductor'] , $_POST['usuario_fit'] , $_POST['pass_fit'],$_POST['elegir_sexo']];

	$archivo = $_FILES['foto_nueva']['tmp_name'];
	$destino_Foto = "contenido/Conductor/Por Admin/" . $_FILES['foto_nueva'] ['name'];
	move_uploaded_file($archivo,$destino_Foto);

	switch ($archivo) {
		//Caso verdadero cuando se ingresa una nueva foto
		case true:
			//Sacamos la ruta de la foto anterior para poderla eliminar
			$Foto_Bd = "SELECT foto FROM datos_basicos WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
			$resultado = $conexion->query($Foto_Bd) or die("Problemas al buscar la ruta en la bd");
			$count = $resultado->num_rows;

			if($count == 1) {
				$row = mysqli_fetch_array($resultado);
				$ruta_Foto = $row['foto'];

				if($destino_Foto != "contenido/Foto Generica.png") {
					if($ruta_Foto != "contenido/Foto Generica.png") {
						//Eliminar la foto anterior para no tener la nueva y la antigua
						unlink($ruta_Foto);
						$path_rename_image = "contenido/Conductor/Por Admin/CC-$traer_Valores_Actualizar_Conductor[4].jpg";
						rename($destino_Foto , $path_rename_image);

						$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Conductor[1]' , apellido = '$traer_Valores_Actualizar_Conductor[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Conductor[3]' , documento = '$traer_Valores_Actualizar_Conductor[4]' , edad = '$traer_Valores_Actualizar_Conductor[5]' , telefono = '$traer_Valores_Actualizar_Conductor[6]' , correo = '$traer_Valores_Actualizar_Conductor[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Conductor[8]' , estado = '$traer_Valores_Actualizar_Conductor[9]' , foto = '$path_rename_image' , Sexo = '$traer_Valores_Actualizar_Conductor[20]' , observaciones_activacion = '' WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
						$consulta_Actualizar_Conductor = "UPDATE conductor SET id_empresa = '$traer_Valores_Actualizar_Conductor[10]' , id_vehiculo = '$traer_Valores_Actualizar_Conductor[11]' , eps = '$traer_Valores_Actualizar_Conductor[12]' , arp = '$traer_Valores_Actualizar_Conductor[13]' , talla = '$traer_Valores_Actualizar_Conductor[14]' , peso = '$traer_Valores_Actualizar_Conductor[15]' , grupo_sanguineo = '$traer_Valores_Actualizar_Conductor[16]' , usuario_fit = '$traer_Valores_Actualizar_Conductor[18]' , pass_fit = '$traer_Valores_Actualizar_Conductor[19]' WHERE id_conductor = '$traer_Valores_Actualizar_Conductor[17]'";

						$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos);
						$actualizacion_Conductor = $conexion->query($consulta_Actualizar_Conductor);

						if($actualizacion_DatosBasicos){
							if($actualizacion_Conductor){
								echo "<script> alert_dinamic_edit('Conductor','Conductores.php'); </script>";
							}else{
								echo "<script> alert_dinamic_fail_edit('Conductor','Conductores.php'); </script>";
							}
						}else{
							echo "<script> alert_dinamic_fail_edit('Conductor','Conductores.php'); </script>";
						}
				}else{
					$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Conductor[1]' , apellido = '$traer_Valores_Actualizar_Conductor[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Conductor[3]' , documento = '$traer_Valores_Actualizar_Conductor[4]' , edad = '$traer_Valores_Actualizar_Conductor[5]' , telefono = '$traer_Valores_Actualizar_Conductor[6]' , correo = '$traer_Valores_Actualizar_Conductor[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Conductor[8]' , estado = '$traer_Valores_Actualizar_Conductor[9]' , foto = '$path_rename_image' , observaciones_activacion = '' WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
					$consulta_Actualizar_Conductor = "UPDATE conductor SET id_empresa = '$traer_Valores_Actualizar_Conductor[10]' , id_vehiculo = '$traer_Valores_Actualizar_Conductor[11]' , eps = '$traer_Valores_Actualizar_Conductor[12]' , arp = '$traer_Valores_Actualizar_Conductor[13]' , talla = '$traer_Valores_Actualizar_Conductor[14]' , peso = '$traer_Valores_Actualizar_Conductor[15]' , grupo_sanguineo = '$traer_Valores_Actualizar_Conductor[16]' , usuario_fit = '$traer_Valores_Actualizar_Conductor[18]' , pass_fit = '$traer_Valores_Actualizar_Conductor[19]' WHERE id_conductor = '$traer_Valores_Actualizar_Conductor[17]'";

					$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos) || die("Problemas al actualizar Datos Basicos!!!!");
					$actualizacion_Usuario = $conexion->query($consulta_Actualizar_Conductor) || die("Problemas al actualizar Informacion del Conductor!!!!");

					if($actualizacion_DatosBasicos){
						if($actualizacion_Usuario){
							echo "<script> alert_dinamic_edit('Conductor','Conductores.php'); </script>";
						}else{
							echo "<script> alert_dinamic_fail_edit('Conductor','Conductores.php'); </script>";
						}
					}else{
						echo "<script> alert_dinamic_fail_edit('Conductor','Conductores.php'); </script>";
					}
				}
				}else{
					echo "<script> alert('La imagen que se encuentra en la BD es la misma de la foto generica'); </script>";
				}
			}
			break;
		//Caso falso para cuando no se ingresa nueva foto para cambiar con la antigua
		case false:
			//Hacemos la actualizacion de la informaciond de datos basicos sin actualizar la foto
			$consulta_Actualizar_Datos_Basicos  = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Conductor[1]' , apellido = '$traer_Valores_Actualizar_Conductor[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Conductor[3]' , documento = '$traer_Valores_Actualizar_Conductor[4]' , edad = '$traer_Valores_Actualizar_Conductor[5]' , telefono = '$traer_Valores_Actualizar_Conductor[6]' , correo = '$traer_Valores_Actualizar_Conductor[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Conductor[8]' , estado = '$traer_Valores_Actualizar_Conductor[9]' , Sexo = '$traer_Valores_Actualizar_Conductor[20]' , observaciones_activacion = '' WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
			$consulta_Actualizar_Conductor = "UPDATE conductor SET id_empresa = '$traer_Valores_Actualizar_Conductor[10]' , id_vehiculo = '$traer_Valores_Actualizar_Conductor[11]' , eps = '$traer_Valores_Actualizar_Conductor[12]' , arp = '$traer_Valores_Actualizar_Conductor[13]' , talla = '$traer_Valores_Actualizar_Conductor[14]' , peso = '$traer_Valores_Actualizar_Conductor[15]' , grupo_sanguineo = '$traer_Valores_Actualizar_Conductor[16]' , usuario_fit = '$traer_Valores_Actualizar_Conductor[18]' , pass_fit = '$traer_Valores_Actualizar_Conductor[19]' WHERE id_conductor = '$traer_Valores_Actualizar_Conductor[17]'";

			$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos);
			$actualizacion_Conductor = $conexion->query($consulta_Actualizar_Conductor);

			if($actualizacion_DatosBasicos) {
				if($actualizacion_Conductor) {
					echo "<script> alert_dinamic_edit('Conductor','Conductores.php'); </script>";
				}else{
					echo "<script> alert_dinamic_fail_edit('Conductor','Conductores.php'); </script>";
				}
			}else{
				echo "<script> alert_dinamic_fail_edit('Conductor','Conductores.php'); </script>";
			}
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('Conductores.php'); </script>";
			break;
	}

	$conexion->close();
?>