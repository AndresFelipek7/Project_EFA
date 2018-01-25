<?php
	ob_start();
	//Los ../ consiste qen que el archivo conec.php se encuentra a 3 carpetas por fuera de exportar_registro_evaluadores_inactivos.php
	include ("../../../library/conec.php");
	$id_emocional = $_GET['id_emo'];
	$query = "SELECT * FROM reporte_emocional WHERE id_emocional = '$id_emocional'";
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
		<h1 class="titulo">Reporte Alteracion emocional con ID <?php echo $id_emocional; ?></h1>
	</div>
	<center>
		<?php
			foreach ($result as $row ) { 
		?>
		<label>ID emocional :</label> <?php echo $row['id_emocional']; ?><br>
		<label>Nombre emocional :</label> <?php echo $row['nombre_emocional']; ?><br>
		<label>Descripcion emocional :</label> <?php echo $row['descripcion_emocional']; ?><br>
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
	$filename = "Alteracion Emocional $id_emocional.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>