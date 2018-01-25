<?php
	//Inicializamos la libreria dompdf
	ob_start();
	//incluimos la conexion de la BD
	include "library/conec.php";

	$id_conductor = $_GET['id_con'];
	$pilar1 = $_GET['pilar1'];
	$pilar2 = $_GET['pilar2'];
	$pilar3 = $_GET['pilar3'];
	$pilar4 = $_GET['pilar4'];
	$pilar5 = $_GET['pilar5'];
	$nivel_fatiga = $_GET['nivel'];
	
	$query = "SELECT * FROM reporte_conductor_activo WHERE id_conductor = '$id_conductor'";
	$result = $conexion -> query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Generar PDF</title>
	<link rel="stylesheet" href="css/style_reporte_pdf.css">
</head>
<body>
	<!--Encabezado del PDF que queda fijo en la parte superior de todas las hojas del pdf-->
	<div id="logo_empresa">
		<img src="images/Logos Empresa/icono_empresa1.PNG">
		<img src="images/Logos Empresa/icono_empresa2.PNG">
		<h1 class="titulo">Informe Evaluacion de Fatiga</h1>
	</div>
	<center>
		<div class="panel">
			<hr>
			<!--Colocamos el pie de la pagina del pdf-->
			<?php
				session_start();
				$fecha = date("d-m-Y");
				$Hora = date("H:i:s A");
				$realizado_por = $_SESSION['name_user'];
			?>
			<label>Fecha Realizada:</label> <?php echo $fecha; ?><br>
			<label>Hora:</label> <?php echo $Hora; ?><br>
			<label>Ciudad: Bogotá</label><br>
			<label>Reporte Realizad Por el Evaluador : <?php echo $realizado_por ?></label>
			<hr>
		</div>
	</center>
	<?php
		foreach ($result as $row) {
	?>
	<p>El paciente <strong><?php echo $row['nombre'];?></strong> <strong><?php echo $row['apellido'];?></strong>
		identificado con <strong><?php echo $row['Tipo_Documento'];?></strong> número <strong><?php echo $row['documento'];?></strong>
		quien labora para la empresa <strong><?php echo $row['Empresa'];?></strong>
		presenta síntomas ,signos , Alteraciones emocionales y Aletraciones Neurologicas evidentes de fatiga por conducción, 
		evidenciándose un alto riesgo de accidente por las siguientes razones:</p>
	<?php
		}
	?>
	<table>
		<tr>
			<th>Pilar de Fatiga</th>
			<th>Descripcion</th>
		</tr>
		<tr>
			<td>
				<input type="checkbox">
				<label>
					<strong>Labor Extenuante</strong>
				</label>
			</td>
			<td>
				<p>Tiempo activo relacionado con su trabajo mayor a 10 horas: Tiempo conduciendo + tiempo en camarote + tiempo dedicado a mantenimiento, revisión o alistamiento del vehículo</p>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox">
				<label for="">
					<strong>Descanso Insuficiente</strong>
				</label>
			</td>
			<td>
				<p>Tiempo de cese de actividades relacionadas con su trabajo menor a 12 horas y/o tiempo efectivo de sueño ininterrumpido menor a 8 horas</p>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox">
				<label for="">
					<strong>Destino Distante</strong>
				</label>
			</td>
			<td>
				<p>Tiempo estimado de llegada al destino programado mayor de 8 horas</p>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox">
				<label for="">
					<strong>Condicion Fisica</strong>
				</label>
			</td>
			<td>
				<p>Cualquier alteración Fisica relacionada con fatiga por conducción</p>
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox">
				<label for="">
					<strong>Estado emocional</strong>
				</label>
			</td>
			<td>
				<p>Alteración emocional ostensible que pueda representar un riesgo de accidente relacionado con conducir un vehículo</p>
			</td>
		</tr>
	</table><br>
	<p>Por este motivo, se informa a la empresa transportadora para que tome las medidas pertinentes. </p><br>
	<hr>
	
</body>
</html>
<?php
	//Cargar la libreria
	require_once "library/dompdf/dompdf_config.inc.php";
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
	$filename = "evaluacion.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>