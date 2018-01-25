<!DOCTYPE html>
<html lang="en">
<head>
	<title> Menú Inicio</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header.php'; ?>

	<!--Contenedor donde se encuentra las imagenes de inicio al proyecto-->
	<div class="container">
		<br>
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-1" data-ride="carousel">
				<!-- Indicadores -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-1" data-slide-to="1"></li>
					<li data-target="#carousel-1" data-slide-to="2"></li>
				</ol>

				<!-- Contenedor de los Slide -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="Images/Index/volante.jpg" alt="imagen_volante" class="img-responsive size_image_carrusel">
						<div class="carousel-caption hidden-xs hidden-sm">
						</div>
					</div>

					<div class="item">
						<img src="Images/Index/conductor.jpg" alt="imagen_conductor" class="img-responsive size_image_carrusel">
						<div class="carousel-caption hidden-xs hidden-sm">
						</div>
					</div>

					<div class="item">
						<img src="Images/Index/manilla.png" alt="imagen_manilla" class="img-responsive size_image_carrusel">
						<div class="carousel-caption hidden-xs hidden-sm">
						</div>
					</div>
				</div>

				<!-- Controles -->
				<a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>

				<a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				</a>
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>