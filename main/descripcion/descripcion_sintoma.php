<a href='#sintoma' data-toggle='modal' id="descripcion_sintoma" class='btn btn-primary btn-lg'> <span class="glyphicon glyphicon-heart"></span> Sintomas</a>

<div class='modal fade' id='sintoma'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="glyphicon glyphicon-heart"></span> Informacion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["sintomas"]) && is_array($_POST["sintomas"])) {
						echo "<ul>";
						foreach ( $_POST["sintomas"] as $traer_sintoma) {
							echo "<li>";
								switch ($traer_sintoma) {
									case "sueño":
										$puntos_Sueño = 19;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Sueño;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Sueno'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";
										
										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "temblor":
										$puntos_temblor = 18;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_temblor;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Temblor'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "vision_borrosa":
										$puntos_Vision = 17;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Vision;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Vision Borrosa'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "hambre":
										$puntos_Hambre = 16;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Hambre;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Hambre'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "sed":
										$puntos_Sed = 15;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Sed;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Sed'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "malestar":
										$puntos_Malestar = 14;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Malestar;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Malestar'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "insomio":
										$puntos_Insomio = 13;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Insomio;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Insomio'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "concentracion":
										$puntos_Concentracion = 12;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Concentracion;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Concentracion'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "dolor_muscular":
										$puntos_Dolor_muscular = 11;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Dolor_muscular;

										$consulta_Buscar_sintoma = "SELECT * FROM sintomas WHERE nombre_sintoma = 'Dolor Muscular'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "dolor_articulaciones":
										$puntos_Dolor_articulaciones = 10;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Dolor_articulaciones;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Dolor Articulaciones'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "dolor_cabeza":
										$puntos_Dolor_cabeza = 9;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Dolor_cabeza;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Dolor de Cabeza'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "dolor_garganta":
										$puntos_Dolor_garganta = 8;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Dolor_garganta;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Dolor de Garganta'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "mareos":
										$puntos_Mareo = 7;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Mareo;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Mareos'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "alergias":
										$puntos_Alergias = 6;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Alergias;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Alergias'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "colon_irritable":
										$puntos_Colon = 5;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Colon;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Colon Irritable'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "escalofrios":
										$puntos_Escalofrios = 4;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Escalofrios;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Escalofrios'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "sudoracion":
										$puntos_Sudoracion = 3;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Sudoracion;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Sudoracion'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "depresion":
										$puntos_Depresion = 2;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Depresion;

										$consulta_Buscar_sintoma = "SELECT * FROM `sintomas` WHERE nombre_sintoma = 'Depresion'";
										$resultado = $conexion -> query($consulta_Buscar_sintoma);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_sintoma = $row['id_sintoma'];
											$nombre_Sintoma = $row['nombre_sintoma'];
											$descripcion_Sintoma = $row['descripcion_sintoma'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file-o fa-2x'></span> $nombre_Sintoma</div>
												<div class='panel-body'>
													<div>
														$descripcion_Sintoma.'<br>'
													</div>
												</div>
											</div>";

										$sintomas_seleccionados = $id_sintoma.",".$sintomas_seleccionados;
										break;
									case "otro_sintoma":
									 	$puntos_Otro_sintoma = 1;
										$acumulador_Sintomas = $acumulador_Sintomas + $puntos_Otro_sintoma;
										$valor_otro_sintoma = $_POST["valor_otro_sintoma"];
										echo "Ha seleccionado como otro sintoma = ".$valor_otro_sintoma;
										break;
									default:
										echo "Lo sentimos ha ocurrido un error en el menu Sintomas Fatiga , por Favor recargue la pagina nuevamente";
										break;
								}
							echo "</li>";
						}
						echo "</ul>";
					}else{
						echo "<script> document.getElementById('descripcion_sintoma').style.display='none';</script>";
					}
				?>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span> Salir</button>
			</div>
		</div>
	</div>
</div>