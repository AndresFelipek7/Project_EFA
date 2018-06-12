<a href='#sintoma' data-toggle='modal' id="descripcion_sintoma" class='btn btn-primary btn-lg'> <span class="glyphicon glyphicon-heart"></span> Sintomas</a>

<div class='modal fade' id='sintoma'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="glyphicon glyphicon-heart fa-2x"></span> <br> Descripcion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["sintomas"]) && is_array($_POST["sintomas"])) {
						$valor = count($_POST["sintomas"]);
						$otro_sintoma = $_POST["valor_otro_sintoma"];

						if ($valor > 3) {
							$columnsGrid = "col-md-4";
						}else if($valor >= 2){
							$columnsGrid = "col-md-6";
						}else {
							$columnsGrid = "col-md-12";
						}

						echo "<ul>";
							foreach ( $_POST["sintomas"] as $valor_sintomas) {
								echo "<div class='container-fluid row'>";
									echo "<div class='$columnsGrid'>";
										$object_sintomas = query_sintomas($valor_sintomas,$conexion);
										panel_info_for_modal("panel-default", $object_sintomas['nombre_sintoma'], $object_sintomas['descripcion_sintoma']);
										$sintomas_seleccionados = $object_sintomas["id_sintoma"].",".$sintomas_seleccionados;
										$acumulador_Sintomas = $acumulador_Sintomas + $object_sintomas["valor_item"];
									echo "</div>";
								echo "<div>";
							}
						echo "</ul>";
						if ($otro_sintoma != "") {
								panel_info_for_modal("panel-primary", "Otro Sintoma", $otro_sintoma);
						}
					}else{
						echo "<script> document.getElementById('descripcion_sintoma').style.display='none';</script>";
					}
				?>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>