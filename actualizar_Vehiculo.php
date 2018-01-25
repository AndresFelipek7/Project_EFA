<?php
	include("library/conec.php");
	include 'lib_required_sweetalert.php';

	$traer_Valores_Actualizar_Vehiculo = [$_POST['id_vehiculo'],$_POST['id_empresa'],$_POST['marca'],$_POST['numero_interno'],$_POST['placa'],$_POST['modelo'] , $_POST["fecha_revision"]];

	$actualizar_Vehiculo = "UPDATE vehiculo SET id_empresa = '$traer_Valores_Actualizar_Vehiculo[1]' , marca = '$traer_Valores_Actualizar_Vehiculo[2]' , numero_interno = '$traer_Valores_Actualizar_Vehiculo[3]' , placa = '$traer_Valores_Actualizar_Vehiculo[4]' , modelo = '$traer_Valores_Actualizar_Vehiculo[5]', fecha_revision = '$traer_Valores_Actualizar_Vehiculo[6]' WHERE id_vehiculo = '$traer_Valores_Actualizar_Vehiculo[0]'";
	$Actualizacion_Final = $conexion -> query ($actualizar_Vehiculo) || die("Hemos entrado un error en la consulta");

	if($Actualizacion_Final) {
		echo "<script> alert_dinamic_edit('Vehiculo','vehiculos.php'); </script>";
	}else{
		echo "<script> alert_dinamic_fail_edit('Vehiculo','vehiculos.php'); </script>";
	}

	$conexion->close();
?>