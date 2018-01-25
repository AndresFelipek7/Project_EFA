<!DOCTYPE html>
<html lang="en">
<head>
	<title>Funciones | Administrador</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--Contenedor de todas las funciones Admin-->
	<div class="jumbotron">
		<div class="container text-center">
			<h1> <span class="glyphicon glyphicon-pushpin"></span> Funciones Administrador</h1>
			<hr>
			<p><span class="glyphicon glyphicon-knight"></span> Crear Nuevos Evaluadores</p>
			<p><span class="glyphicon glyphicon-knight"></span> Editar la informacion de los evaluadores</p>
			<p><span class="glyphicon glyphicon-knight"></span> Exportar todos los evaluadores</p>
			<p><span class="glyphicon glyphicon-knight"></span> Activar Evaluadores Inactivos</p>
			<p><span class="glyphicon glyphicon-knight"></span> Exportar la informacion de un solo Evaluador</p>
			<p><span class="glyphicon glyphicon-knight"></span> Buscar Evaluadores por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-pawn"></span> Crear Nuevos Conductores</p>
			<p><span class="glyphicon glyphicon-pawn"></span> Editar la informacion de los Conductores</p>
			<p><span class="glyphicon glyphicon-pawn"></span> Exportar todos los Conductores</p>
			<p><span class="glyphicon glyphicon-pawn"></span> Activar Conductores Inactivos</p>
			<p><span class="glyphicon glyphicon-pawn"></span> Exportar la informacion de un solo Conductores</p>
			<p><span class="glyphicon glyphicon-pawn"></span> Buscar Conductores por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-queen"></span> Editar la informacion de los Administradores</p>
			<p><span class="glyphicon glyphicon-queen"></span> Exportar todos los Administradores</p>
			<p><span class="glyphicon glyphicon-queen"></span> Exportar la informacion personal de un solo Administrador</p>
			<p><span class="glyphicon glyphicon-queen"></span> Buscar Administradores por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-king"></span> Crear nuevas rutas de transporte</p>
			<p><span class="glyphicon glyphicon-king"></span> Editar la Informacion de Rutas Existentes</p>
			<p><span class="glyphicon glyphicon-king"></span> Exportar Todas las rutas Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-king"></span> Exportar la informacion de una sola ruta</p>
			<p><span class="glyphicon glyphicon-king"></span> Buscar Rutas por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-bishop"></span> Crear nuevas Empresas</p>
			<p><span class="glyphicon glyphicon-bishop"></span> Editar la Informacion de las Empresas Existentes</p>
			<p><span class="glyphicon glyphicon-bishop"></span> Exportar Todas las Empresas Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-bishop"></span> Exportar la informacion de una sola Empresa</p>
			<p><span class="glyphicon glyphicon-bishop"></span> Buscar Empresas por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-flash"></span> Crear nuevas Vehiculos al sistema</p>
			<p><span class="glyphicon glyphicon-flash"></span> Editar la Informacion de los Vehiculos Existentes</p>
			<p><span class="glyphicon glyphicon-flash"></span> Exportar Todas los Vehiculos Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-flash"></span> Exportar la informacion de una sola Vehiculo</p>
			<p><span class="glyphicon glyphicon-flash"></span> Buscar Vehiculos por diferentes parametros</p><br><hr>
			
			<p><span class="glyphicon glyphicon-ok"></span> Crear nuevas Tipo Documento al sistema</p>
			<p><span class="glyphicon glyphicon-ok"></span> Editar la Informacion de los tipo Documento Existentes</p>
			<p><span class="glyphicon glyphicon-ok"></span> Exportar Todas los Tipo documento Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-ok"></span> Exportar la informacion de una sola Tipo documento</p>
			<p><span class="glyphicon glyphicon-ok"></span> Buscar Tipo Documento por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-home"></span> Crear nuevas Roles al sistema</p>
			<p><span class="glyphicon glyphicon-home"></span> Editar la Informacion de los Roles Existentes</p>
			<p><span class="glyphicon glyphicon-home"></span> Exportar Todas los roles Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-home"></span> Exportar la informacion de una sola rol</p>
			<p><span class="glyphicon glyphicon-knight"></span> Buscar Roles por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-star"></span> Crear nuevas Sintomas al sistema</p>
			<p><span class="glyphicon glyphicon-star"></span> Editar la Informacion de los Sintomas Existentes</p>
			<p><span class="glyphicon glyphicon-star"></span> Exportar Todos los sintomas Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-star"></span> Exportar la informacion de una sola Sintoma</p>
			<p><span class="glyphicon glyphicon-knight"></span> Buscar Sintomas por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-star-empty"></span> Crear nuevas Signos de Fatiga al sistema</p>
			<p><span class="glyphicon glyphicon-star-empty"></span> Editar la Informacion de los Signos Existentes</p>
			<p><span class="glyphicon glyphicon-star-empty"></span> Exportar Todos los Signos Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-star-empty"></span> Exportar la informacion de una sola Signo</p>
			<p><span class="glyphicon glyphicon-knight"></span> Buscar Signos por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-cloud"></span> Crear nuevas Alteraciones Emocionales al sistema</p>
			<p><span class="glyphicon glyphicon-cloud"></span> Editar la Informacion de las Alteraciones Emocionales Existentes</p>
			<p><span class="glyphicon glyphicon-cloud"></span> Exportar Todas las Alteraciones emocionales Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-cloud"></span> Exportar la informacion de una sola Alteracion Emocional</p>
			<p><span class="glyphicon glyphicon-knight"></span> Buscar Alteraciones Emocionales por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-road"></span> Crear nuevas ALteraciones Neurologicas al sistema</p>
			<p><span class="glyphicon glyphicon-road"></span> Editar la Informacion de las Alteraciones Neurologicas Existentes</p>
			<p><span class="glyphicon glyphicon-road"></span> Exportar Todas Las lateraciones Neurologicas Ingresadas en PDF</p>
			<p><span class="glyphicon glyphicon-road"></span> Exportar la informacion de una sola alteracion neurologica</p>
			<p><span class="glyphicon glyphicon-knight"></span> Buscar Alteraciones Neurologias por diferentes parametros</p><br><hr>

			<p><span class="glyphicon glyphicon-flag"></span> Asociar nuevas Sugerenias al sistema</p>
			<p><span class="glyphicon glyphicon-flag"></span> Editar las Sugerencias ingresadas al sistema</p>
			<p><span class="glyphicon glyphicon-flag"></span> Exportar todas las sugerencias agrupadas por menu</p><br><hr>

			<p><span class="glyphicon glyphicon-tag"></span> Ver todas las evaluaciones realizadas filtrado por las mas recientes</p>
			<p><span class="glyphicon glyphicon-tag"></span> Poder Exportar una evaluacion con todos sus detalles</p><br><hr>

		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>