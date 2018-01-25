<?php
	include "../conec.php";

	$nombre_ruta = $_REQUEST["valor_nombre_ruta"];
	$desde = $_REQUEST["desde"];

	$consulta_Saber_si_Existe = "SELECT nombre_ruta FROM reporte_ruta WHERE nombre_ruta = '$nombre_ruta'";
	$resultado = $conexion ->query($consulta_Saber_si_Existe);
	$count = $resultado->num_rows;

	if($count == 1) {
		echo "
			<div class='alert alert-danger'>
				<span class='fa fa-minus-circle fa-2x'></span><br>
				<label>
					El Nombre que ingreso de la ruta ya esta en el sistema ,
					por favor verificar
				</label>
			</div>";

		if ($desde == "Registro Ruta") {
			echo "<script>
					document.getElementById('registrar_ruta').disabled=true;
					style_border_input('nombre_ruta', 'Rojo');
				</script>";

		}else {
			echo "<script>
						document.getElementById('actualizar_registro_ruta').disabled=true;
						style_border_input('nombre_ruta', 'Rojo');
				</script>";

		}
	}else{
		if ($desde == "Registro Ruta") {
			echo "<script>
					document.getElementById('registrar_ruta').disabled=false;
					style_border_input('nombre_ruta', 'verde');
				</script>";
		}else {
			echo "<script>
					document.getElementById('actualizar_registro_ruta').disabled=false;
					style_border_input('nombre_ruta', 'verde');
				</script>";
		}
	}

	$conexion->close();
?>