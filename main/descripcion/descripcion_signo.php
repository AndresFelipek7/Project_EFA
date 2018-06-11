<a href='#signo' data-toggle='modal' class='btn btn-primary btn-lg'><span class="glyphicon glyphicon-eye-open"></span> Signos</a>

<div class='modal fade' id='signo'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-bookmark fa-2x"></span><br>Descripcion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					$valor_otro_estado_signo = $_POST["valor_otro_estado_signo"];
					($valor_otro_estado_signo == "") ? "No se ha ingreado otro estado del conductor." : $valor_otro_estado_signo;
					$object_signo = query_signo($valor_Signo,$conexion);

					if ($valor_otro_estado_signo != "") {
						echo "<div class='row'>";
							echo "<div class='col-md-6'>";
								panel_info_for_modal("panel-default", $object_signo["nombre_signo"], $object_signo["descripcion_signo"]);
								$acumulador_Signo = $object_signo["valor_item"];
							echo "</div>";
							echo "<div class='col-md-6'>";
								panel_info_for_modal("panel-info", "Otro Estado del Conductor" , $valor_otro_estado_signo);
							echo "</div>";
						echo "</div>";
					}else {
						echo "<div class='row'>";
							echo "<div class='col-md-12'>";
								panel_info_for_modal("panel-default", $object_signo["nombre_signo"], $object_signo["descripcion_signo"]);
								$acumulador_Signo = $object_signo["valor_item"];
							echo "</div>";
						echo "</div>";
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>