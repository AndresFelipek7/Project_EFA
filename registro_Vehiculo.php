<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_vehiculo = [$_POST['id_empresa'] , $_POST['marca'] , $_POST['numero_interno'] , $_POST['placa'] , $_POST['modelo'] , $_POST["fecha_revision"]];

	$consulta_Vehiculo = "INSERT INTO vehiculo (id_empresa , marca , numero_interno , placa , modelo , fecha_revision) VALUES ('$traer_Valores_vehiculo[0]', '$traer_Valores_vehiculo[1]', '$traer_Valores_vehiculo[2]', '$traer_Valores_vehiculo[3]', '$traer_Valores_vehiculo[4]' , '$traer_Valores_vehiculo[5]')";
	$resultado = $conexion -> query($consulta_Vehiculo);

	echo ($resultado) ? "<script> alert_dinamic_create('Vehiculo','vehiculos.php'); </script>" : "<script> alert_dinamic_mistake('Vehiculo','vehiculos.php'); </script>";

	$conexion->close();
?>