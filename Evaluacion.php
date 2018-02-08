<!DOCTYPE html>
<html lang='en'>
<head>
	<title>Registro | Evaluacion</title>
	<?php include 'library/Head/Head_common.php'; ?>
	<?php
		//Esta variable nos sirve para impedir la recarga de la pagina del formulario para que no se duplique la evaluacion en la BD
		//Cuando aqui se envie la evaluacion a registro evaluacion va la variable global Verificar en 1 para saber que se envio solo una vez
		$verificar_recarga = 1;
		$_SESSION["verificar"] = 0;
		$_SESSION["verificar"] = $verificar_recarga;
	?>
</head>
<body>
	<?php include 'library/Head/Header-main.php'; ?>

	<?php
		//Variable de sesion para saber cuando inicio la evaluacion el evaluador para hacer una validacion de seguridad de forma interna
		$_SESSION['tiempo_inicio'] = date("i:s");
	?>

	<div class='container text-center'>
		<div class="row">
			<h2>EFA</h2>
			<h5 class="mensaje_actualiza_info_conductor"><strong>*Se recomienda Mirar el porcentaje de la bateria de la manilla , si esta por debajo del 15% se debe Cargar Inmediatamente*</strong></h5>
		</div>
	</div><br><br>

	<!-- contenedor de los menus de la evaluacion -->
	<div class='container'>
		<!--Contenedor donde se encuentran todos los menus-->
		<div class='panel-group container col-md-8' role='tablist' aria-multiselectable='true'>

			<!--CONTENEDOR MENU SIGNOS FATIGA-->
			<form action="registro_Evaluacion.php" method="POST">
				<div class='panel panel-warning text-center'>
					<div class='panel-heading' role='tab' id='headingThree'>
						<h4 class='panel-title'>
							<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse4' aria-expanded='false' aria-controls='collapseThree'>
								<span class="glyphicon glyphicon-eye-open"> Signos</span>
							</a>
						</h4>
					</div>

					<div id='collapse4' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
						<div class='panel-body text-center'>
							<button type="button" class="btn btn-md btn-primary" id="ayuda_signo" data-toggle="tooltip" data-placement="right" title="Los signos de fatiga es lo que se puede medir mediante algun instrumento con ese objetivo"><span class="fa fa-info"></span></button><br>
							<a href="#sincronizar_manilla" data-toggle='modal' class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span></a>
							<a href="#usuario_contraseña_conductor" data-toggle='modal' class="btn btn-warning"><span class="glyphicon glyphicon-user"></span></a>
							<br>
							<?php include 'library/listas dinamicas/lista_Dinamica_signos.php';?>
							<hr>
							<?php
								$traer_id_conductor = $_POST['valor_id'];

								$consulta_Traer_pass_user_fit = "SELECT usuario_fit , pass_fit FROM conductor WHERE id_conductor = '$traer_id_conductor'";
								$resultado_fit = $conexion ->query($consulta_Traer_pass_user_fit);
								$count_fit = $resultado_fit->num_rows;

								if($count_fit >= 1) {
									$fila = mysqli_fetch_array($resultado_fit);
									$traer_usuario = $fila["usuario_fit"];
									$traer_contraseña = $fila["pass_fit"];
								}
							?>
							<div>
								<div class="col-md-12">
									<button type="button" class="btn btn-md btn-primary" id="ayuda_sueño_profundo" data-toggle="tooltip" data-placement="left" title="Sueño profundo consiste en el tiempo en que el conductor a dormido profundamente para poder descansar lo mas posible"><span class="fa fa-info"></span></button>
									<center>
										<label>Sueño Profundo </label><br>
										<select id="sueño_profundo" name="sueño_profundo" onchange="show_container_checked();">
											<option value="hora">Solo hora</option>
											<option value="minutos">Minutos</option>
											<option value="ambos">Hora y minutos</option>
										</select><br><br>

										<div id="container_deep_sleep">
											<input type="text" class="form-control" name="horas" placeholder="Ingreso Hora">
										</div>
									</center>
									<hr>
								</div>

								<div class="col-md-12">
									<button type="button" class="btn btn-xs btn-primary" id="ayuda_pulsaciones" data-toggle="tooltip" data-placement="left" title="Las pulsaciones es el pulso que presente el conductor durante la evaluacion de fatiga , si por alguna razon las pulsaciones superan las 100 por minuto es necesario repetir la medicion de las pulsaciones para estar seguros"><span class="fa fa-info"></span></button>
									<center>
										<label>Valor Pulsaciones </label>
										<input type="text" name="pulsaciones" class="form-control" id="pulsaciones" placeholder="Ingrese valor numerico" onkeypress="return justNumbers(event);" onchange="limit_pulsation_hearth();">
										<a href="#ayuda_pulsaciones_completo" data-toggle='modal'>Como llenar este campo</a><br><br>
									</center>
									<hr>
								</div>

								<div class="col-md-12">
									<div id="container_extensiones_agree" class="center_element"></div>
									<center>
										<label>Cargar Descargable Mi Fit</label>
										<input type="file" name="photo" id="descargable_fit" onchange="check_photo(this.form.photo.value,'evaluacion');">
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class='text-center'>
					<button class='btn btn-success' type='submit' id="enviar_evaluacion" name="enviar_evaluacion"><span class="glyphicon glyphicon-ok"></span> </button>
					</center>
				</div>
			</form>
		</div>

		<!--Aqui colocamos la informacion del conductor al lado derecho-->
		<aside class='col-md-4'>
			<a href='#seccion' data-toggle='collapse' class='btn btn-success' id="aside_conductor"><span class="glyphicon glyphicon-chevron-down" id="text_aside_info_driver"> Mostrar Informacion del Conductor</span></a>

			<div class='collapse' id='seccion'>
				<br>
				<div class='well text-center'>
					<?php
						$consulta_conductor = "SELECT * FROM reporte_conductor_activo WHERE id_conductor = '$traer_id_conductor'";
						$resultado = $conexion -> query($consulta_conductor);
						$count = $resultado->num_rows;

						if($count >=1) {
							$row = mysqli_fetch_array($resultado);
							$_SESSION["foto"] = $row['foto'];
							$_SESSION["registro"]= $row['id_conductor'];
							$_SESSION["nombre"] = $row['nombre'];
							$_SESSION["apellido"] = $row['apellido'];
							$_SESSION["documento"] = $row['documento'];
							$_SESSION["edad"] = $row['edad'];
							$_SESSION["telefono"] = $row['telefono'];
							$_SESSION["placa"] = $row['Placa'];
						}
					?>

					<img width="100"  height="100" src="<?php echo $_SESSION['foto']; ?>" class="foto_generica"><br><br>
					<label>Nombre = </label> <?php echo $_SESSION["nombre"] ?><br>
					<label>Apellido = </label> <?php echo $_SESSION["apellido"] ?><br>
					<label>Numero Documento = </label> <?php echo $_SESSION["documento"] ?><br>
					<label>Edad = </label> <?php echo $_SESSION["edad"] ?><br>
					<label>Telefono = </label> <?php echo $_SESSION["telefono"] ?><br>
					<label>Placa = </label> <?php echo $_SESSION["placa"] ?><br>
				</div>
			</div>
		</aside>
	</div>

	<!--Modal para la ayuda de como llenar el campo de tiempo de sueño , que el formato sea el correcto y el permitido-->
	<div class="modal fade" id="ayuda_completa_sueño_manilla">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-info"> Ayuda Sueño Profundo</span></h4>
				</div>

				<div class="modal-body text-center">
					<h2>Pasos para llenar el campo sueño Profundo correctamente</h2>
					<p>Antes que nada debe de iniciar sesion en la Aplicacion mi Fit en su celular para obtener los datos</p>
					<label><strong>Paso 1:</strong></label> El celular sincronizara automaticamente con la manilla <br>
					<label><strong>Paso 2:</strong></label> Buscar el historial de sueño profundo en el menu principal del dia anterior al de la evaluacion <br>
					<label><strong>Paso 3:</strong></label> Colocar el valor del sueño profundo en el campo asignado
					<hr>
					<h3>formato Valido Para ingresar en el campo Tiempo de Sueño</h3>
					<label>Vamos a colocar un ejemplo:</label><br>
					<label></label> En la aplicacion Mi fit encontro el tiempo de sueño profundo que es : 4 h 20 min
					<p>El 4 Significa la cantidad de horas</p>
					<p>El 20 Significa los minutos</p>
					<label></label>Para colocar ese valor en el campo asignado hay que agregar los numeros de la siguiente forma:
					<label><strong>4.20</strong></label> = Esto significa 4 horas y 20 minutos
					<hr>
						<label><strong>En el caso que solo encuentre minutos hay que colocarlo de la siguiente forma</strong></label><br>
						<label><strong>.35</strong></label>  = Que significa que son 35 minutos
					<hr>
					<h3 class="input_obligatory">No hay que agregar ninguna letra u otro caracter en el campo tiempo de sueño</h3>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal para la ayuda de como llenar el campo de las pulsaciones-->
	<div class="modal fade" id="ayuda_pulsaciones_completo">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-info"> Ayuda Pulsaciones</span></h4>
				</div>

				<div class="modal-body text-center">
					<h2>Pasos para llenar el campo Pulsaciones correctamente</h2>
					<p>Antes que nada debe de iniciar sesion en la Aplicacion mi Fit en su celular para obtener los datos</p>
					<label><strong>Paso 1:</strong></label> El celular automaticamente va ha sincronizar con la manilla <br>
					<label><strong>Paso 2:</strong></label> Buscar en el menu principal tomar pulso inmediatamente<br>
					<label><strong>Paso 3:</strong></label> Esperar el valor que le dice unos segundos
					<hr>
					<h3>formato Valido Para ingresar las pulsaciones</h3>
					<label>Vamos a colocar un ejemplo:</label><br>
					<label></label> En la aplicacion Mi fit encontro que las pulsaciones dieron : 80 por minuto <br>
					<label></label>Para colocar ese valor en el campo asignado hay que agregar los numeros de la siguiente forma:
					<label><strong>Colocar 80 en el campo pulsaciones</strong></label>
					<hr>
					<h3 class="input_obligatory">No hay que agregar ninguna letra u otro caracter en el campo pulsaciones</h3>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal para como sincronizar la manilla con la app mi fit-->
	<div class="modal fade" id="sincronizar_manilla">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-info"> Sincronizar la Manilla</span></h4>
				</div>

				<div class="modal-body text-center">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Pasos para Sincronizar</h3>
						</div>
						<div class="panel-body">
							<label><strong>Paso 1:</strong></label> Abrir la aplicacion mi fit en su Celular<br>
						<label><strong>Paso 2:</strong></label> Ingresar usuario y contraseña del conductor al que se le esta haciendo la evaluacion de fatiga<br>
						<label><strong>Paso 3:</strong></label> Ir al menu principal de la aplicacion mi fit , en el apartado de sincronizar manilla en el menu principal <br>
						<label><strong>Paso 4:</strong></label> Esperar unos segundos hasta que sincronice toda la informacion <br>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--Modal para mostrar usuario y contraseña del conductor-->
	<div class="modal fade" id="usuario_contraseña_conductor">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-info"> Credenciales del Conductor</span></h4>
				</div>

				<div class="modal-body text-center">
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Usuario</h3>
								</div>
								<div class="panel-body">
									<label><?php echo $traer_usuario; ?></label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">Contraseña</h3>
								</div>
								<div class="panel-body">
									<label><?php echo $traer_contraseña; ?></label>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<?php include 'library/Footer.php'; ?>
</body>
</html>