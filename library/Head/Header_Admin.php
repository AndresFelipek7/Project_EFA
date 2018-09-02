<header id="main-header">
	<div class="container text-center">
		<div class="row">
			<div class="col-xs-5 col-sm-4">
				<div id="main-logo">
					<a href="main_admin.php">
						<img src="images/Logo/11.png" class="logo_app">
						Evaluacion de Fatiga
					</a>
				</div>
			</div>

			<div class="col-xs-7 col-sm-8">
				<ul id="main-menu" class="nav nav-pills hidden-xs">
					<li class="active"><a href="main_admin.php"><span class="glyphicon glyphicon-flag"></span> INICIO</a></li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span> OPCIONES <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="Evaluadores.php"> <span class="fa fa-user"></span> Evaluadores</a></li>
							<li><a href="Conductores.php"><span class="fa fa-bus"></span> Conductores</a></li>
							<li class="divider"></li>
							<li><a href="administrador.php"><span class="glyphicon glyphicon-send"></span> Administradores</a></li>
							<li class="divider"></li>
							<li><a href="rutas.php"><span class="glyphicon glyphicon-transfer"></span> Rutas</a></li>
							<li><a href="empresas.php"><span class="glyphicon glyphicon-tag"></span> Empresas</a></li>
							<li><a href="vehiculos.php"> <span class="fa fa-car"></span> Vehiculos</a></li>
							<li class="divider"></li>
							<li><a href="t_documento.php"><span class="fa fa-image"></span> Tipo Documentos</a></li>
							<li><a href="perfil.php"><span class="fa fa-fire"></span> Roles</a></li>
							<li class="divider"></li>
							<li><a href="sintomas.php"> <span class="fa fa-heart"></span> Sintomas</a></li>
							<li><a href="signos.php"> <span class="glyphicon glyphicon-eye-open"> Signos</a></li>
							<li><a href="a_emocional.php"><span class="fa fa-thumbs-up"> Alteraciones Emocionales</span></a></li>
							<li><a href="sugerencia.php"><span class="fa fa-bell"> Sugerencias</span></a></li>
							<li class="divider"></li>
							<li><a href="evaluacion_Admin.php"><span class="fa fa-history"> Evaluacion de Fatiga</span></a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> AYUDA<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="funciones_Admin.php"><span class="glyphicon glyphicon-flag"></span> Funciones del Administrador</a></li>
							<li><a href="manual_Admin.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Manual de Usuario</a></li>
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

<script src="js/sweetalert.min.js"></script>

<!--Hacemos el enlace con este archivo para dejar todas a las consultas necesarias y los totales de la tabla-->
<?php require_once "consultas_Admin.php"; ?>

<?php require_once "methods_backend.php"; ?>