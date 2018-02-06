<!DOCTYPE html>
<html lang="en">
<head>
	<title>Informe de la Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header-main-evaluador.php'; ?>

	<?php
		$hora_sueno = $_POST["pulsaciones"];
		echo "La hora de sueño profundo es = ".$hora_sueno;
	?>

	<?php include "library/Footer.php"; ?>
</body>
</html>