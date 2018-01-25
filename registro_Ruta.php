<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$distancia = $_POST['distancia']." km";
	$traer_Valores_ruta = [$_POST['codigo_ruta'] , $_POST['nombre_ruta'] , $_POST['seleccion_tiempo']];

	switch ($traer_Valores_ruta[2]) {
		case 'Hora':
			$tiempo_recorrido = $_POST['tiempo_recorrido_hora'];
			$valor_tiempo = $tiempo_recorrido." h";
			break;
		case 'Minuto':
			$tiempo_recorrido = $_POST['tiempo_recorrido_minutos'];
			$valor_tiempo = $tiempo_recorrido." min";
			break;
		case 'Ambos_tiempo':
			$valor_Horas = $_POST["tiempo_recorrido_hora"];
			$valor_Minutos = $_POST["tiempo_recorrido_minutos"];
			$valor_tiempo = $valor_Horas. " h ".$valor_Minutos." min";
			break;
		default:
			echo "<script>  alert_dinamic_outside_place('rutas.php'); </script>";
			break;
	}

	$consulta_Ruta = "INSERT INTO rutas (codigo_ruta , distancia_km , nombre_ruta , Tiempo_recorrido) VALUES ('$traer_Valores_ruta[0]' , '$distancia' , '$traer_Valores_ruta[1]', '$valor_tiempo')";
	$resultado = $conexion -> query($consulta_Ruta);

	echo ($resultado) ? "<script> alert_dinamic_create('Ruta','rutas.php','de la'); </script>" : "<script> alert_dinamic_mistake('Ruta','rutas.php','de la'); </script>";

	$conexion->close();
?>