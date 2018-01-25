<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$altura = $_POST["altura_primera_parte"]." m ".$_POST["altura_segunda_parte"]." cm";
	$peso = $_POST["peso"]." Kg";

	$opcion_grupo_sanguineo = $_POST["opcion"] == "opcion_positivo" ? "Positivo" : "Negativo";
	$g_sanguineo = strtoUpper($_POST["sanguineo"])." ".$opcion_grupo_sanguineo;

	$traer_Valores_Conductor = [$_POST['t_documento'],$_POST['nombre'],$_POST['apellido'],$_POST['documento'],$_POST['edad'],$_POST['telefono'],$_POST['correo'],$_POST['f_nacimiento'],'1' ,$_POST['id_empresa'] , $_POST['placa'] , $_POST['eps'] ,$_POST['arp'] , $altura , $peso , $g_sanguineo , $_POST['usuario_fit'] , $_POST['pass_fit'],$_POST['elegir_sexo']];
	$identificacion_admin = "Admin : ".$_SESSION['name_user']." ID : ".$_SESSION['id_usuario'];

	$captura = $_FILES['foto']['tmp_name'];
	$ruta = "contenido/Conductor/" . $_FILES['foto'] ['name'];
	move_uploaded_file($captura,$ruta);

	switch ($captura) {
		//Cuando se carga la foto
		case true:
			#Cambiar el nombre de la imagen cargada por uno mas descriptivo
				$new_name_photo = "contenido/Conductor/Por Admin/CC-".$traer_Valores_Conductor[3].".jpg";
				rename($ruta , $new_name_photo);
			#Terminacion
			$insercion_Datos_basicos = "INSERT INTO datos_basicos (id_tipo_documento , nombre , apellido, documento , Sexo , edad , telefono , correo , fecha_nacimiento , estado , foto) VALUES ('$traer_Valores_Conductor[0]' , '$traer_Valores_Conductor[1]' , '$traer_Valores_Conductor[2]' , '$traer_Valores_Conductor[3]' , '$traer_Valores_Conductor[18]' , '$traer_Valores_Conductor[4]' , '$traer_Valores_Conductor[5]' , '$traer_Valores_Conductor[6]' , '$traer_Valores_Conductor[7]' , '$traer_Valores_Conductor[8]' , '$new_name_photo')";
			$resultado = $conexion -> query($insercion_Datos_basicos);

			if($resultado){
				$traer_IdDatos = "SELECT id_datos FROM datos_basicos WHERE documento = '$traer_Valores_Conductor[3]'";
				$resultado_datos = $conexion->query($traer_IdDatos);
				$count = $resultado_datos->num_rows;

				if($count >= 1){
					$row = mysqli_fetch_array($resultado_datos);
					$_SESSION['datos_conductor'] = $row['id_datos'];
					$valor_Dato_Conductor = $_SESSION['datos_conductor'];

					$consulta_Insertar_Conductor = "INSERT INTO conductor ( id_datos , id_empresa , id_vehiculo , eps , arp , talla , peso , grupo_sanguineo , usuario_fit , pass_fit , quien_registro) VALUES ('$valor_Dato_Conductor', '$traer_Valores_Conductor[9]', '$traer_Valores_Conductor[10]', '$traer_Valores_Conductor[11]', '$traer_Valores_Conductor[12]', '$traer_Valores_Conductor[13]', '$traer_Valores_Conductor[14]', '$traer_Valores_Conductor[15]' , '$traer_Valores_Conductor[16]' , '$traer_Valores_Conductor[17]' , '$identificacion_admin')";
					$resultado1 = $conexion -> query($consulta_Insertar_Conductor);

					echo ($resultado1) ? "<script> alert_dinamic_create('Conductor','Conductores.php'); </script>" : "<script> alert_dinamic_mistake('Conductor','Conductores.php'); </script>";
				}else{
					echo "<script>  alert_dinamic_mistake('Conductor','Conductores.php'); </script>";
				}
			}
			break;
		case false:
			$foto_Generica = "contenido/Foto Generica.png";
			$insercion_Datos_basicos = "INSERT INTO datos_basicos ( id_tipo_documento , nombre , apellido, documento , Sexo , edad , telefono , correo , fecha_nacimiento , estado , foto) VALUES ('$traer_Valores_Conductor[0]' , '$traer_Valores_Conductor[1]' , '$traer_Valores_Conductor[2]' , '$traer_Valores_Conductor[3]' , '$traer_Valores_Conductor[18]' , '$traer_Valores_Conductor[4]' , '$traer_Valores_Conductor[5]' , '$traer_Valores_Conductor[6]' , '$traer_Valores_Conductor[7]' , '$traer_Valores_Conductor[8]' , '$foto_Generica')";
			$resultado = $conexion -> query($insercion_Datos_basicos);

			if($resultado){
				$traer_IdDatos = "SELECT id_datos FROM datos_basicos WHERE documento = '$traer_Valores_Conductor[3]'";
				$resultado_datos = $conexion->query($traer_IdDatos);
				$count = $resultado_datos->num_rows;

				if($count >= 1){
					$row = mysqli_fetch_array($resultado_datos);
					$_SESSION['datos_conductor'] = $row['id_datos'];
					$valor_Dato_Conductor = $_SESSION['datos_conductor'];

					$consulta_Insertar_Conductor = "INSERT INTO conductor ( id_datos , id_empresa , id_vehiculo , eps , arp , talla , peso , grupo_sanguineo , usuario_fit , pass_fit , quien_registro) VALUES ('$valor_Dato_Conductor', '$traer_Valores_Conductor[9]', '$traer_Valores_Conductor[10]', '$traer_Valores_Conductor[11]', '$traer_Valores_Conductor[12]', '$traer_Valores_Conductor[13]', '$traer_Valores_Conductor[14]', '$traer_Valores_Conductor[15]' , '$traer_Valores_Conductor[16]' , '$traer_Valores_Conductor[17]' , '$identificacion_admin')";
					$resultado1 = $conexion -> query($consulta_Insertar_Conductor);

					echo ($resultado1) ? "<script> alert_dinamic_create('Conductor','Conductores.php'); </script>" : "<script> alert_dinamic_mistake('Conductor','Conductores.php'); </script>";
				}else{
					echo "<script>  alert_dinamic_mistake('Conductor','Conductores.php'); </script>";
				}
			}
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('Conductores.php'); </script>";
			break;
	}

	$conexion->close();
?>