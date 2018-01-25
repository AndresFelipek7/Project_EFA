<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cerrar Sesion</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header.php'; ?>

	<script>
		swal({
			title: "Muchas Gracias!",
			text: "Por utilizar nuestra plataforma.",
			imageUrl: "images/icon_alert/despedida.jpg"
		},

		function(isConfirm){
			if (isConfirm) {
				window.location = "Index.php"
			}
		}
		);
	</script>

	<?php include 'library/Footer.php'; ?>
</body>
</html>