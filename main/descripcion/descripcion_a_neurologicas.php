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

						if ($otra_a_neurologica != "") {
							echo "<ul>";
								foreach ( $_POST["alteraciones_neurologicas"] as $subindice => $valor_neurologico) {
									echo "<div class='container-fluid row'>";
										echo "<div class='$columnsGrid'>";
											$object_neurologico = query_neurologico($valor_neurologico,$conexion);
											panel_info_for_modal("panel-default", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
											$a_neurologicos_seleccionados = $object_neurologico["id_a_neurologico"].",".$a_neurologicos_seleccionados;
											$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $object_neurologico["valor_item"];
										echo "</div>";
									echo "<div>";
								}

								echo "<div class='container-fluid row'>";
									echo "<div class='col-md-12'>";
										panel_info_for_modal("panel-primary", "Otro Sintoma", $otra_a_neurologica);
									echo "</div>";
								echo "<div>";
							echo "</ul>";
						}else {
							echo "<ul>";
								echo "<div class='container-fluid row'>";
									echo "<div class='col-md-12'>";
										panel_info_for_modal("panel-primary", "Otro Sintoma", $otra_a_neurologica);
									echo "</div>";
								echo "<div>";
							echo "</ul>";
						}
					}else if(!empty($_POST["otra_alteracion_neurologica"])){
						$otra_a_neurologica = $_POST["otra_alteracion_neurologica"];
						echo "<ul>";
							echo "<div class='container-fluid row'>";
								echo "<div class='col-md-12'>";
									panel_info_for_modal("panel-primary", "Otra Alteración Neurologica", $otra_a_neurologica);
								echo "</div>";
							echo "<div>";
						echo "</ul>";
					}else {
						$otra_a_neurologica = "No se ha ingresado ninguna Alteración Neurologica.";
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