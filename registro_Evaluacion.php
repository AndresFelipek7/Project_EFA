<!DOCTYPE html>
<html lang="en">
<head>
	<title>Informe de la Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header-main-evaluador.php'; ?>

	<?php

		$sueño = $_POST['sueño_profundo'];
		switch ($sueño) {
			case 'hora':
				echo "Solo hay hora en el select de sueño profundo";
				break;
			case 'minutos':
				echo "Solo hay minutos en el select de sueño profundo";
				break;
			case 'ambos':
				echo "Tenemos horas y minutos";
				break;
			default:
				echo "Ninguna de las anteriores";
				break;
		}
	?>

	<?php include "library/Footer.php"; ?>
</body>
</html>