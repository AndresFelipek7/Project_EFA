<a href='#sugerencia_a_neurologico' data-toggle='modal' id="sugerencia_neurologico" class='btn btn-success btn-lg'><span class="fa fa-diamond"></span> Alteraciones Neurologicas</a>

<div class='modal fade' id='sugerencia_a_neurologico'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-diamond fa-2x"></span> <br>Recomendacion Alteracion Neurologica</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_neurologicas"]) && is_array($_POST["alteraciones_neurologicas"])) {
						if($valor == 1){
							$columnsGrid = "col-md-12";
						}else {
							$columnsGrid = "col-md-6";
						}

						echo "<ul>";
							foreach ( $_POST["alteraciones_neurologicas"] as $subindice => $valor_neurologico) {
								echo "<div class='container-fluid row'>";
									echo "<div class='$columnsGrid'>";
										$object_neurologico = query_neurologico($valor_neurologico,$conexion);
										$object_neurologico_sugerencia = query_sugerencia('id_a_neurologico',$object_neurologico["id_a_neurologico"],$conexion);
										($object_neurologico_sugerencia['id_orden'] != 1) ? $orden_reposo = "Despues del Viaje" : $orden_reposo = "Inmediatamente";
										alert_improve_driver("info", "<strong>$valor_neurologico</strong><br>", "La orden de reposo es  = <strong>$orden_reposo</strong> <br> <hr>$object_neurologico_sugerencia[descripcion_sugerencia]");
										$sugerencia_a_neurologico_seleccionados = $object_neurologico_sugerencia["id_sugerencia"].",".$sugerencia_a_neurologico_seleccionados;
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
					}else{
						echo "<script> document.getElementById('sugerencia_neurologico').style.display='none';</script>";
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>