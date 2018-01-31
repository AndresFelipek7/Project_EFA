<!DOCTYPE html>
<html lang="en">
<head>
	<title>Informe de la Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header-main.php'; ?>

	<?php
		foreach ( $_POST["alteraciones_neurologicas"] as $traer_Alteraciones_neurologicas) {
			echo $traer_Alteraciones_neurologicas."<br>";
		}
	?>

	<?php include "library/Footer.php"; ?>
</body>
</html>