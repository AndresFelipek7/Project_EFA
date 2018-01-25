<?php
	ob_start();
	//El ../Significa que el archivo que se va incuir esta en 2 carpetas por fuera de este archivo que es exortar_all_evaluadores.php
	include ("../../conec.php");
	$query = "SELECT * FROM reporte_usuario_activo";
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
		<h1 class="titulo">Reporte Evaluadores Activos</h1>
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
			<!--
			<th>Correo</th>
			<th>Fecha Nacimiento</th>
			<th>Estado</th>
			<th>Nombre Usuario</th>
			<th>Contraseña</th>-->
		</tr>
		<?php
			//Mostramos los resultado sd el BD con la variable $row que fue asignada por $result
			foreach ($result as $row ) { ?>
		<tr>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['tipo_rol']; ?></td>
			<td><?php echo $row['tipo_documento']; ?></td>
			<td><?php echo $row['documento']; ?></td>
			<td><?php echo $row['edad']; ?></td>
			<td><?php echo $row['telefono']; ?></td>
			<!--
			<td><?php echo $row['correo']; ?></td>
			<td><?php echo $row['nacimiento']; ?></td>
			<td><?php echo $row['estado']; ?></td>
			<td><?php echo $row['NombreUsuario']; ?></td>
			<td><?php echo $row['password']; ?></td>-->
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

		<?php
			//Con este archivo configuramos la hora
			require_once "../../../configurar_hora.php";
		?>
		<label> Fecha Realizada:</label> <?php echo $fecha; ?><br>
		<label> Hora:</label> <?php echo $Hora; ?><br>
		<label>Ciudad: Bogotá</label><br>
		<label>Reporte Realizado Por : <?php echo $realizado_por ?></label>
	<hr>
</body>
<?php
	if (isset($pdf)){
		$font = Font_Metrics::get_font("Arial", "bold");
		$pdf->page_text(765, 550, "Pagina {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0, 0, 0));
	}
?>
</html>
<?php
	//Cargar la libreria
	require_once "../../dompdf/dompdf_config.inc.php";
	//Creamos un nuevo Objeto de la clase DOMPDF()
	$mi_Dompdf = new DOMPDF();
	//Definimos el tamaño del papel y su orientacion
	$mi_Dompdf ->set_paper("A4","portrait");
	//Cargamos el contenido html
	$mi_Dompdf->load_html(ob_get_clean());
	//Renderizamos el documento html a PDF
	$mi_Dompdf->render();
	//Aumentamos la memoria del servidor si es necesario cuando el render de la pagina es muy pesado
	ini_set("memory_limit","128M");
	//$pdf = $mi_Dompdf->output();
	//Le colocamos un nombre por defecto al archivo PDF descargable
	$filename = "Reporte Evaluadores Activos.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>
