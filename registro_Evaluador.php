<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valores = [$_POST['t_documento'],$_POST['nombre'],$_POST['apellido'],$_POST['documento'],$_POST['edad'],$_POST['telefono'],$_POST['correo'],$_POST['f_nacimiento'],$_POST['txtusuario'],$_POST['txtpass'],$_POST['elegir_sexo']];

	$archivo = $_FILES['foto']['tmp_name'];
	$ruta = "contenido/Evaluador/" . $_FILES['foto'] ['name'];
	move_uploaded_file($archivo,$ruta);

	switch ($archivo) {
		#Cuando se carga foto
		case true:
			#Cambiar el nombre de la imagen cargada por uno mas descriptivo*/
				$new_name_photo = "contenido/Evaluador/CC-".$traer_Valores[3].".jpg";
				rename($ruta , $new_name_photo);
			#fin

			$query = "INSERT INTO datos_basicos (id_tipo_documento , nombre , apellido, documento , Sexo , edad , telefono , correo , fecha_nacimiento , estado , foto ) VALUES ('$traer_Valores[0]' , '$traer_Valores[1]' , '$traer_Valores[2]' , '$traer_Valores[3]' , '$traer_Valores[10]' , '$traer_Valores[4]' , '$traer_Valores[5]' , '$traer_Valores[6]' , '$traer_Valores[7]' , '1' , '$new_name_photo')";
			$resultado = $conexion -> query($query);

			if($resultado){
				$consulta_traer_idDatos = "SELECT id_datos FROM datos_basicos WHERE documento = '$traer_Valores[3]'";
				$resultado_datos = $conexion->query($consulta_traer_idDatos);
				$count = $resultado_datos->num_rows;

				if($count >=1){
					$row = mysqli_fetch_array($resultado_datos);
					$_SESSION['datos'] = $row['id_datos'];
					$valor_dato = $_SESSION['datos'];

					$query2 = "INSERT INTO usuario ( id_datos , id_rol , nombre_usuario , pass_usuario ) VALUES ( '$valor_dato' , '1' , '$traer_Valores[8]' , '$traer_Valores[9]')";
					$resultado1 = $conexion -> query($query2);

					echo ($resultado1) ? "<script> alert_dinamic_create('Evaluador','Evaluadores.php'); </script>" : "<script> alert_dinamic_mistake('Evaluador','Evaluadores.php'); </script>";
				}
			}else{
				echo "<script>  alert_dinamic_mistake('Evaluador','Evaluadores.php'); </script>";
			}
			break;
		case false:
			$foto_Generica = "contenido/Foto Generica.png";
			$insercion_Datos_basicos = "INSERT INTO datos_basicos (id_tipo_documento , nombre , apellido, documento , Sexo , edad , telefono , correo , fecha_nacimiento , estado , foto ) VALUES ('$traer_Valores[0]' , '$traer_Valores[1]' , '$traer_Valores[2]' , '$traer_Valores[3]' , '$traer_Valores[10]' , '$traer_Valores[4]' , '$traer_Valores[5]' , '$traer_Valores[6]' , '$traer_Valores[7]' , '1' , '$foto_Generica')";
			$resultado_Datos_basicos = $conexion -> query($insercion_Datos_basicos);

			if($resultado_Datos_basicos){
				$consulta_traer_idDatos = "SELECT id_datos FROM datos_basicos WHERE documento = '$traer_Valores[3]'";
				$resultado_traer_Id_dato = $conexion->query($consulta_traer_idDatos);
				$count = $resultado_traer_Id_dato->num_rows;

				if($count >=1){
					//Creacion de Variables Globales
					$row = mysqli_fetch_array($resultado_traer_Id_dato);
					$_SESSION['datos'] = $row['id_datos'];
					$valor_dato = $_SESSION['datos'];

					$insercion_Usuario = "INSERT INTO usuario ( id_datos , id_rol , nombre_usuario , pass_usuario) VALUES ( '$valor_dato' , '1' , '$traer_Valores[8]' , '$traer_Valores[9]')";
					$resultado_Insercion_usuario = $conexion -> query($insercion_Usuario);

					echo ($resultado_Insercion_usuario) ? "<script> alert_dinamic_create('Evaluador','Evaluadores.php'); </script>" : "<script> alert_dinamic_mistake('Evaluador','Evaluadores.php'); </script>";
				}else {
					echo "<script>  alert_dinamic_mistake('Evaluador','Evaluadores.php'); </script>";
				}
			}else{
				echo "<script>  alert_dinamic_mistake('Evaluador','Evaluadores.php'); </script>";
			}
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('Evaluadores.php'); </script>";
			break;
	}

	$conexion->close();
?>