<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menú | Inicio</title>
	<?php include 'library/Head/Head_common.php'; ?>
</head>
<body>
	<?php include 'library/Head/Header_Admin.php'; ?>

	<!--MESAJE DE BEINVENIDO PARA EL ADMINISTRADOR-->
	<div class="jumbotron">
		<div class="container text-center">
			<?php
				$traer_Seleccion_Sexo = "SELECT Sexo,foto FROM datos_basicos WHERE id_datos = '$_SESSION[idDatos]'";
				$resultado = $conexion ->query($traer_Seleccion_Sexo) or die("Se ha presentado un error en la carga de la pagina , por favor volver a intentar");
				$count = $resultado->num_rows;

				if ($count >= 1) {
					$row_Sexo = mysqli_fetch_array($resultado);
					$Sexo_Seleccionado_es = $row_Sexo["Sexo"];
					$foto_admin = $row_Sexo["foto"];

					//Condicional para saber si el admin tiene foto o se le ha colcoado una foto generica
					if ($foto_admin == "contenido/Foto Generica.png") {
						if ($Sexo_Seleccionado_es == "M") {
							echo "<h1>Bienvenido Administrador  $_SESSION[name_user] </h1>";
						}else {
							echo "<h1>Bienvenida Administradora  $_SESSION[name_user] </h1>";
						}
					}else if ($Sexo_Seleccionado_es == "M") {
						echo "<img width='200' height='200'src='$foto_admin' class='foto_admin'><br>";
						echo "<h1>Bienvenido Administrador  $_SESSION[name_user] </h1>";
					}else {
						echo "<img width='200' height='200'src='$foto_admin' class='foto_admin'><br>";
						echo "<h1>Bienvenida Administradora  $_SESSION[name_user] </h1>";
					}
				}else {
					echo "Se ha presentado un error en la carga de la pagina , por favor volver a intentar";
				}

			?>
			<label> <span class="glyphicon glyphicon-screenshot"></span> Fecha = </label>
			<script>
				var meses = new Array ('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
				var diasSemana = new Array('Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado');
				var f = new Date();
				document.write(diasSemana[f.getDay()] + ', ' + f.getDate() + ' de ' + meses[f.getMonth()] + ' de ' + f.getFullYear());
			</script><br>
			<label> <span class="fa fa-bell"></span> Hora = </label>
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

	<!--CONTENEDOR DONDE APARECE LAS NOTAS IMPORTANTES QUE TIENE EL ADMINISTRADOR-->
	<div class="container">
		<center>
			<div class="row">
				<div class="col-md-12">
					<a href='#info_admin' data-toggle='modal' class="btn btn-default btn-lg fa fa-bookmark fa-2x"></a>
					<a href='#notas_admin' data-toggle='modal' class="btn btn-primary btn-lg fa fa-book fa-2x"></a>
				</div>
			</div>
		</center>
	</div>

	<!--MODAL CUANDO SE MUESTRA LA INFO DEL ADMINISTRADOR-->
	<div class="modal fade" id="info_admin">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="fa fa-bookmark"> Informacion del Administrador</span></h4>
				</div>

				<div class="modal-body">
					<?php
						$consulta_Traer_info_Admin = "SELECT * FROM datos_basicos WHERE id_datos = '$_SESSION[idDatos]'";
						$resultado = $conexion ->query($consulta_Traer_info_Admin);
						$count = $resultado->num_rows;

						if($count >= 1) {
							$row = mysqli_fetch_array($resultado);

							$_SESSION['idDatos'] = $row['id_datos'];
							$nombre = $row['nombre'];
							$apellido = $row['apellido'];
							$documento = $row['documento'];
							$sexo = $row['Sexo'];
							$edad = $row['edad'];
							$telefono = $row['telefono'];
							$correo = $row['correo'];
							$fecha_nacimiento = $row['fecha_nacimiento'];
							$foto = $row['foto'];
						}

						//Condicional para poder color el texto correcto del tipo de sexo seleccionado
						if ($sexo == "M") {
							$valor_Sexo_Seleccionado = "Masculino";
						}else {
							$valor_Sexo_Seleccionado = "Femenino";
						}

						echo "	<center>
									<img width='200' height='200'src='$foto' class='foto_generica'><br><hr>
									<label>Nombre = </label> $nombre<br>
									<label>Apellido = </label> $apellido<br>
									<label>Documento = </label> $documento<br>
									<label>Edad = </label> $edad<br>
									<label>Sexo = </label> $valor_Sexo_Seleccionado<br>
									<label>Telefono = </label> $telefono<br>
									<label>Correo = </label> $correo<br>
									<label>Fecha de Nacimiento = </label> $fecha_nacimiento<br>
								</center>
							";
					?>
				</div>

				<div class="modal-footer">
					<button type="button" data-dismiss="modal" class="btn btn-danger glyphicon glyphicon-remove"> </button>
				</div>
			</div>
		</div>
	</div>

	<!--MODAL CUANDO SE MUESTRA LAS NOTAS DEL ADMIN-->
	<div class="modal fade" id="notas_admin">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><span class="glyphicon glyphicon-bookmark"> Anotaciones del Administrador</span></h4>
				</div>

				<div class="modal-body">
					<?php
						$traer_Notas_Bd = "SELECT notas_importantes FROM usuario WHERE id_datos = '$_SESSION[idDatos]'";
						$resultado = $conexion ->query($traer_Notas_Bd);
						$count = $resultado->num_rows;

						if($count >= 1) {
							$fila = mysqli_fetch_array($resultado);
							$notas_desde_Bd = $fila["notas_importantes"];
						}
					?>
					<center>
						<div id="container_response_note"></div>
						<textarea cols="60" rows="15" class="anotaciones_admin" name="nota_admin" id="nota_admin" placeholder="Ingresar cosas importantes" onchange="save_notes_admin();"><?php echo $notas_desde_Bd; ?></textarea>
					</center>
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