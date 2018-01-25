<a href='#sugerencia_sintoma' data-toggle='modal' id="sugerencia_sintomas" class='btn btn-success btn-lg'><span class="glyphicon glyphicon-heart"></span> Sintomas</a>

<div class='modal fade' id='sugerencia_sintoma'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="glyphicon glyphicon-heart"></span> Recomendaciones</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["sintomas"]) && is_array($_POST["sintomas"])) {
						echo "<ul>";
						foreach ( $_POST["sintomas"] as $traer_sintoma) {
							echo "<li>";
								switch ($traer_sintoma) {
									case "sueño":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Sueno'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
											}
										}
										break;
									case "temblor":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_temblor."</mark>"."<hr>";
											}
										}
										break;
									case "vision_borrosa":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Vision Borrosa'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Vision."</mark>"."<hr>";
											}
										}
										break;
									case "hambre":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Hambre."</mark>"."<hr>";
											}
										}
										break;
									case "sed":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Sed."</mark>"."<hr>";
											}
										}
										break;
									case "malestar":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Malestar."</mark>"."<hr>";
											}
										}
										break;
									case "insomio":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Insomio."</mark>"."<hr>";
											}
										}
										break;
									case "concentracion":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Concentracion."</mark>"."<hr>";
											}
										}
										break;
									case "dolor_muscular":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Dolor Muscular'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Dolor_muscular."</mark>"."<hr>";
											}
										}
										break;
									case "dolor_articulaciones":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Dolor Articulaciones'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Dolor_articulaciones."</mark>"."<hr>";
											}
										}
										break;
									case "dolor_cabeza":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Dolor de Cabeza'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Dolor_cabeza."</mark>"."<hr>";
											}
										}
										break;
									case "dolor_garganta":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Dolor de Garganta'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Dolor_garganta."</mark>"."<hr>";
											}
										}
										break;
									case "mareos":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Mareo."</mark>"."<hr>";
											}
										}
										break;
									case "alergias":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Alergias."</mark>"."<hr>";
											}
										}
										break;
									case "colon_irritable":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = 'Colon Irritable'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Colon."</mark>"."<hr>";
											}
										}
										break;
									case "escalofrios":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Escalofrios."</mark>"."<hr>";
											}
										}
										break;
									case "sudoracion":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Sudoracion."</mark>"."<hr>";
											}
										}
										break;
									case "depresion":
										$consulta_id_sintoma = "SELECT id_sintoma FROM sintomas WHERE nombre_sintoma = '$traer_sintoma'";
										$result = $conexion -> query($consulta_id_sintoma);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_sintoma = $row['id_sintoma'];

											$consulta_Sugerencia_sintoma = "SELECT * FROM sugerencia WHERE id_sintoma = '$id_sintoma'";
											$result = $conexion -> query($consulta_Sugerencia_sintoma);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Sintomas Fatiga</strong><br>El sintoma seleccionado es: $traer_sintoma<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_sintoma_seleccionados = $id_sugerencia.",".$sugerencia_sintoma_seleccionados;
												//echo "EL id sugerencia Sintoma es =  = ".$sugerencia_sintoma_seleccionados."<br>";

												//echo "El sintoma =  ".$traer_sintoma." Tiene un valor de = "."<mark>".$puntos_Depresion."</mark>"."<hr>";
											}
										}
										break;
									case "otro_sintoma":
									 	$puntos_Otro_sintoma = 1;
										echo "Ha seleccionado como otro sintoma = ".$valor_otro_sintoma = $_POST['valor_otro_sintoma']."<br>";
										//echo "Otro Sintoma Tiene un valor de = "."<mark>".$puntos_Otro_sintoma."</mark>"."<hr>";
										break;
									default:
										echo "Lo sentimos ha ocurrido un erro en el menu Sintomas Fatiga , por Favor recargue la pagina nuevamente";
										break;
								}
							echo "</li>";
						}
						echo "</ul>";
					}else{
						echo "<script> document.getElementById('sugerencia_sintomas').style.display='none';</script>";
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span> Salir</button>
			</div>
		</div>
	</div>
</div>