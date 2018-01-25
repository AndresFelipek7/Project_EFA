<a href='#sugerencia_a_emocional' data-toggle='modal' id="sugerencia_emocional" class='btn btn-success btn-lg'> <span class="fa fa-thumbs-up"></span> Alteraciones Emocionales</a>

<div class='modal fade' id='sugerencia_a_emocional'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-thumbs-up"></span> Recomendaciones</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_emocionales"]) && is_array($_POST["alteraciones_emocionales"])) {
						echo "<ul>";
						foreach ( $_POST["alteraciones_emocionales"] as $traer_Alteraciones_emocionales) {
							echo "<li>";
								switch ($traer_Alteraciones_emocionales) {
									case "triste":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
											}
										}
										break;
									case "mal_humor":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Mal Humor'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
												//echo "EL id sugerencia alteraciones Emocional = ".$sugerencia_a_emocional_seleccionados."<br>";

												//echo "La alteracion Emocional es =  ".$traer_Alteraciones_emocionales." Tiene un valor de = "."<mark>".$puntos_Mal_humor."</mark>"."<hr>";
											}
										}
										break;
									case "ansiedad":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												/*Esto lo hacemos para que se puede enviar la sugerencia de ansiedad y prisa a la base
												de datos sin necesidad de haberlo seleccionado porque las pulsaciones que se ingresaron
												son altas de lo normal , lo que conlleva a tener las dos alteraciones antes mencionadas*/
												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
											}
										}
										break;
									case "angustiado":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
												//echo "EL id sugerencia alteraciones Emocional = ".$sugerencia_a_emocional_seleccionados."<br>";

												//echo "La alteracion Emocional es =  ".$traer_Alteraciones_emocionales." Tiene un valor de = "."<mark>".$puntos_Angustiado."</mark>"."<hr>";
											}
										}
										break;
									case "prisa":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
											}
										}
										break;
									case "distraido":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
												//echo "EL id sugerencia alteraciones Emocional = ".$sugerencia_a_emocional_seleccionados."<br>";

												//echo "La alteracion Emocional es =  ".$traer_Alteraciones_emocionales." Tiene un valor de = "."<mark>".$puntos_Distraido."</mark>"."<hr>";
											}
										}
										break;
									case "tenso":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
												//echo "EL id sugerencia alteraciones Emocional = ".$sugerencia_a_emocional_seleccionados."<br>";

												//echo "La alteracion Emocional es =  ".$traer_Alteraciones_emocionales." Tiene un valor de = "."<mark>".$puntos_Tenso."</mark>"."<hr>";
											}
										}
										break;
									case "miedo":
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = '$traer_Alteraciones_emocionales'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: $traer_Alteraciones_emocionales<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
												//echo "EL id sugerencia alteraciones Emocional = ".$sugerencia_a_emocional_seleccionados."<br>";

												//echo "La alteracion Emocional es =  ".$traer_Alteraciones_emocionales." Tiene un valor de = "."<mark>".$puntos_Miedo."</mark>"."<hr>";
											}
										}
										break;
									case "otra_a_emocional":
										$puntos_Otra_alteracion_Emocional= 1;
										echo "Ha seleccionado como otro sintoma = ".$valor_otra_a_Emocional= $_POST['otra_alteracion_emocional']."<br>";
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
						//Colocamos este condicional para que pueda mostrar la sugerencia cuando las pulsaciones son altas
						if($Mostrar_Alteraciones_emocionales == 1) {
							$vector_2_alteraciones_Emocionales = [1,2];
							foreach ($vector_2_alteraciones_Emocionales as $traer_informacion_emocional) {
								switch ($traer_informacion_emocional) {
									case 1:
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Prisa'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: Prisa<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: Prisa<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
											}
										}
										break;
									case 2:
										$consulta_id_a_emocional = "SELECT id_a_emocional FROM alteraciones_emocionales WHERE nombre_a_emocional = 'Ansiedad'";
										$result = $conexion -> query($consulta_id_a_emocional);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_emocional = $row['id_a_emocional'];

											$consulta_Sugerencia_a_Emocional = "SELECT * FROM sugerencia WHERE id_a_emocional = '$id_emocional'";
											$result = $conexion -> query($consulta_Sugerencia_a_Emocional);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Emocionales</strong><br>La Alteracion Emocional seleccionado es: Ansiedad<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Emocional</strong><br>La Alteracion emocional seleccionado es: Ansiedad<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												/*Esto lo hacemos para que se puede enviar la sugerencia de ansiedad y prisa a la base
												de datos sin necesidad de haberlo seleccionado porque las pulsaciones que se ingresaron
												son altas de lo normal , lo que conlleva a tener las dos alteraciones antes mencionadas*/
												$sugerencia_a_emocional_seleccionados = $id_sugerencia.",".$sugerencia_a_emocional_seleccionados;
											}
										}
										break;
									default:
										echo "Ha ocurrido un error en la solucion cuando las pulsaciones son muy altas";
										break;
								}
							}
						}else{
							echo "<script> document.getElementById('sugerencia_emocional').style.display='none';</script>";
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