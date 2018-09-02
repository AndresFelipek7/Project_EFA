<!DOCTYPE html>
<html lang="en">
<head>
	<title>Manual | Evaluador</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header-main.php'; ?>

	<!--contenedor donde se encuentra una ayuda de como buscar en el manual del Evaluador-->
	<div class="container text-center">
		<button type="button" class="btn btn-md btn-info" id="ayuda_manual_evaluador" data-toggle="tooltip" data-placement="right" title="En este menu podra encontrar como realizar las principales funciones como evaluador si no sabe como hacerlo"><span class="fa fa-exclamation-circle fa-2x"></span></button>
		<h1>Manual de Uso del Evaluador</h1>
	</div>

	<!--Contenedor donde se encuentra todo el manual-->
	<div class="container text-center" style="border: 1px solid blue;">
		<!--Opcion de Inicio al sistema-->
		<div style="margin-top: 10px;">
			<a href='#seccion' data-toggle='collapse' class='btn btn-primary btn-lg'> <span class="glyphicon glyphicon-play"></span> Inicio al Sistema</a>
			<div class='collapse' id='seccion'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/inicio_sesion.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de como buscar un conductor-->
		<div>
			<a href='#seccion1' data-toggle='collapse' class='btn btn-warning btn-lg'> <span class="glyphicon glyphicon-search"></span> Buscar Conductor</a>
			<div class='collapse' id='seccion1'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/buscar_conductor.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de ver toda la informacion del conductor-->
		<div>
			<a href='#seccion2' data-toggle='collapse' class='btn btn-success btn-lg'> <span class="fa fa-file-text"></span> Ver infomacion completa del conductor</a>
			<div class='collapse' id='seccion2'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/info_completa.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Editar la informacion del conductor-->
		<div>
			<a href='#seccion3' data-toggle='collapse' class='btn btn-danger btn-lg'> <span class="glyphicon glyphicon-pencil"></span> Editar Informacion del conductor</a>
			<div class='collapse' id='seccion3'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/actualizar_registro.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Comenzar Evaluacion de Fatiga-->
		<div>
			<a href='#seccion4' data-toggle='collapse' class='btn btn-info btn-lg'><span class="glyphicon glyphicon-play-circle"></span> Comenzar Evaluacion de Fatiga</a>
			<div class='collapse' id='seccion4'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/comenzar_evaluacion.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion Llenar menu interrogatorio-->
		<div>
			<a href='#seccion5' data-toggle='collapse' class='btn btn-warning btn-lg'> <span class="glyphicon glyphicon-list-alt"></span> Llenar menu Interrogatorio</a>
			<div class='collapse' id='seccion5'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/llenar_interrogatorio.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de llenar menu sintomas-->
		<div>
			<a href='#seccion6' data-toggle='collapse' class='btn btn-primary btn-lg'> <span class="glyphicon glyphicon-heart-empty"></span> Llenar menu Sintomas</a>
			<div class='collapse' id='seccion6'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/menu_sintomas.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de llenar menu signos de fatiga-->
		<div>
			<a href='#seccion7' data-toggle='collapse' class='btn btn-default btn-lg'> <span class="glyphicon glyphicon-eye-open"></span> Llenar menu Signos Fatiga</a>
			<div class='collapse' id='seccion7'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/menu_signo.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de como llenar el menu de alteraciones emocionales-->
		<div>
			<a href='#seccion8' data-toggle='collapse' class='btn btn-primary btn-lg'><span class="glyphicon glyphicon-ice-lolly-tasted"></span> Llenar menu Alteraciones Emocional</a>
			<div class='collapse' id='seccion8'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/menu_emocional.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de como hace una evaluacion-->
		<div>
			<a href='#seccion10' data-toggle='collapse' class='btn btn-success btn-lg'> <span class="glyphicon glyphicon-triangle-right"></span> Realizar Evaluacion de Fatiga</a>
			<div class='collapse' id='seccion10'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/realizar_evaluacion.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de descripcion Detallada-->
		<div>
			<a href='#seccion11' data-toggle='collapse' class='btn btn-danger btn-lg'><span class="fa fa-file"></span>  Descripcion Detallada</a>
			<div class='collapse' id='seccion11'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/descripcion_menus.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!---Opcion de las recomendaciones-->
		<div>
			<a href='#seccion12' data-toggle='collapse' class='btn btn-info btn-lg'><span class="glyphicon glyphicon-bookmark"></span>  Recomendaciones</a>
			<div class='collapse' id='seccion12'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/recomendaciones.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de los pilares activos-->
		<div>
			<a href='#seccion13' data-toggle='collapse' class='btn btn-warning btn-lg'><span class="glyphicon glyphicon-flag"></span>  Pilares Activos</a>
			<div class='collapse' id='seccion13'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/pilares_activos.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!-- Opcion de exportar
		<div>
			<a href='#seccion14' data-toggle='collapse' class='btn btn-default btn-lg'><span class="glyphicon glyphicon-circle-arrow-down"></span>  Exportar Evaluacion de Fatiga</a>
			<div class='collapse' id='seccion14'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/exportar_evaluacion.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div> -->

		<!--Opcion de Volver al repetir una evaluacion-->
		<div>
			<a href='#seccion15' data-toggle='collapse' class='btn btn-success btn-lg'><span class="glyphicon glyphicon-repeat"></span>  Volver Hacer otra Evaluacion</a>
			<div class='collapse' id='seccion15'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/volver_hacer_evaluacion.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--Opcion de funciones Evaluador-->
		<div>
			<a href='#seccion16' data-toggle='collapse' class='btn btn-danger btn-lg'><span class="glyphicon glyphicon-user"></span>  Funciones Evaluador</a>
			<div class='collapse' id='seccion16'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/funciones.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>

		<!--como salir de la plataforma-->
		<div>
			<a href='#seccion17' data-toggle='collapse' class='btn btn-info btn-lg'><span class="glyphicon glyphicon-remove"></span> Salir de la Plataforma</a>
			<div class='collapse' id='seccion17'>
				<br>
				<div class='well text-center'>
					<img src="images/Gifs/Evaluador/salir.gif" width="1000" height="500" style="border:2px solid black;">
				</div>
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>