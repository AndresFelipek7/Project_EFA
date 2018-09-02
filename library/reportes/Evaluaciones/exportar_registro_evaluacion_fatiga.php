<?php
	ob_start();
	session_start();
	//Los ../ consiste qen que el archivo conec.php se encuentra a 3 carpetas por fuera de exportar_registro_evaluadores_inactivos.php
	include ("../../../library/conec.php");
	$id_evaluacion = $_GET['id_fa'];
	$query = "SELECT * FROM reporte_evaluacion_fatiga WHERE id_evaluacion = '$id_evaluacion'";
	$result = $conexion -> query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Generar PDF</title>
	<link rel="stylesheet" href="../../../css/style_reporte_pdf.css">
</head>
<body>
	<!--Encabezado del PDF que queda fijo en la parte superior de todas las hojas del pdf-->
	<div id="logo_empresa">
		<img src="../../../images/Logo/11.png" width="50" height="50" class="pull pull-right">
		<center>
			<h2>Reporte de la Evaluacion con ID <?php echo $id_evaluacion; ?></h2>
		</center>
	</div>

	<?php
		foreach ($result as $row){
			$ruta_correcta_foto = '../../../'.$row['foto_conductor'];
			echo "<center>
					<img class='foto_conductor' src='$ruta_correcta_foto' width='200' height='200'><br><hr><br>
			</center>";

			//Informacion del conductor
			echo "<br><br><label><strong>Información del Conductor </strong></label><br><table>
					<tr>
						<th>Campo</th>
						<th>Valor</th>
					</tr>
					<tr>
						<td> ID Evaluacion </td>
						<td> $row[id_evaluacion] </td>
					</tr>
					<tr>
						<td> Fecha - Hora de la Evaluacion </td>
						<td> $row[fecha_hora] </td>
					</tr>
					<tr>
						<td> ID Conductor </td>
						<td> $row[id_conductor] </td>
					</tr>
					<tr>
						<td> Nombre Conductor </td>
						<td> $row[nombre_conductor] </td>
					</tr>
					<tr>
						<td> Apellido Conductor </td>
						<td> $row[apellido_conductor] </td>
					</tr>
					<tr>
						<td> Numero Documento </td>
						<td> $row[numero_documento] </td>
					</tr>
					<tr>
						<td> ID Evaluador </td>
						<td> $row[id_evaluador] </td>
					</tr>
					<tr>
						<td> Destino </td>
						<td> $row[destino] </td>
					</tr>
					<tr>
						<td> distancia del Destino en Kilometros </td>
						<td> $row[distancia_km] </td>
					</tr>
					<tr>
						<td> Tiempo de Llegada al Destino </td>
						<td> $row[tiempo_llegada] </td>
					</tr>
				</table><br><br><hr>";

			//Tabla de los sintomas Seleccionados
			if ($row['ids_sintomas'] == 0) {
				echo "<label><h3>No sea Ingresado Ningin Sintoma.</h3></label>"."<hr>";
			}else {
				include "../Sacar_reporte_ids/convertir_ids_sintomas_exportar.php";
			}

			//Saber si han ingresado otro sintoma en la Evaluacion
			if ($row['cual_otro_sintoma'] != NULL || $row['cual_otro_sintoma'] != "" || $row['cual_otro_sintoma'] != "<br>") {
				echo "<label><strong>Cual otro Sintoma =  </strong></label> $row[cual_otro_sintoma] "."<hr><br><br>";
			}

			//Tabla de signos fatiga
			echo "<center><strong style='font-size:20px;'>Signo de Fatiga</strong></center>"."<br>";
			echo "<ul>
				<li>$row[nombre_signo]</li>
			</ul>";

			//Saber si han ingresado otra Alteracion Emocional en la Evaluacion
			if ($row['cual_otro_emocional'] != NULL || $row['cual_otro_emocional'] != "" || $row['cual_otro_emocional'] != "<br>") {
				echo "<label><strong>Cual otra Alteracion Emocional</strong> : </label> $row[cual_otro_emocional] "."<hr><br><br>";
			}

			//Tabla del nivel de fatiga que tiene
			include "../Sacar_reporte_ids/convertir_ids_nivel_fatiga_exportar.php";

			//Tabla menu interrogatorio
			echo "<center><strong style='font-size:20px;'>Menu Interrogatorio</strong></center><br>
					<table>
						<tr>
							<th>Opcion</th>
							<th>Valor</th>
						</tr>
						<tr>
							<td>Orden Reposo</td>
							<td> $row[orden_reposo]</td>
						</tr>
						<tr>
							<td>Evaluacion Realizada En:</td>
							<td>$row[origen_evaluacion]</td>
						</tr>
						<tr>
							<td>Tiempo de Descanso Inactivo</td>
							<td>$row[horas_descanso] Horas</td>
						</tr>
						<tr>
							"?>
							<?php
								if ($row['horas_camarote'] == 0) {
									//Variables para saber si esta lleno el campo o no
									$valor_horas_camarote = "No hay han ingresado tiempo camarote";
								}else {
									$valor_horas_camarote = $row['horas_camarote'];
								}
							?>
							<?php echo "
							<td>Tiempo de Camarote(En horas)</td>
							<td> $valor_horas_camarote </td>
						</tr>
						<tr>
							<td>Tiempo Conduciendo</td>
							<td> $row[horas_conducidas] Horas</td>
						</tr>
						<tr>
							<td>Recomendacion de horas Conducidas</td>
							<td> $row[sugerencia_horas_conducidas] Minutos</td>
						</tr>
						<tr>
						"?>
							<?php
								if ($row['horas_otra_actividad'] == 0) {
									//Variables para saber si esta lleno el campo o no
									$valor_otra_actividad = "No han ingresado tiempo otra actividad";
									$valor_cual_actividad = "N/A";
								}else {
									$valor_otra_actividad = $row['horas_otra_actividad'];
									$valor_cual_actividad = $row['cual_actividad'];
								}
							?>
							<?php echo "
							<td>Tiempo En otras Actividades</td>
							<td> $valor_otra_actividad</td>
						</tr>
						<tr>
							<td>Cuales Actividades</td>
							<td> $valor_cual_actividad </td>
						</tr>
						<tr>
							<td>Tiempo de Sueño(En Minutos)</td>
							<td> $row[horas_sueno] </td>
						</tr>
						<tr>
							<td>Tiempo de sueño en la manilla(En minutos)</td>
							<td> $row[tiempo_sueno_manilla] </td>
						</tr>
						<tr>
							<td>El conductor con la informacion del sueño dijo la </td>
							<td> $row[respuesta_conductor_sueno] </td>
						</tr>
						<tr>
							<td>Pulsaciones del conductor </td>
							<td> $row[pulsaciones_conductor] </td>
						</tr>
						<tr>
							<td>Tiempo de Descanso</td>
							<td> $row[tiempo_descanso] </td>
						</tr>
						<tr>
						"?>
							<?php
								if ($row['info_copiloto'] == null) {
									//Variables para saber si esta lleno el campo o no
									$valor_info_copiloto = "No hay copiloto en este viaje";
									$valor_origen_copiloto = "N/A";
								}else {
									$valor_info_copiloto = $row['info_copiloto'];
									$valor_origen_copiloto = $row['origen_copiloto'];
								}
							?>
							<?php echo "
							<td>Informacion del copiloto</td>
							<td> $valor_info_copiloto </td>
						</tr>
						<tr>
							<td>Origen del Copiloto</td>
							<td> $valor_origen_copiloto </td>
						</tr>
					</table>";

			//Sacamos fecha actual
			$fecha = date("d-m-Y");
			//Sacamos la hora con la diferencia de 5 horas de mas por la funcion date
			$hora_funcion_date = date("H:i:s");
			//Lo dividimos con la funcion explode
			$sacar_hora = explode(":", $hora_funcion_date);
			//restamos la diferencia
			$hora_actual = $sacar_hora[0] - 5;
			//Si es mayor a 12 significa que debemos cambiar la hora por hora ordinario y no militar para que se entienda mejor
			if ($hora_actual > 12) {
				$hora_actual = $hora_actual - 12;
				$Hora = $hora_actual . ":" . $sacar_hora[1]." PM";
			}else {
				$Hora = $hora_actual . ":" . $sacar_hora[1]." AM";
			}

			$realizado_por = $_SESSION['name_user'];

			echo "<br><br><hr>
					<label> Fecha Realizada:</label> $fecha <br>
					<label> Hora:</label> $Hora <br>
					<label>Ciudad: Bogotá</label><br>
					<label>Reporte Realizad Por : $_SESSION[name_user] </label>
				";
		}
	?>
</body>
</html>
<?php
	//Cargar la libreria
	require_once "../../../library/dompdf/dompdf_config.inc.php";
	//Creamos un nuevo Objeto de la clase DOMPDF()
	$mi_Dompdf = new DOMPDF();
	//Definimos el tamaño del papel y su orientacion
	$mi_Dompdf ->set_paper("A4", "portrait");
	//Cargamos el contenido html
	$mi_Dompdf->load_html(ob_get_clean());
	//Renderizamos el documento html a PDF
	$mi_Dompdf->render();
	//$pdf = $mi_Dompdf->output();
	//Le colocamos un nombre por defecto al archivo PDF descargable
	$filename = "evaluacion $id_evaluacion.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>