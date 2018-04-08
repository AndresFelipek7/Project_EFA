<a href='#a_neurologico' data-toggle='modal' id="descripcion_neurologico" class='btn btn-primary btn-lg'> <span class="fa fa-diamond"></span> Alteraciones Neurologicas</a>

<div class='modal fade' id='a_neurologico'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-diamond"></span><br> Informacion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_neurologicas"]) && is_array($_POST["alteraciones_neurologicas"])) {
						echo "<ul>";
						foreach ( $_POST["alteraciones_neurologicas"] as $traer_Alteraciones_neurologicas) {
							echo "<li>";
								switch ($traer_Alteraciones_neurologicas) {
									case "reflejo":
										$puntos_Reflejos = 7;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Reflejos;

										query_neurologico("Reflejos");

										/*$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Reflejos'";
										$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_neurologico = $row['id_a_neurologico'];
											$nombre_a_neurologico = $row['nombre_a_neurologico'];
											$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
										}*/

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file fa-2x'></span> $nombre_a_neurologico</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_neurologico.'<br>'
													</div>
												</div>
											</div>";

										$a_neurologicos_seleccionados = $id_a_neurologico.",".$a_neurologicos_seleccionados;
										break;
									case "cordinado":
										$puntos_Cordinado = 6;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Cordinado;

										$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Cordinado'";
										$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_neurologico = $row['id_a_neurologico'];
											$nombre_a_neurologico = $row['nombre_a_neurologico'];
											$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file fa-2x'></span> $nombre_a_neurologico</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_neurologico.'<br>'
													</div>
												</div>
											</div>";

										$a_neurologicos_seleccionados = $id_a_neurologico.",".$a_neurologicos_seleccionados;
										break;
									case "fuerza":
										$puntos_Fuerza = 5;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Fuerza;

										$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Fuerza'";
										$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_neurologico = $row['id_a_neurologico'];
											$nombre_a_neurologico = $row['nombre_a_neurologico'];
											$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file fa-2x'></span> $nombre_a_neurologico</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_neurologico.'<br>'
													</div>
												</div>
											</div>";

										$a_neurologicos_seleccionados = $id_a_neurologico.",".$a_neurologicos_seleccionados;
										break;
									case "atento":
										$puntos_atento = 4;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_atento;

										$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Atento'";
										$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_neurologico = $row['id_a_neurologico'];
											$nombre_a_neurologico = $row['nombre_a_neurologico'];
											$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file fa-2x'></span> $nombre_a_neurologico</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_neurologico.'<br>'
													</div>
												</div>
											</div>";

										$a_neurologicos_seleccionados = $id_a_neurologico.",".$a_neurologicos_seleccionados;
										break;
									case "memoria":
										$puntos_Memoria = 3;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Memoria;

										$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Memoria'";
										$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_neurologico = $row['id_a_neurologico'];
											$nombre_a_neurologico = $row['nombre_a_neurologico'];
											$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file fa-2x'></span> $nombre_a_neurologico</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_neurologico.'<br>'
													</div>
												</div>
											</div>";

										$a_neurologicos_seleccionados = $id_a_neurologico.",".$a_neurologicos_seleccionados;
										break;
									case "sensibilidad":
										$puntos_Sensibilidad = 2;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Sensibilidad;

										$consulta_Buscar_a_neurologico = "SELECT * FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Sensibilidad'";
										$resultado = $conexion -> query($consulta_Buscar_a_neurologico);
										$count = $resultado ->num_rows;

										if($count >=1) {
											$row = mysqli_fetch_array($resultado);
											$id_a_neurologico = $row['id_a_neurologico'];
											$nombre_a_neurologico = $row['nombre_a_neurologico'];
											$descripcion_a_neurologico = $row['descripcion_a_neurologico'];
										}

										//Mostramos el resultado de la consulta en un panel
										echo "<div class='panel panel-warning text-center'>
												<div class='panel-heading'><span class='fa fa-file fa-2x'></span> $nombre_a_neurologico</div>
												<div class='panel-body'>
													<div>
														$descripcion_a_neurologico.'<br>'
													</div>
												</div>
											</div>";

										$a_neurologicos_seleccionados = $id_a_neurologico.",".$a_neurologicos_seleccionados;
										break;
									case "otra_a_neurologica":
										$puntos_Otra_alteracion_neurologica = 1;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Otra_alteracion_neurologica;
										$otra_a_neurologica = $_POST['otra_alteracion_neurologica'];
										echo "La otra alteracion neurologica ingresada es = ".$otra_a_neurologica;
										break;
									default:
										echo "Lo sentimos ha ocurrido un erro en el menu Alteracion Neurlogica, por Favor recargue la pagina nuevamente";
										break;
								}
							echo "</li>";
						}
						echo "</ul>";
					}else{
						echo "<script> document.getElementById('descripcion_neurologico').style.display='none';</script>";
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>