<a href='#a_neurologico' data-toggle='modal' id="descripcion_neurologico" class='btn btn-primary btn-lg'> <span class="fa fa-diamond"></span> Alteraciones Neurologicas</a>

<div class='modal fade' id='a_neurologico'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-diamond"></span><br> Informacion Detallada</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					if(!empty($_POST["alteraciones_neurologicas"]) && is_array($_POST["alteraciones_neurologicas"])) {
						echo "<ul>";
						foreach ( $_POST["alteraciones_neurologicas"] as $traer_Alteraciones_neurologicas) {
							echo "<li>";
								switch ($traer_Alteraciones_neurologicas) {
									case "Reflejos":
										$puntos_Reflejos = 7;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Reflejos;
										$object_neurologico = query_neurologico("Reflejos",$conexion);
										panel_info_for_modal("panel-warning", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										break;
									case "Cordinado":
										$puntos_Cordinado = 6;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Cordinado;

										$object_neurologico = query_neurologico("Cordinado",$conexion);
										panel_info_for_modal("panel-warning", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										break;
									case "Fuerza":
										$puntos_Fuerza = 5;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Fuerza;

										$object_neurologico = query_neurologico("Fuerza",$conexion);
										panel_info_for_modal("panel-warning", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										break;
									case "Atento":
										$puntos_atento = 4;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_atento;

										$object_neurologico = query_neurologico("Atento",$conexion);
										panel_info_for_modal("panel-warning", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										break;
									case "Memoria":
										$puntos_Memoria = 3;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Memoria;

										$object_neurologico = query_neurologico("Memoria",$conexion);
										panel_info_for_modal("panel-warning", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										break;
									case "Sensibilidad":
										$puntos_Sensibilidad = 2;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Sensibilidad;

										$object_neurologico = query_neurologico("Sensibilidad",$conexion);
										panel_info_for_modal("panel-warning", $object_neurologico['nombre_a_neurologico'], $object_neurologico['descripcion_a_neurologico']);
										$a_neurologicos_seleccionados = $object_neurologico['id_a_neurologico'].",".$a_neurologicos_seleccionados;
										break;
									case "otra_a_neurologica":
										$puntos_Otra_alteracion_neurologica = 1;
										$acumulador_Alteraciones_neurologicas = $acumulador_Alteraciones_neurologicas + $puntos_Otra_alteracion_neurologica;
										$otra_a_neurologica = $_POST['otra_alteracion_neurologica'];
										echo "La otra alteracion neurologica ingresada es = ".$otra_a_neurologica;
										break;
									default:
										echo "Lo sentimos ha ocurrido un erro en el menu Alteracion Neurlogica, por Favor recargue la pagina nuevamente";
										break;
								}
							echo "</li>";
						}
						echo "</ul>";
					}else{
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