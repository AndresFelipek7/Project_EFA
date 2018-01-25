<?php
	ob_start();
	//El archivo conec se encuentra en 2 carpetas por fuera de la carpeta donde se encuentra exportar_all_evaluadores_inactivos.php
	include ("../../conec.php");
	$query = "SELECT * FROM reporte_administrador_inactivo";
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
		<h1 class="titulo">Reporte Administrador Inactivos</h1>
	</div>

	<table>
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Tipo Rol</th>
			<th>Tipo Documento</th>
			<th>Documento</th>
			<th>Edad</th>
			<th>Telefono</th>
		</tr>
		<?php
			foreach ($result as $row ) { ?>
		<tr>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['tipo_rol']; ?></td>
			<td><?php echo $row['tipo_documento']; ?></td>
			<td><?php echo $row['documento']; ?></td>
			<td><?php echo $row['edad']; ?></td>
			<td><?php echo $row['telefono']; ?></td>
		</tr>
		<?php
			}
		?>
	</table>
	<hr>
	<!--Colocamos el pie de la pagina del pdf-->
		<?php
			//Con este archivo configuramos la hora
			require_once "../../../configurar_hora.php";
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
	$filename = "Reporte Evaluadores Inactivos.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>
