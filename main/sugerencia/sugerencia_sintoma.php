<a href='#sugerencia_sintoma' data-toggle='modal' id="sugerencia_sintomas" class='btn btn-success btn-lg'><span class="glyphicon glyphicon-heart"></span> Sintomas</a>

<div class='modal fade' id='sugerencia_sintoma'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="glyphicon glyphicon-heart fa-2x"></span><br> Recomendacion Sintomas</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["sintomas"]) && is_array($_POST["sintomas"])) {
						if($valor == 1){
							$columnsGrid = "col-md-12";
						}else {
							$columnsGrid = "col-md-6";
						}

						echo "<ul>";
							foreach ( $_POST["sintomas"] as $subindice => $valor_sintoma) {
								echo "<div class='container-fluid row'>";
									echo "<div class='$columnsGrid'>";
										$object_sintoma = query_sintomas($valor_sintoma,$conexion);
										$object_sintoma_sugerencia = query_sugerencia('id_sintoma',$object_sintoma["id_sintoma"],$conexion);
										($object_sintoma_sugerencia['id_orden'] != 1) ? $orden_reposo = "Despues del Viaje" : $orden_reposo = "Inmediatamente";
										alert_improve_driver("info", "<strong>$valor_sintoma</strong><br>", "La orden de reposo es  = <strong>$orden_reposo</strong> <br> <hr>$object_sintoma_sugerencia[descripcion_sugerencia]");
										$sugerencia_a_emocional_seleccionados = $object_sintoma_sugerencia["id_sugerencia"].",".$sugerencia_a_emocional_seleccionados;
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
					}else{
						echo "<script> document.getElementById('sugerencia_sintomas').style.display='none';</script>";
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>