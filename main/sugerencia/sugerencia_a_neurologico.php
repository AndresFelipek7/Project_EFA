<a href='#sugerencia_a_neurologico' data-toggle='modal' id="sugerencia_neurologico" class='btn btn-success btn-lg'><span class="fa fa-diamond"></span> Alteraciones Neurologicas</a>

<div class='modal fade' id='sugerencia_a_neurologico'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-diamond"></span> Recomendaciones</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_neurologicas"]) && is_array($_POST["alteraciones_neurologicas"])) {
						echo "<ul>";
						foreach ( $_POST["alteraciones_neurologicas"] as $traer_Alteraciones_neurologicas) {
							echo "<li>";
								switch ($traer_Alteraciones_neurologicas) {
									case "reflejo":
										$consulta_id_a_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = 'Reflejos'";
										$result = $conexion -> query($consulta_id_a_neurologico);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_neurologico = $row['id_a_neurologico'];

											$consulta_Sugerencia_a_Neurologico = "SELECT * FROM sugerencia WHERE id_a_neurologico = '$id_neurologico'";
											$result = $conexion -> query($consulta_Sugerencia_a_Neurologico);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >=1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Neurologicas</strong><br>La Alteracion neurologicas seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Neurologica</strong><br>La Alteracion Neurologica seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_neurologico_seleccionados = $id_sugerencia.",".$sugerencia_a_neurologico_seleccionados;
												//echo "EL id sugerencia alteraciones neurologicas = ".$sugerencia_a_neurologico_seleccionados."<br>";

												//echo "La alteracion Neurologica es =  ".$traer_Alteraciones_neurologicas." Tiene un valor de = "."<mark>".$puntos_Reflejos."</mark>"."<hr>";
											}
										}
										break;
									case "cordinado":
										$consulta_id_a_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Alteraciones_neurologicas'";
										$result = $conexion -> query($consulta_id_a_neurologico);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_neurologico = $row['id_a_neurologico'];

											$consulta_Sugerencia_a_Neurologico = "SELECT id_sugerencia , id_orden , id_a_neurologico , descripcion_sugerencia FROM sugerencia WHERE id_a_neurologico = '$id_neurologico'";
											$result = $conexion -> query($consulta_Sugerencia_a_Neurologico);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >= 1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Neurologicas</strong><br>La Alteracion neurologicas seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Neurologica</strong><br>La Alteracion Neurologica seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_neurologico_seleccionados = $id_sugerencia.",".$sugerencia_a_neurologico_seleccionados;
												//echo "EL id sugerencia alteraciones neurologicas = ".$sugerencia_a_neurologico_seleccionados."<br>";

												//echo "La alteracion Neurologica es =  ".$traer_Alteraciones_neurologicas." Tiene un valor de = "."<mark>".$puntos_Cordinado."</mark>"."<hr>";
											}
										}
										break;
									case "fuerza":
										$consulta_id_a_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Alteraciones_neurologicas'";
										$result = $conexion -> query($consulta_id_a_neurologico);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_neurologico = $row['id_a_neurologico'];

											$consulta_Sugerencia_a_Neurologico = "SELECT id_sugerencia , id_orden , id_a_neurologico , descripcion_sugerencia FROM sugerencia WHERE id_a_neurologico = '$id_neurologico'";
											$result = $conexion -> query($consulta_Sugerencia_a_Neurologico);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >= 1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Neurologicas</strong><br>La Alteracion neurologicas seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Neurologica</strong><br>La Alteracion Neurologica seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_neurologico_seleccionados = $id_sugerencia.",".$sugerencia_a_neurologico_seleccionados;
												//echo "EL id sugerencia alteraciones neurologicas = ".$sugerencia_a_neurologico_seleccionados."<br>";

												//echo "La alteracion Neurologica es =  ".$traer_Alteraciones_neurologicas." Tiene un valor de = "."<mark>".$puntos_Fuerza."</mark>"."<hr>";
											}
										}
										break;
									case "atento":
										$consulta_id_a_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Alteraciones_neurologicas'";
										$result = $conexion -> query($consulta_id_a_neurologico);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_neurologico = $row['id_a_neurologico'];

											$consulta_Sugerencia_a_Neurologico = "SELECT id_sugerencia , id_orden , id_a_neurologico , descripcion_sugerencia FROM sugerencia WHERE id_a_neurologico = '$id_neurologico'";
											$result = $conexion -> query($consulta_Sugerencia_a_Neurologico);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >= 1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Neurologicas</strong><br>La Alteracion neurologicas seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Neurologica</strong><br>La Alteracion Neurologica seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_neurologico_seleccionados = $id_sugerencia.",".$sugerencia_a_neurologico_seleccionados;
												//echo "EL id sugerencia alteraciones neurologicas = ".$sugerencia_a_neurologico_seleccionados."<br>";

												//echo "La alteracion Neurologica es =  ".$traer_Alteraciones_neurologicas." Tiene un valor de = "."<mark>".$puntos_atento."</mark>"."<hr>";
											}
										}
										break;
									case "memoria":
										$consulta_id_a_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Alteraciones_neurologicas'";
										$result = $conexion -> query($consulta_id_a_neurologico);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_neurologico = $row['id_a_neurologico'];

											$consulta_Sugerencia_a_Neurologico = "SELECT id_sugerencia , id_orden , id_a_neurologico , descripcion_sugerencia FROM sugerencia WHERE id_a_neurologico = '$id_neurologico'";
											$result = $conexion -> query($consulta_Sugerencia_a_Neurologico);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >= 1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Neurologicas</strong><br>La Alteracion neurologicas seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Neurologica</strong><br>La Alteracion Neurologica seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_neurologico_seleccionados = $id_sugerencia.",".$sugerencia_a_neurologico_seleccionados;
												//echo "EL id sugerencia alteraciones neurologicas = ".$sugerencia_a_neurologico_seleccionados."<br>";

												//echo "La alteracion Neurologica es =  ".$traer_Alteraciones_neurologicas." Tiene un valor de = "."<mark>".$puntos_Memoria."</mark>"."<hr>";
											}
										}
										break;
									case "sensibilidad":
										$consulta_id_a_neurologico = "SELECT id_a_neurologico FROM alteraciones_neurologicas WHERE nombre_a_neurologico = '$traer_Alteraciones_neurologicas'";
										$result = $conexion -> query($consulta_id_a_neurologico);
										$count = $result ->num_rows;

										if($count >= 1) {
											$row = mysqli_fetch_array($result);
											$id_neurologico = $row['id_a_neurologico'];

											$consulta_Sugerencia_a_Neurologico = "SELECT id_sugerencia , id_orden , id_a_neurologico , descripcion_sugerencia FROM sugerencia WHERE id_a_neurologico = '$id_neurologico'";
											$result = $conexion -> query($consulta_Sugerencia_a_Neurologico);
											$count_Sugerencia = $result ->num_rows;

											if($count_Sugerencia >= 1) {
												$row = mysqli_fetch_array($result);
												$id_sugerencia = $row['id_sugerencia'];
												$id_orden = $row['id_orden'];
												$sugerencia = $row['descripcion_sugerencia'];

												if($id_orden == 1) {
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteraciones Neurologicas</strong><br>La Alteracion neurologicas seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Immediantamente</strong> <br> $sugerencia
														</div>";
												}else{
													echo "<div class='alert alert-success'>
															<button class='close' data-dismiss='alert'><span>&times;</span></button>
															<strong>Alteracion Neurologica</strong><br>La Alteracion Neurologica seleccionado es: $traer_Alteraciones_neurologicas<br>
															La orden de reposo es  = <strong>Despues del Viaje</strong> <br> $sugerencia
														</div>";
												}

												$sugerencia_a_neurologico_seleccionados = $id_sugerencia.",".$sugerencia_a_neurologico_seleccionados;
												//echo "EL id sugerencia alteraciones neurologicas = ".$sugerencia_a_neurologico_seleccionados."<br>";

												//echo "La alteracion Neurologica es =  ".$traer_Alteraciones_neurologicas." Tiene un valor de = "."<mark>".$puntos_Sensibilidad."</mark>"."<hr>";
											}
										}
										break;
									case "otra_a_neurologica":
										echo "La otra alteracion neurologica ingresada es = ".$otra_a_neurologica = $_POST['otra_alteracion_neurologica']."<br>";
										break;
									default:
										echo "Lo sentimos ha ocurrido un erro en el menu Sintomas Fatiga , por Favor recargue la pagina nuevamente";
										break;
								}
							echo "</li>";
						}
						echo "</ul>";
					}else{
						echo "<script> document.getElementById('sugerencia_neurologico').style.display='none';</script>";
						//echo "Valor total del Menú Alteraciones Neurologicas es = ".$acumulador_Alteraciones_neurologicas;
					}
					//echo "Valor total del Menú Alteraciones Neurologicas es = ".$acumulador_Alteraciones_neurologicas;
					
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span> Salir</button>
			</div>
		</div>
	</div>
</div>