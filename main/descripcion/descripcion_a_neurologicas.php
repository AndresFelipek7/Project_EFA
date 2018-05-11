<a href='#a_neurologico' data-toggle='modal' id="descripcion_neurologico" class='btn btn-primary btn-lg'> <span class="fa fa-diamond"></span> Alteraciones Neurologicas</a>

<div class='modal fade' id='a_neurologico'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-diamond fa-2x"></span><br> Descripcion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_neurologicas"]) && is_array($_POST["alteraciones_neurologicas"])) {
						$valor = count($_POST["alteraciones_neurologicas"]);
						$otra_a_neurologica = $_POST["otra_alteracion_neurologica"];

						if ($valor > 3) {
							$columnsGrid = "col-md-4";
						}else if($valor == 2){
							$columnsGrid = "col-md-6";
						}else {
							$columnsGrid = "col-md-12";
						}

						echo "<ul>";
							foreach ( $_POST["alteraciones_neurologicas"] as $subindice => $valor_neurologico) {
								echo "<div class='container-fluid row'>";
									echo "<div class='$columnsGrid'>";
										$object_neurologico = query_neurologico($valor_neurologico,$conexion);
										panel_info_for_modal("panel-default", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
						if ($otra_a_neurologica != "") {
								panel_info_for_modal("panel-primary", "Otra Alteracion Neurologica", $otra_a_neurologica);
						}
					}else {
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