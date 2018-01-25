<a href='#a_emocional' data-toggle='modal' id="descripcion_emocional" class='btn btn-primary btn-lg'> <span class="fa fa-thumbs-up"></span> Alteraciones Emocionales</a>

<div class='modal fade' id='a_emocional'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-thumbs-up"></span> Informacion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_emocionales"]) && is_array($_POST["alteraciones_emocionales"])) {
						echo "<ul>";
						foreach ( $_POST["alteraciones_emocionales"] as $traer_Alteraciones_emocionales) {
							echo "<li>";
								switch ($traer_Alteraciones_emocionales) {
									case "triste":
										$puntos_Triste = 9;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Triste;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'triste'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";

										$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										break;
									case "mal_humor":
										$puntos_Mal_humor = 8;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Mal_humor;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Mal Humor'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";

										$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										break;
									case "ansiedad":
										$puntos_Ansiedad = 7;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Ansiedad;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Ansiedad'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										if($negar_seleccion != true) {
											$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";
										break;
									case "angustiado":
										$puntos_Angustiado = 6;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Angustiado;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Angustiado'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";

										$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										break;
									case "prisa":
										$puntos_Prisa = 5;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Prisa;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Prisa'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										/*Este condicional es para saber si las pulsaciones para no volver a colocar
										los id de prisa y ansiedad en el acumulador a_emocionales_seleccionadas que se envia a la bd*/
										//Si es diferente de verdadero significa que las pulsaciones son normales y no tienen estas alteraciones emocionales
										if($negar_seleccion != true) {
											$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";
										break;
									case "distraido":
										$puntos_Distraido = 4;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Distraido;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Distraido'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";

										$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
									case "tenso":
										$puntos_Tenso = 3;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Tenso;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Tenso'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";

										$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										break;
									case "miedo":
										$puntos_Miedo = 2;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Miedo;

										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Miedo'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";

										$a_emocionales_seleccionadas = $id_a_emocional.",".$a_emocionales_seleccionadas;
										break;
									case "otra_a_emocional":
										$puntos_Otra_alteracion_Emocional= 1;
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $puntos_Otra_alteracion_Emocional;
										$valor_otra_a_Emocional= $_POST['otra_alteracion_emocional'];
										echo "Ha seleccionado como otro sintoma = ".$valor_otra_a_Emocional;
										//echo "La alteracion emocional es =  ".$traer_Alteraciones_emocionales." Tiene un valor de = ".$puntos_Otra_alteracion_Emocional;
										break;
									default:
										echo "Hemos presentado un problema en el menu Alteraciones Emocionales";
										break;
								}
							echo "</li>";
						}
						echo "</ul>";
					}else{
						//Condicional para mostrar la descripcion detallada cuando las pulsaciones son altas
						if($Mostrar_Alteraciones_emocionales == 1) {
							$vector_2_alteraciones_Emocionales = [1,2];
							foreach ($vector_2_alteraciones_Emocionales as $traer_informacion_emocional) {
								switch ($traer_informacion_emocional) {
									case 1:
										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Prisa'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";
										break;
									case 2:
										$consulta_Buscar_a_Emocional = "SELECT * FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Ansiedad'";
										$resultado = $conexion -> query($consulta_Buscar_a_Emocional);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_emocional = $row['id_a_emocional'];
											$nombre_a_emocional= $row['nombre_a_emocional'];
											$descripcion_a_emocional = $row['descripcion_a_emocional'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-danger text-center'>
												<div class='panel-heading'><span class='fa fa-file-text-o fa-2x'></span> $nombre_a_emocional</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_emocional.'<br>'
													</div>
												</div>
											</div>";
										break;
									default:
										echo "Ha ocurrido un error en la solucion cuando las pulsaciones son muy altas";
										break;
								}
							}
						}else{
							echo "<script> document.getElementById('descripcion_emocional').style.display='none';</script>";
						}
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span> Salir</button>
			</div>
		</div>
	</div>
</div>