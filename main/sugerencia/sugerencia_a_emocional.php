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
										$sugerencia_a_emocional_seleccionados = $object_emocional_sugerencia["id_sugerencia"].",".$sugerencia_a_emocional_seleccionados;
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
					}else{
						if($Mostrar_Alteraciones_emocionales == 1) {
							$vector_2_alteraciones_Emocionales = ["Prisa","Ansiedad"];
							echo "<ul>";
								foreach ( $vector_2_alteraciones_Emocionales as $subindice => $valor_emocional) {
									echo "<div class='container-fluid row'>";
										echo "<div class='col-md-6'>";
											$object_emocional = query_emocional($valor_emocional,$conexion);
											$object_emocional_sugerencia = query_sugerencia('id_a_emocional',$object_emocional["id_emocional"],$conexion);
											($object_emocional_sugerencia['id_orden'] != 1) ? $orden_reposo = "Despues del Viaje" : $orden_reposo = "Inmediatamente";
											alert_improve_driver("info", "<strong>$valor_emocional</strong><br>", "La orden de reposo es  = <strong>$orden_reposo</strong> <br> <hr>$object_emocional_sugerencia[descripcion_sugerencia]");
											$sugerencia_a_emocional_seleccionados = $object_emocional_sugerencia["id_sugerencia"].",".$sugerencia_a_emocional_seleccionados;
										echo "</div>";
									echo "<div>";
								}
							echo "</ul>";
						}else{
							echo "<script> document.getElementById('descripcion_emocional').style.display='none';</script>";
						}
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>