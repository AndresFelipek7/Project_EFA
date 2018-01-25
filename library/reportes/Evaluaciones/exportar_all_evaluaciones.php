<?php
	ob_start();
	session_start();
	//El ../Significa que el archivo que se va incuir esta en 2 carpetas por fuera de este archivo que es exortar_all_evaluadores.php
	include ("../../conec.php");
	$fecha_inicio = $_GET['date_began'];
	$fecha_final = $_GET['date_finish'];
	$fecha_general = $_GET["date_common"];
	$query = "SELECT * FROM reporte_evaluacion_fatiga WHERE fecha_hora BETWEEN '$fecha_inicio' AND '$fecha_final'";
	$result = $conexion -> query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Generar PDF</title>
	<link rel="stylesheet" href="../../../css/style_reporte_pdf.css">
</head>
<body>
	<!--Encabezado del PDF que queda fijo en la parte superior de todas las hojas del pdf-->
	<div id="logo_empresa">
		<img src="../../../images/Logos Empresa/icono_empresa1.PNG">
		<img src="../../../images/Logos Empresa/icono_empresa2.PNG">
		<h1 class="titulo">Reporte Evaluaciones del <strong> <?php echo $fecha_general; ?> </strong></h1>
	</div>

	<h3>Total Evaluaciones del Dia: <?php echo $_SESSION['all_day']; ?></h3>
	<table>
		<tr>
			<th>ID Evaluacion</th>
			<th>ID conductor</th>
			<th>Foto Conductor</th>
			<th>Nombre Conductor</th>
			<th>Apellido Conductor</th>
			<th>Documento Conductor</th>
			<th>ID Evaluador</th>
			<th>Nivel de Fatiga</th>
		</tr>
		<?php
			//Mostramos los resultado sd el BD con la variable $row que fue asignada por $result
			foreach ($result as $row ) {
				$ruta_correcta_foto = "../../../".$row['foto_conductor'];
			?>
		<tr>
			<td><?php echo $row['id_evaluacion']; ?></td>
			<td><?php echo $row['id_conductor']?></td>
			<td><img src="<?php echo $ruta_correcta_foto; ?>" width='100' height='100'></td>
			<td><?php echo $row['nombre_conductor']; ?></td>
			<td><?php echo $row['apellido_conductor']; ?></td>
			<td><?php echo $row['numero_documento']; ?></td>
			<td><?php echo $row['id_evaluador']; ?></td>
			<td>
				<?php
					//Sacamos el valor del nivel de fatiga para poder mostrar un mensaje en letras y no el numero que no es descripctivo
					$valor_nivel_fatiga = $row['nivel_fatiga'];

					if ($valor_nivel_fatiga == 1) {
						echo "Bajo";
					}elseif ($valor_nivel_fatiga == 2) {
						echo "Medio";
					}else {
						echo "Alto";
					}
				?>
			</td>
		</tr>
		<?php
			}
		?>
	</table>

	<hr>
	<!--Colocamos el pie de la pagina del pdf-->
		<?php
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
		?>
		<label> Fecha Realizada:</label> <?php echo $fecha; ?><br>
		<label> Hora:</label> <?php echo $Hora; ?><br>
		<label>Ciudad: Bogotá</label><br>
		<label>Reporte Realizad Por : <?php echo $realizado_por ?></label>
	<hr>
</body>
</html>
<?php
	//Cargar la libreria
	require_once "../../dompdf/dompdf_config.inc.php";
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
	$filename = "Reporte_Evaluaciones_$fecha_general.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>
