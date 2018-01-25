<?php
	include "../conec.php";
	include "../../methods_backend.php";

	$codigo_ruta = $_REQUEST["valor_codigo"];
	$desde = $_REQUEST["desde"];

	if ($desde == "Actualizar Ruta" ) {
		$id_ruta = $_REQUEST["idRuta"];
		$consulta_Traer_idRuta = "SELECT codigo_ruta FROM reporte_ruta WHERE id_ruta = '$id_ruta'";
		$resultado = $conexion ->query($consulta_Traer_idRuta);
		$count = $resultado->num_rows;

		if ($count == 1) {
			$row = mysqli_fetch_array($resultado);
			$CodigoRuta_Original = $row["codigo_ruta"];

			$consulta_Saber_si_Existe = "SELECT codigo_ruta FROM reporte_ruta WHERE codigo_ruta = '$codigo_ruta'";
			$resultado_codigo = $conexion ->query($consulta_Saber_si_Existe);
			$count = $resultado_codigo->num_rows;

			if ($count == 1) {
				$row = mysqli_fetch_array($resultado_codigo);
				$codigoRuta_Nuevo = $row["codigo_ruta"];

				if ($CodigoRuta_Original != $codigoRuta_Nuevo) {
					message_mistake_validator("El codigo de la ruta ya existe en el sistema.");
					enable_function_js("", "codigo_ruta", "registrar_ruta");
				}else {
					disable_function_js("", "codigo_ruta", "registrar_ruta");
				}
			} else {
				disable_function_js("", "codigo_ruta", "registrar_ruta");
			}
		}else {
			enable_function_js("", "codigo_ruta", "registrar_ruta");
		}
	}else {
		$consulta_Saber_si_Existe = "SELECT codigo_ruta FROM reporte_ruta WHERE codigo_ruta = '$codigo_ruta'";
		$resultado = $conexion ->query($consulta_Saber_si_Existe);
		$count = $resultado->num_rows;

		if($count == 1) {
			message_mistake_validator("El codigo de la ruta ya existe en el sistema.");
			enable_function_js("", "codigo_ruta", "registrar_ruta");
		}else {
			disable_function_js("", "codigo_ruta", "registrar_ruta");
		}
	}

	$conexion->close();
?>