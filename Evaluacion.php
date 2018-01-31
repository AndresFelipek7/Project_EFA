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

			<!--CONTENEDOR DE INFORMACION GENERAL-->
			<div class='panel panel-info text-center'>
				<div class='panel-heading' role='tab' id='headingOne'>
					<h4 class='panel-title'>
						<a  role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
							<span class="glyphicon glyphicon-bookmark"> Informacion General</span>
						</a>
					</h4>
				</div>

				<div id='collapseOne' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>
					<div class='panel-body'>
						<div>
							<div class="col-md-6">
								<label> <span class="glyphicon glyphicon-screenshot"></span> Fecha: </label>
								<script>
									var meses = new Array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
									var diasSemana = new Array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
									var f = new Date();
									document.write(diasSemana[f.getDay()] + ', ' + f.getDate() + ' de ' + meses[f.getMonth()] + ' de ' + f.getFullYear());
								</script><br>
							</div>
							<div class="col-md-6">
								<label> <span class="fa fa-bell"></span> Hora: </label>
								<script>
									var separador = ":";
									var crear_objeto_date = new Date();
									var traer_hora = crear_objeto_date.getHours();
									var traer_minuto = crear_objeto_date.getMinutes();
									var meridiano = " am";

										//Para identificar cuando son las 12 del dia y no aparezca AM
										if(traer_hora == 12) {
											meridiano = " pm";
										}

										//Para que cuando pase las 12 no nos de la hora militar
										if(traer_hora > 12){
											traer_hora -= 12;
											meridiano = " pm";
										}

										//Para cuando las horas son menor a 10 horas
										if (traer_hora < 10) {
											traer_hora = "0" + traer_hora;
										}

										if (traer_minuto < 10) {
											traer_minuto = "0" + traer_minuto;
										}

										var hora_final = traer_hora + separador + traer_minuto + meridiano;
										document.write(hora_final);
									</script>
							</div>
						</div>
					</div>
				</div>
			</div>

			<form action="registro_Evaluacion.php" method="POST">

				<!--CONTENEDOR MENU ALTERACIONES EMOCIONALES-->
				<div class='panel panel-warning text-center'>
					<div class='panel-heading' role='tab' id='headingThree'>
						<h4 class='panel-title'>
							<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse5' aria-expanded='false' aria-controls='collapseThree'>
								<span class="fa fa-thumbs-up"> Alteraciones Emocionales</span>
							</a>
						</h4>
					</div>

					<div id='collapse5' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingThree'>
						<div class='panel-body text-center style_check_emocional'>
							<button type="button" class="btn btn-md btn-primary" id="ayuda_a_emocional" data-toggle="tooltip" data-placement="right" title="Son los estado emocionales como se encuentra el conductor en el momento de la evaluacion"><span class="fa fa-info"></span></button>
							<h4>Seleccion Multiple</h4>
							<hr>
							<?php
								include "library/checkbox dinamicos/checkbox_a_emocional.php";
							?>
							<input type='checkbox' name='alteraciones_emocionales[]' id="otra_a_emocional" value="otra_a_emocional" onclick="mostrar_otra_alteraciones_emocionales();">
							<label for="otra_a_emocional">Otra Alteracion Emocional</label>

							<div id="contenedor_alteracines_emocionales" style="display:none;">
								<textarea  name="otra_alteracion_emocional" placeholder="Colocar cuales Alteraciones Emocionales" cols="60" rows="5" onkeypress='return onlyWords(event)'></textarea>
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
			<a href='#seccion' data-toggle='collapse' class='btn btn-success' id="aside_conductor"><span class="glyphicon glyphicon-chevron-down"> Mostrar Informacion del Conductor</span></a>
			<div class='collapse' id='seccion'>
				<br>
				<div class='well text-center'>
					<?php
					//La variable traer_id_conductor se encuentra en el modulo se signo de fatiga
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
						$_SESSION["fecha_nacimiento"] = $row['nacimiento'];
						$_SESSION["empresa"] = $row['Empresa'];
						$_SESSION["placa"] = $row['Placa'];
						$_SESSION["eps"] = $row['eps'];
						$_SESSION["arp"] = $row['arp'];
					}
					?>

					<label>Registro # </label> <?php echo $_SESSION["registro"]; ?><br><hr>
					<img width="100"  height="100" src="<?php echo $_SESSION['foto']; ?>" class="foto_generica"><br><br>
					<label>Nombre = </label> <?php echo $_SESSION["nombre"] ?><br>
					<label>Apellido = </label> <?php echo $_SESSION["apellido"] ?><br>
					<label>Numero Documento = </label> <?php echo $_SESSION["documento"] ?><br>
					<label>Edad = </label> <?php echo $_SESSION["edad"] ?><br>
					<label>Telefono = </label> <?php echo $_SESSION["telefono"] ?><br>
					<label>Fecha de Nacimiento = </label> <?php echo $_SESSION["fecha_nacimiento"] ?><br>
					<label>Empresa = </label> <?php echo $_SESSION["empresa"] ?><br>
					<label>Placa = </label> <?php echo $_SESSION["placa"] ?><br>
					<label>EPS = </label> <?php echo $_SESSION["eps"] ?><br>
					<label>ARP = </label> <?php echo $_SESSION["arp"] ?><br>
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
					<h3 style="color:red;">No hay que agregar ninguna letra u otro caracter en el campo tiempo de sueño</h3>
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
					<h3 style="color:red;">No hay que agregar ninguna letra u otro caracter en el campo pulsaciones</h3>
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