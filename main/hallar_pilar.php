<a href='#pilar' data-toggle='modal' id="modal_pilar_activo" class='btn btn-default btn-lg'> <span class="fa fa-bookmark"> Pilares de Fatiga Activos</span></a>

<div class='modal fade' id='pilar'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'><span class="fa fa-bullhorn fa-2x"></span><br>Pilares de Fatiga</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					//Esta acumulador se creo para saber si hay almenos un pilar activo , si no se encuentra ninguno se oculta el boton de pilares activos porque no tiene caso mostrar un modal vacio
					$acumulador_saber_pilares_activos = 0;
					$valor_Pilar = 1;
					$pilar_activo = false;
					$object_pilar_active = [];
					$acumulador_interrogatorio = $traer_Valores_interrogatorio[0]+$traer_Valores_interrogatorio[1]+$traer_Valores_interrogatorio[2];

					/*	PILAR LABOR ESTENUANTE
							Orden para el condicional del mas importante al menos segun este pilar
								1)Interrogatorio 2)sintoma 3)Emocional 4)Neurologico 5)Signos
					*/

					if($acumulador_interrogatorio >= 10 && $acumulador_Sintomas >= 135 || $acumulador_Alteraciones_emocionales >= 39 || $acumulador_Alteraciones_neurologicas >= 18 && $acumulador_Signo == 4) {
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "1".",".$pilares_seleccionados;
						array_unshift($object_pilar_active,"<span class='fa fa-star-half-o fa-2x'></span><br><strong>Labor Estenuante</strong><br>:Tiempo activo relacionado con su trabajo mayor a 10 horas: Tiempo conduciendo + tiempo en camarote + tiempo dedicado a mantenimiento, revisión o alistamiento del vehículo");
					}

					/*PILAR DESCANSO INSUFICIENTE
						Orden para el condicional
							1)Interrogatorio (Tiempo de sueño[5]) 2)sintoma 3)Signo 4)Emocional 5)Neurologico 6)Interrogatorio (Tiempo de descanso[6])
					*/
					if($traer_Valores_interrogatorio[5] < 8  && $acumulador_Sintomas >= 36 || $acumulador_Signo == 2 && $acumulador_Alteraciones_emocionales >= 28 || $acumulador_Alteraciones_neurologicas >= 18 && $traer_Valores_interrogatorio[6] < 10) {
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "2".",".$pilares_seleccionados;
						array_unshift($object_pilar_active,"<span class='fa fa-thumbs-down fa-2x'></span><br><strong>Descanso Insuficiente</strong><br>:Tiempo de cese de actividades relacionadas con su trabajo menor a 12 horas y/o tiempo efectivo de sueño ininterrumpido menor a 8 horas");
					}

					/*PILAR DESTINO DISTANTE
						Orden para el condicional
							1)Interrogatorio (Hora de llegada) 2)Sintomas 3)Signo 4)Emocional 5)Neurologico
					*/
					$tiempo_llegada = $_POST["tiempo_destino"];
					$vector_sacar_hora_tiempo_destino = explode("h",$tiempo_llegada);
					if($vector_sacar_hora_tiempo_destino[0] >= 8) {
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "3".",".$pilares_seleccionados;
						array_unshift($object_pilar_active,"<span class='fa fa-car fa-2x'></span><br><strong>Destino Distante</strong><br>:El Tiempo estimado de llegada al destino programado mayor de 8 horas");
					}else if($acumulador_Sintomas >= 2 && $acumulador_Alteraciones_emocionales >= 38 || $acumulador_Signo == 3 && $acumulador_Alteraciones_neurologicas >= 13) {
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "3".",".$pilares_seleccionados;
						array_unshift($object_pilar_active,"<span class='fa fa-car fa-2x'></span><br><strong>Destino Distante</strong><br>:El Tiempo estimado de llegada al destino programado mayor de 8 horas");
					}

					/*PILAR CONDICION FISICA
						Orden para el condicional
							1)Interrogatorio 2)Sintoma 3)Emocional 4)Neurologico 5)Signos
					*/

					if($traer_Valores_interrogatorio[5] < 8 && $acumulador_Sintomas >= 91 || $acumulador_Alteraciones_emocionales >= 39 || $acumulador_Alteraciones_neurologicas >= 13 && $acumulador_Signo == 6) {
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "4".",".$pilares_seleccionados;
						array_unshift($object_pilar_active,"<span class='fa fa-balance-scale fa-2x'></span><br><strong>Condición Fisica</strong><br>:Cualquier alteración Fisica relacionada con fatiga por conducción.");
					}

					/*PILAR ESTADO EMOCIONAL
						Orden para el condicional
						1)Emocional 2)Sintomas
					*/

					if($acumulador_Alteraciones_emocionales >= 9 || $acumulador_Sintomas == 2) {
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "5".",".$pilares_seleccionados;
						array_unshift($object_pilar_active,"<span class='fa fa-hand-peace-o fa-2x'></span><br><strong>Estado Emocional</strong><br>:Alteración emocional ostensible que pueda representar un riesgo de accidente relacionado con conducir un vehículo.");
					}

					//Mostrar el nivel de fatiga del conductor
					if ($acumulador_Pilares == 1 || $acumulador_Pilares == 2) {
						show_tired_driver_level("Bajo","Por tener Activos $acumulador_Pilares Pilar de la Prueba Realizada.","success");
					}else if($acumulador_Pilares == 0){
						show_tired_driver_level("Bajo","Se encuentra en optimas condiciones para conducir. Buen viaje!!","success");
					}else if($acumulador_Pilares == 4 || $acumulador_Pilares == 5) {
						show_tired_driver_level("Alto","Por tener Activos $acumulador_Pilares Pilar de la Prueba Realizada.","error");
					}else {
						show_tired_driver_level("Medio","Por tener Activos $acumulador_Pilares Pilar de la Prueba Realizada.","warning");
					}

					($acumulador_Pilares == 1) ? $columnGrid = "col-md-12" : $columnGrid = "col-md-6";

					echo "<ul>";
						foreach ($object_pilar_active as $key => $value) {
							echo "<div class='container-fluid row'>";
								echo "<div class='$columnGrid'>";
									$separate_string = explode(":",$value);
									alert_improve_driver("warning",$separate_string[0],$separate_string[1]);
								echo "</div>";
							echo "<div>";
						}
					echo "</ul>";

					//Condicional para saber si hay al menos un pilar activo
					echo ($acumulador_saber_pilares_activos != 0) ? "<script> document.getElementById('modal_pilar_activo').style.display='inlineblock';</script>" : "<script> document.getElementById('modal_pilar_activo').style.display='none';</script>";
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'><span class="glyphicon glyphicon-remove"></span></button>
			</div>
		</div>
	</div>
</div>