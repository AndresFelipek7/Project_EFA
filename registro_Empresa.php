<?php
	include "library/conec.php";
	include "lib_required_sweetalert.php";

	$traer_Valores_empresa = [$_POST['ruta'] ,$_POST['nit'] , $_POST['nombre_empresa']];

	$consulta_Empresa = "INSERT INTO empresa (id_ruta , nit , nombre_empresa) VALUES ('$traer_Valores_empresa[0]' , '$traer_Valores_empresa[1]' , '$traer_Valores_empresa[2]')";
	$resultado = $conexion -> query($consulta_Empresa);

	echo ($resultado) ? "<script> alert_dinamic_create('Empresa','empresas.php' , 'de la'); </script>" : "<script> alert_dinamic_mistake('Empresa','empresas.php' , 'de la'); </script>";

	$conexion->close();
?>