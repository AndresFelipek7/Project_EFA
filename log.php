<!DOCTYPE html>
<html lang="en">
<head>
	<title>Acceso al sistema</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header.php'; ?>

	<center>
		<div class="panel panel-primary estilo_panel_login text-center">
			<button type="button" class="btn btn-md btn-warning pull-right hide_container" id="ayuda_mostrar_pass" data-toggle="tooltip" data-placement="right" title="Para mostrar la contraseña le das click al icono del ojo , para ocultar le das doble click al mismo icono.">
				<span class="fa fa-info"></span>
			</button>
			<img src="images/Index/contenido.jpg" class="animated fadeIn ">
			<form action="login.php" method="post">
				<h1>Acceso</h1>
				<center class="container-fluid">
					<input name="username" type="text" class="form-control colocar-icono-usuario" placeholder="Ingrese su Usuario" autofocus="autofocus" required><br><br>
					<input name="password" type="password" id="pass" class="form-control colocar-icono-contrasena" placeholder="Ingrese su contraseña" onchange="show_input_pasword()" required><br>
					<i class="fa fa-eye hide_container" id="show_pass"></i>
					<br><br>
				</center>
				<button  class="btn btn-primary btn-lg" type="submit" name="Submit"><span class="fa fa-mail-forward"></span></button>
			</form>
		</div>
	</center>

	<?php include 'library/Footer.php'; ?>
</body>
</html>