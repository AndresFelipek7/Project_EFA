<?php
	$solo_hora = date("h:i:s");
	$solo_fecha = date("Y:m:d");
	$cc_conductor = $_SESSION['documento'];

	$hora_sin_puntos = explode(":", $solo_hora);

	foreach ($hora_sin_puntos as $hora) {
		$unir_hora  = implode(" ",$hora_sin_puntos);
	}

	$fecha_sin_puntos = explode(":", $solo_fecha);

	foreach ($fecha_sin_puntos as $fecha) {
		$unir_fecha  = implode("-",$fecha_sin_puntos);
	}

	$nuevo_nombre_pantallazo = "CC-".$cc_conductor."-".$unir_hora;

	$path = "contenido/Descargables_Mi_Fit/$cc_conductor/";
	$path_date = "contenido/Descargables_Mi_Fit/$cc_conductor/$unir_fecha";
	$path_rename_fit_image = "contenido/Descargables_Mi_Fit/$cc_conductor/$unir_fecha/$nuevo_nombre_pantallazo.jpg";

	//Devuelve verdadero si existe el directorio o Carpeta
	if (is_dir($path)) {
		if (is_dir($path_date)) {
			$archivo = $_FILES['photo']['tmp_name'];
			$ruta_fit = $path . $_FILES['photo'] ['name'];
			move_uploaded_file($archivo,$ruta_fit);

			echo "La ruta del nombre actiguo es $ruta_fit";
			/*rename($ruta_fit , $path_rename_fit_image);*/
		}else {
			mkdir($path_date,0777);
			$archivo = $_FILES['photo']['tmp_name'];
			$ruta_fit = $path . $_FILES['photo'] ['name'];
			move_uploaded_file($archivo,$ruta_fit);

			rename($ruta_fit , $path_rename_fit_image);
		}
	}else {
		mkdir($path,0777);

		if (is_dir($path_date)) {
			$archivo = $_FILES['photo']['tmp_name'];
			$ruta_fit = $path . $_FILES['photo'] ['name'];
			move_uploaded_file($archivo,$ruta_fit);
			rename($ruta_fit , $path_rename_fit_image);
		}else {
			mkdir($path_date,0777);
			$archivo = $_FILES['photo']['tmp_name'];
			$ruta_fit = $path . $_FILES['photo'] ['name'];
			move_uploaded_file($archivo,$ruta_fit);

			echo "La ruta del nombre actiguo es $ruta_fit";
			/*rename($ruta_fit , $path_rename_fit_image);*/
		}
	}
?>