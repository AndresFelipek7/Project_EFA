<?php
	ob_start();
	//Los ../ consiste qen que el archivo conec.php se encuentra a 3 carpetas por fuera de exportar_registro_evaluadores_inactivos.php
	include ("../../../library/conec.php");
	$valor_documento = $_GET['id_co'];
	$query = "SELECT * FROM reporte_conductor_inactivo WHERE documento = '$valor_documento'";
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
		<h1 class="titulo">Reporte Conductor Inactivo con ID <?php echo $valor_documento; ?></h1>
	</div>
	<center>
		<?php
			foreach ($result as $row ) {
				//La variable ruta_correcta_foto va hacer concatenada con una cadena y luego con el valor de la ruta que se encuentra en la bd
				/*Esto se hizo porque este archivo exportar_registro_evaluacion_fatiga.php , cuando este archivo busque la foto en su mismo
				 nivel jerarquico es decir que se encuentre dentro de una carpeta hacia abajo pero en este caso la foto del conductor en si
				 se encuentra 3 carpetas atras de este archivo antes mencionado , por eso toco concatenarlo para que logre encontrar la foto
				 del conductor en la carpeta correcta y en el orden jerarquico correcto
				*/
				//la cadena ../../../ hace referencia a 3 niveles atras de carptetas para que cuando busque la foto la encuentre
				$ruta_correcta_foto = "../../../".$row['foto'];
				if ($row["correo"] == "") {
					$valor_correo_conductor = "No se ha ingresado correo";
				}else {
					$valor_correo_conductor = $row["correo"];
				}
		?>
		<img src="<?php echo $ruta_correcta_foto;?>"><br><br><hr>
		<label>ID Evaluador :</label> <?php echo $row['idDatos']; ?><br>
		<label>Nombre :</label> <?php echo $row['nombre']; ?><br>
		<label>Apellido :</label> <?php echo $row['apellido']; ?><br>
		<label>Tipo Documento :</label> <?php echo $row['Tipo_Documento']; ?><br>
		<label>Documento :</label> <?php echo $row['documento']; ?><br>
		<label>Edad :</label> <?php echo $row['edad']; ?><br>
		<label>Telefono :</label> <?php echo $row['telefono']; ?><br>
		<label>Correo :</label> <?php echo $valor_correo_conductor; ?><br>
		<label>Fecha Nacimiento :</label> <?php echo $row['nacimiento']; ?><br>
		<label>Estado :</label> <?php echo $row['Estado']; ?><br>
		<label>Empresa : </label><?php echo $row['Empresa']; ?><br>
		<label>EPS :</label><?php echo $row['eps']; ?><br>
		<label>ARP :</label> <?php echo $row['arp']; ?><br>
		<label>Talla :</label> <?php echo $row['talla']; ?><br>
		<label>Peso : </label><?php echo $row['peso']; ?><br>
		<label>Grupo Sanguineo : </label><?php echo $row['gSanguineo']; ?><br>
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
	$filename = "Conductor_$valor_documento.pdf";
	//Enviamos el fichero PDF al navegador
	$mi_Dompdf->stream($filename, array("Attaachment" => 0));
?>