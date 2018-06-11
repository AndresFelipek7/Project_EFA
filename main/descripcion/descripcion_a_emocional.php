<a href='#a_emocional' data-toggle='modal' id="descripcion_emocional" class='btn btn-primary btn-lg'> <span class="fa fa-thumbs-up"></span> Alteraciones Emocionales</a>

<div class='modal fade' id='a_emocional'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-thumbs-up fa-2x"></span> <br>Descripcion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_emocionales"]) && is_array($_POST["alteraciones_emocionales"])) {
						$valor = count($_POST["alteraciones_emocionales"]);
						$otra_a_emocional = $_POST["otra_alteracion_emocional"];

						if ($valor > 3) {
							$columnsGrid = "col-md-4";
						}else if($valor == 2){
							$columnsGrid = "col-md-6";
						}else {
							$columnsGrid = "col-md-12";
						}

						echo "<ul>";
							foreach ( $_POST["alteraciones_emocionales"] as $subindice => $valor_emocional) {
								echo "<div class='container-fluid row'>";
									echo "<div class='$columnsGrid'>";
										$object_emocional = query_emocional($valor_emocional,$conexion);
										panel_info_for_modal("panel-default", $object_emocional['nombre_emocional'], $object_emocional['descripcion_emocional']);
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $object_emocional["valor_item"];
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
						if ($otra_a_emocional != "") {
							panel_info_for_modal("panel-primary", "Otra Alteracion Emocional", $otra_a_emocional);
						}
					} else{
						//Condicional para mostrar la descripcion detallada cuando las pulsaciones son altas
						if($Mostrar_Alteraciones_emocionales == 1) {
							$vector_2_alteraciones_Emocionales = ["Prisa","Ansiedad"];
							echo "<ul>";
							foreach ( $vector_2_alteraciones_Emocionales as $subindice => $valor_emocional) {
								echo "<div class='container-fluid row'>";
									echo "<div class='col-md-6'>";
										$object_emocional = query_emocional($valor_emocional,$conexion);
										panel_info_for_modal("panel-default", $object_emocional['nombre_emocional'], $object_emocional['descripcion_emocional']);
										$acumulador_Alteraciones_emocionales = $acumulador_Alteraciones_emocionales + $object_emocional["valor_item"];
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