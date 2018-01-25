<?php
	ob_start();
	//Los ../ consiste qen que el archivo conec.php se encuentra a 3 carpetas por fuera de exportar_registro_evaluadores_inactivos.php
	include ("../../../library/conec.php");
	$id_ruta = $_GET['id_ru'];
	$query = "SELECT * FROM reporte_ruta WHERE id_ruta = '$id_ruta'";
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
		<img src="../../../images/Logos Empresa/icono_empresa1.PNG">
		<img src="../../../images/Logos Empresa/icono_empresa2.PNG">
		<h1 class="titulo">Reporte Ruta con ID <?php echo $id_ruta; ?></h1>
	</div>
	
	<center>
		<?php
			foreach ($result as $row ) { 
		?>
		<label>ID RUTA :</label> <?php echo $row['id_ruta']; ?><br>
		<label>CODIGO RUTA :</label> <?php echo $row['codigo_ruta']; ?><br>
		<label>DISTANCIA EN KILOMETROS :</label> <?php echo $row['distancia_km']; ?><br>
		<label>NOMBRE RUTA :</label> <?php echo $row['codigo_ruta']; ?><br>
		<label>TIEMPO LLEGADA APROX :</label> <?php echo $row['Tiempo_Recorrido']; ?><br>
		<?php
			}
		?>
		<hr>
		<!--Colocamos el pie de la pagina del pdf-->
		<?php
			//Con este archivo configuramos la hora
			require_once "../../../configurar_hora.php";
		?>
		<label>Fecha Realizada:</label> <?php echo $fecha; ?><br>
		<label>Hora:</label> <?php echo $Hora; ?><br>
		<label>Ciudad: Bogotá</label><br>
		<label>Reporte Realizad Por : <?php echo $realizado_por ?></label>
		<hr>
	</center>
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
	$filename = "Ruta_$id_ruta.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>