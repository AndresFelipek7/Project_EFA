<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$tiempo_hora = $_POST["tiempo_hora"];
	$tiempo_minuto = $_POST["tiempo_minuto"];

	//echo "los valores de hora es $tiempo_hora y de minutos es = $tiempo_minuto";

	if (strlen($tiempo_hora) > 2 || strlen($tiempo_minuto) > 2) {
		echo "<script>
			alert('El valor ingresado en tiempo recorrido no es valido , por favor verificar antes de actualizar');
			window.location = 'rutas.php';
		</script>";
	}else if($tiempo_hora == 0){
		$tiempo_completo = $tiempo_minuto . " min";
		$traer_Valores_Actualizar_Ruta = [$_POST['id_ruta'],$_POST['codigo_ruta'],$_POST['distancia'],$_POST['ruta']];

		$consulta_Actualizar_Ruta = "UPDATE rutas SET codigo_ruta = '$traer_Valores_Actualizar_Ruta[1]' , distancia_Km = '$traer_Valores_Actualizar_Ruta[2] km' , Tiempo_Recorrido = '$tiempo_completo' , nombre_ruta = '$traer_Valores_Actualizar_Ruta[3]' WHERE id_ruta = '$traer_Valores_Actualizar_Ruta[0]'";
		$actualizacion_Ruta = $conexion->query($consulta_Actualizar_Ruta);

		//Si la actualizacion es corercta se va a colocar por el lado verdadero del condicional
		if($actualizacion_Ruta) {
			echo "<script> alert_dinamic_edit('Ruta','rutas.php', 'de la'); </script>";
		}else{
			echo "<script> alert_dinamic_fail_edit('Ruta','rutas.php','de la'); </script>";
		}
	}else if($tiempo_minuto == 0){
		$tiempo_completo = $tiempo_hora . " h ";
		$traer_Valores_Actualizar_Ruta = [$_POST['id_ruta'],$_POST['codigo_ruta'],$_POST['distancia'],$_POST['ruta']];

		$consulta_Actualizar_Ruta = "UPDATE rutas SET codigo_ruta = '$traer_Valores_Actualizar_Ruta[1]' , distancia_Km = '$traer_Valores_Actualizar_Ruta[2] km' , Tiempo_Recorrido = '$tiempo_completo' , nombre_ruta = '$traer_Valores_Actualizar_Ruta[3]' WHERE id_ruta = '$traer_Valores_Actualizar_Ruta[0]'";
		$actualizacion_Ruta = $conexion->query($consulta_Actualizar_Ruta);

		if($actualizacion_Ruta) {
			echo "<script> alert_dinamic_edit('Ruta','rutas.php', 'de la'); </script>";
		}else{
			echo "<script> alert_dinamic_fail_edit('Ruta','rutas.php','de la'); </script>";
		}
	}else {
		$tiempo_completo = $tiempo_hora . " h " . $tiempo_minuto . " min";
		$traer_Valores_Actualizar_Ruta = [$_POST['id_ruta'],$_POST['codigo_ruta'],$_POST['distancia'],$_POST['ruta']];

		$consulta_Actualizar_Ruta = "UPDATE rutas SET codigo_ruta = '$traer_Valores_Actualizar_Ruta[1]' , distancia_Km = '$traer_Valores_Actualizar_Ruta[2] km' , Tiempo_Recorrido = '$tiempo_completo' , nombre_ruta = '$traer_Valores_Actualizar_Ruta[3]' WHERE id_ruta = '$traer_Valores_Actualizar_Ruta[0]'";
		$actualizacion_Ruta = $conexion->query($consulta_Actualizar_Ruta);

		if($actualizacion_Ruta) {
			echo "<script> alert_dinamic_edit('Ruta','rutas.php','de la'); </script>";
		}else{
			echo "<script> alert_dinamic_fail_edit('Ruta','rutas.php','de la'); </script>";
		}
	}

	$conexion->close();

?>