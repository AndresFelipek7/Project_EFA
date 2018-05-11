<a href='#sugerencia_a_emocional' data-toggle='modal' id="sugerencia_emocional" class='btn btn-success btn-lg'> <span class="fa fa-thumbs-up"></span> Alteraciones Emocionales</a>

<div class='modal fade' id='sugerencia_a_emocional'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-thumbs-up fa-2x"></span><br> Recomendacion Alteracion Emocional</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_emocionales"]) && is_array($_POST["alteraciones_emocionales"])) {
						if($valor == 1){
							$columnsGrid = "col-md-12";
						}else {
							$columnsGrid = "col-md-6";
						}

						echo "<ul>";
							foreach ( $_POST["alteraciones_emocionales"] as $subindice => $valor_emocional) {
								echo "<div class='container-fluid row'>";
									echo "<div class='$columnsGrid'>";
										$object_emocional = query_emocional($valor_emocional,$conexion);
										$object_emocional_sugerencia = query_sugerencia('id_a_emocional',$object_emocional["id_emocional"],$conexion);
										($object_emocional_sugerencia['id_orden'] != 1) ? $orden_reposo = "Despues del Viaje" : $orden_reposo = "Inmediatamente";
										alert_improve_driver("info", "<strong>$valor_emocional</strong><br>", "La orden de reposo es  = <strong>$orden_reposo</strong> <br> <hr>$object_emocional_sugerencia[descripcion_sugerencia]");
										$sugerencia_a_neurologico_seleccionados = $object_emocional_sugerencia["id_sugerencia"].",".$sugerencia_a_neurologico_seleccionados;
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
					}/*else{
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

												//Esto lo hacemos para que se puede enviar la sugerencia de ansiedad y prisa a la base
												//de datos sin necesidad de haberlo seleccionado porque las pulsaciones que se ingresaron
												//son altas de lo normal , lo que conlleva a tener las dos alteraciones antes mencionadas
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
					}*/
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>