<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Conductor = [$_POST['idDatos'] ,$_POST['nombre'],$_POST['apellido'],$_POST['t_documento'],$_POST['documento'],$_POST['edad'],$_POST['telefono'],$_POST['correo'],$_POST['nacimiento'],$_POST['estado'],$_POST['id_empresa'],$_POST['placa'],$_POST['eps'],$_POST['arp'],$_POST['talla'],$_POST['peso'],$_POST['sanguineo'],$_POST['id_conductor'] , $_POST['t_sexo']];

	//Capturar Foto del conductor
	$archivo = $_FILES['foto_nueva']['tmp_name'];
	$destino_Foto = "contenido/Conductor/Por Evaluador/" . $_FILES['foto_nueva'] ['name'];
	move_uploaded_file($archivo,$destino_Foto);

	//$archivo devuelve true si se cargo una imagen
	switch ($archivo) {
		//Caso verdadero cuando se ingresa nueva foto para cambiar
		case true:
			//Seleccionamos la ruta de la foto anterior para poderla actualizar con la nueva
			$Foto_Bd = "SELECT foto FROM datos_basicos WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
			$resultado = $conexion->query($Foto_Bd);
			$count = $resultado->num_rows;

			if($count == 1) {
				$row = mysqli_fetch_array($resultado);
				$ruta_Foto = $row['foto'];

				//En el primer condicional se verifica que la foto que cargo el evaluador sea diferente a la foto generica
				if($destino_Foto != "contenido/Foto Generica.png") {
					//Se verifica que la ruta de la foto anterior de la bd sea diferente a la foto generica , si no se hace este condicional se va ha eliminar la foto generica estandar para todos que se encuentra por fuera de la carpte conductores
					if($ruta_Foto != "contenido/Foto Generica.png") {
						//Eliminar la foto anterior y insertar la nueva foto en la carpte de conductores
						unlink($ruta_Foto);
						$path_rename_image = "contenido/Conductor/Por Evaluador/CC-$traer_Valores_Actualizar_Conductor[4].jpg";
						rename($destino_Foto , $path_rename_image);

						$consulta_Actualizar_Datos_Basicos = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Conductor[1]' , apellido = '$traer_Valores_Actualizar_Conductor[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Conductor[3]' , documento = '$traer_Valores_Actualizar_Conductor[4]' , edad = '$traer_Valores_Actualizar_Conductor[5]' , telefono = '$traer_Valores_Actualizar_Conductor[6]' , correo = '$traer_Valores_Actualizar_Conductor[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Conductor[8]' , estado = '$traer_Valores_Actualizar_Conductor[9]' , foto = '$path_rename_image' , Sexo = '$traer_Valores_Actualizar_Conductor[18]' WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
						$consulta_Actualizar_Conductor = "UPDATE conductor SET id_empresa = '$traer_Valores_Actualizar_Conductor[10]' , id_vehiculo = '$traer_Valores_Actualizar_Conductor[11]' , eps = '$traer_Valores_Actualizar_Conductor[12]' , arp = '$traer_Valores_Actualizar_Conductor[13]' , talla = '$traer_Valores_Actualizar_Conductor[14]' , peso = '$traer_Valores_Actualizar_Conductor[15]' , grupo_sanguineo = '$traer_Valores_Actualizar_Conductor[16]' WHERE id_conductor = '$traer_Valores_Actualizar_Conductor[17]'";

						$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos);
						$actualizacion_Conductor = $conexion->query($consulta_Actualizar_Conductor);

						if($actualizacion_DatosBasicos){
							if($actualizacion_Conductor){
								echo "<script> alert_dinamic_edit('Conductor','test.php'); </script>";
							}else{
								echo "<script> alert_dinamic_fail_edit('Conductor','test.php'); </script>";
							}
						}else{
							echo "<script> alert_dinamic_fail_edit('Conductor','test.php'); </script>";
						}
					}else{
						$consulta_Actualizar_Datos_Basicos = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Conductor[1]' , apellido = '$traer_Valores_Actualizar_Conductor[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Conductor[3]' , documento = '$traer_Valores_Actualizar_Conductor[4]' , edad = '$traer_Valores_Actualizar_Conductor[5]' , telefono = '$traer_Valores_Actualizar_Conductor[6]' , correo = '$traer_Valores_Actualizar_Conductor[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Conductor[8]' , estado = '$traer_Valores_Actualizar_Conductor[9]' , foto = '$path_rename_image' WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
						$consulta_Actualizar_Conductor = "UPDATE conductor SET id_empresa = '$traer_Valores_Actualizar_Conductor[10]' , id_vehiculo = '$traer_Valores_Actualizar_Conductor[11]' , eps = '$traer_Valores_Actualizar_Conductor[12]' , arp = '$traer_Valores_Actualizar_Conductor[13]' , talla = '$traer_Valores_Actualizar_Conductor[14]' , peso = '$traer_Valores_Actualizar_Conductor[15]' , grupo_sanguineo = '$traer_Valores_Actualizar_Conductor[16]' WHERE id_conductor = '$traer_Valores_Actualizar_Conductor[17]'";

						$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos);
						$actualizacion_Conductor = $conexion->query($consulta_Actualizar_Conductor);

						if($actualizacion_DatosBasicos){
							if($actualizacion_Conductor){
								echo "<script> alert_dinamic_edit('Conductor','test.php'); </script>";
							}else{
								echo "<script> alert_dinamic_fail_edit('Conductor','test.php'); </script>";
							}
						}else{
							echo "<script> alert_dinamic_fail_edit('Conductor','test.php'); </script>";
						}
					}
				}else{
					echo "<script>  alert_dinamic_outside_place('test.php'); </script>";
				}
			}else {
				echo "<script>  alert_dinamic_outside_place('test.php'); </script>";
			}
			break;
		//Caso falso cuando no se ingresa foto para cambiar
		case false:
			//Actualizamos los datos de la tabla datos basicos sin la foto porque no se ingreso una para cambiar
			$consulta_Actualizar_Datos_Basicos = "UPDATE datos_basicos SET nombre = '$traer_Valores_Actualizar_Conductor[1]' , apellido = '$traer_Valores_Actualizar_Conductor[2]' , id_tipo_documento = '$traer_Valores_Actualizar_Conductor[3]' , documento = '$traer_Valores_Actualizar_Conductor[4]' , edad = '$traer_Valores_Actualizar_Conductor[5]' , telefono = '$traer_Valores_Actualizar_Conductor[6]' , correo = '$traer_Valores_Actualizar_Conductor[7]' , fecha_nacimiento = '$traer_Valores_Actualizar_Conductor[8]' , estado = '$traer_Valores_Actualizar_Conductor[9]' , Sexo = '$traer_Valores_Actualizar_Conductor[18]'  WHERE id_datos = '$traer_Valores_Actualizar_Conductor[0]'";
			$consulta_Actualizar_Conductor = "UPDATE conductor SET id_empresa = '$traer_Valores_Actualizar_Conductor[10]' , id_vehiculo = '$traer_Valores_Actualizar_Conductor[11]' , eps = '$traer_Valores_Actualizar_Conductor[12]' , arp = '$traer_Valores_Actualizar_Conductor[13]' , talla = '$traer_Valores_Actualizar_Conductor[14]' , peso = '$traer_Valores_Actualizar_Conductor[15]' , grupo_sanguineo = '$traer_Valores_Actualizar_Conductor[16]' WHERE id_conductor = '$traer_Valores_Actualizar_Conductor[17]'";

			$actualizacion_DatosBasicos = $conexion->query($consulta_Actualizar_Datos_Basicos);
			$actualizacion_Conductor = $conexion->query($consulta_Actualizar_Conductor);

			if($actualizacion_DatosBasicos) {
				if($actualizacion_Conductor) {
					echo "<script> alert_dinamic_edit('Conductor','test.php'); </script>";
				}else{
					echo "<script> alert_dinamic_fail_edit('Conductor','test.php'); </script>";
				}
			}else{
				echo "<script> alert_dinamic_fail_edit('Conductor','test.php'); </script>";
			}
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('test.php'); </script>";
			break;
	}

	$conexion->close();
?>