<header id="main-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-5 col-sm-4">
				<h1 id="main-logo"><a href="test.php"><img src="images/Logo/11.png" class="logo_app"> Evaluacion de Fatiga </a></h1>
			</div>
			<div class="col-xs-7 col-sm-8">
				<ul id="main-menu" class="nav nav-pills hidden-xs">
					<li class="active"><a href="test.php"><span class="glyphicon glyphicon-send"></span> TEST</a></li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> AYUDA <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="funciones_Evaluador.php"><span class="glyphicon glyphicon-fire"></span> Funciones</a></li>
						</ul>
					</li>
					<li><a href="salir.php"><span class="glyphicon glyphicon-remove-circle"></span> CERRAR SESION <?php echo strtoUpper($_SESSION['name_user']); ?> </a></li>
				</ul>
				<a href="#" id="mobile-menu-button" class="btn btn-default visible-xs">
					<span class="glyphicon glyphicon-th-list"></span>
				</a>
			</div>
		</div>
	</div>
</header>

<?php
	require_once "methods_backend.php";
?>