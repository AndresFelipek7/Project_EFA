<a href='#pilar' data-toggle='modal' id="modal_pilar_activo" class='btn btn-default btn-lg'> <span class="glyphicon glyphicon-education"></span> Pilares de Fatiga Activos</a>

<div class='modal fade' id='pilar'>
	<div class='modal-dialog modal-lg'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<h4 class='modal-title'>Pilares de Fatiga</h4>
			</div>
			<div class='modal-body text-center'>
				<?php
					//Esta acumulador se creo para saber si hay almenos un pilar activo , si no se encuentra ninguno se oculta el boton de pilares activos porque no tiene caso mostrar un modal vacio
					$acumulador_saber_pilares_activos = 0;
					$acumulador_interrogatorio = $traer_Valores_interrogatorio[1]+$traer_Valores_interrogatorio[2]+$traer_Valores_interrogatorio[3]."<br>";

					/*PRIMERA PARTE DEL ALGORITMO PARA HALLAR EL NIVEL DE FATIGA CUANDO SE SELECCIONA OPCIONES DEL FORMULARIO EN ESPECIFICO Y NO EN CONJUNTO*/

					//Opciones Importantes en el Menu Interrogatorio
					$tiempo_ruta = $_POST["tiempo_destino"];
					$vector_hora_tiempo_destino = explode(" ",$tiempo_ruta);
					if($vector_hora_tiempo_destino[0] >= 8) {
						echo "<script>alert('El tiempo del destino al que usted va ir supera las 8 horas')</script>";
					}else if($vector_hora_tiempo_destino[1] >= 8) {
						echo "<script>alert('El tiempo del destino al que usted va ir supera las 8 horas')</script>";
					}

					/*-----------------------------------------------------------------------------------------------------------------------------*/

					//PILAR LABOR ESTENUANTE
					/*Orden para el condicional
					Interrogatorio
					----
					sintoma
					Emocional
					Neurologico
					----
					Signos
					*/
					
					if($acumulador_interrogatorio >= 10 && $acumulador_Sintomas >= 135 || $acumulador_Alteraciones_emocionales >= 39 || $acumulador_Alteraciones_neurologicas >= 18 && $acumulador_Signo == 4) {
						$valor_Pilar = 1;
						$pilar_activo_Labor_estenuante = 1;
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "1".",".$pilares_seleccionados;
						//echo "EL id de labor estenuante es = ".$pilares_seleccionados."<br>";
						echo "EL conductor da positivo para <strong>LABOR ESTENUANTE</strong> por : "."<br>";
						echo "<p>
							Tiempo activo relacionado con su trabajo mayor a 10 horas: Tiempo conduciendo + tiempo en camarote + tiempo dedicado a mantenimiento, revisión o alistamiento del vehículo
						</p>";
						echo "<hr>";
						/*if($acumulador_interrogatorio >= 10) {
							echo "Superar las horas trabajadas , Las horas ingresados son  = ".$acumulador_interrogatorio;
						}
						if($acumulador_Signo == 4) {
							echo "El signo que se asocia con Labor estenuante es = Agotamiento"."<br>";
						}
						if($acumulador_Sintomas >= 135) {
							echo "La cantidad de sintomas registrados suman = ".$acumulador_Sintomas."<br>";
						}
						if($acumulador_Alteraciones_emocionales >= 39){
							echo "Las Alteraciones Emocionales suman = ".$acumulador_Alteraciones_emocionales."<br>";
						}
						if($acumulador_Alteraciones_neurologicas >= 18) {
							echo "Las Alteraciones Neurologicas suman = ".$acumulador_Alteraciones_neurologicas."<br>"."<hr>";
						}*/
					}

					//PILAR DESCANSO INSUFICIENTE
					/*Orden para el condicional
					Interrogatorio (Tiempo de sueño[5])
					----
					sintoma
					Signo
					--
					Emocional
					Neurologico
					----
					Interrogatorio (Tiempo de descanso[6])
					*/
					if($traer_Valores_interrogatorio[5] < 8  && $acumulador_Sintomas >= 36 || $acumulador_Signo == 2 && $acumulador_Alteraciones_emocionales >= 28 || $acumulador_Alteraciones_neurologicas >= 18 && $traer_Valores_interrogatorio[6] < 10) {
						$valor_Pilar = 1;
						$pilar_descanso_insuficiente_activo = 1;
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "2".",".$pilares_seleccionados;
						echo "EL conductor da positivo para <strong>DESCANSO INSUFICIENTE</strong> por :"."<br>";
						echo "<p>
							Tiempo de cese de actividades relacionadas con su trabajo menor a 12 horas y/o tiempo efectivo de sueño ininterrumpido menor a 8 horas
						</p>";
						echo "<hr>";
						/*echo "EL id de Descanso insuficiente es = ".$pilares_seleccionados."<br>";

						
						if($traer_Valores_interrogatorio[5] < 8 && $traer_Valores_interrogatorio[5] != 0) {
							echo "Las horas de sueño son muy bajas , Las ingresadas son = ".$traer_Valores_interrogatorio[5]."<br>";
						}
						if($acumulador_Sintomas >= 36) {
							echo "Los sintomas Suman = ".$acumulador_Sintomas."<br>";
						}
						if($acumulador_Signo == 2) {
							echo "Los Signos Suman = ".$acumulador_Signo."<br>";
						}
						if($acumulador_Alteraciones_emocionales >= 28) {
							echo "Las alteraciones emcionales son  = ".$acumulador_Alteraciones_emocionales."<br>";
						}
						if($acumulador_Alteraciones_neurologicas >= 18) {
							echo "Las Alteraciones Neurologicas son = ".$acumulador_Alteraciones_neurologicas."<br>"."<hr>";
						}
						if($traer_Valores_interrogatorio[6] < 10 && $traer_Valores_interrogatorio[6] != 0) {
							echo "Las horas de descanso son = ".$traer_Valores_interrogatorio[6]."<hr>";
						}*/
					}

					//PILAR DESTINO DISTANTE
					/*Orden para el condicional
					Interrogatorio (Hora de llegada)
					----
					sintoma
					Signo
					Emocional
					----
					Neurologico
					*/
					$tiempo_llegada = $_POST["tiempo_destino"];
					$vector_sacar_hora_tiempo_destino = explode("h",$tiempo_llegada);
					if($vector_sacar_hora_tiempo_destino[0] >= 8) {
						$valor_Pilar = 1;
						$pilar_destino_distante_activo = 1;
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "3".",".$pilares_seleccionados;
						echo "EL conductor da positivo para <strong>DESTINO DISTANTE</strong> por : "."<br>";
						echo "<p>
							Tiempo estimado de llegada al destino programado mayor de 8 horas
						</p>";
						echo "<hr>";
					}else if($acumulador_Sintomas >= 2 && $acumulador_Alteraciones_emocionales >= 38 || $acumulador_Signo == 3 && $acumulador_Alteraciones_neurologicas >= 13) {
						$valor_Pilar = 1;
						$pilar_destino_distante_activo = 1;
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "3".",".$pilares_seleccionados;
						echo "EL conductor da positivo para <strong>DESTINO DISTANTE</strong> por : "."<br>";
						echo "<p>
							Tiempo estimado de llegada al destino programado mayor de 8 horas
						</p>";
						echo "<hr>";
						/*echo "EL id de destino distante es = ".$pilares_seleccionados."<br>";

						
						if($variable_Hora_Llegada_2 >= 8) {
							echo "El tiempo de llegada al destino en horas es = ".$variable_Hora_Llegada_2."<br>";
						}
						if($acumulador_Sintomas >= 2) {
							echo "Los puntos para sintomas es = ".$acumulador_Sintomas."<br>";
						}
						if($acumulador_Alteraciones_emocionales >= 38) {
							echo "Las alteraciones emocional suman = ".$acumulador_Alteraciones_emocionales."<br>";
						}
						if($acumulador_Signo == 3) {
							echo "El signo asociado a Destino Distante es = Estres"."<br>";
						}
						if($acumulador_Alteraciones_neurologicas >= 13) {
							echo "Los Alteraciones neurologicas suman = ".$acumulador_Alteraciones_neurologicas."<hr>";
						}*/
					}

					//PILAR CONDICION FISICA
					/*Orden para el condicional
					Interrogatorio
					----
					sintoma
					emocional
					Neurologico
					----
					Signos
					*/
					
					if($traer_Valores_interrogatorio[5] < 8 && $acumulador_Sintomas >= 91 || $acumulador_Alteraciones_emocionales >= 39 || $acumulador_Alteraciones_neurologicas >= 13 && $acumulador_Signo == 7) {
						$valor_Pilar = 1;
						$pilar_condicion_fisica_activo = 1;
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "4".",".$pilares_seleccionados;
						echo "EL conductor da positivo para <strong>CONDICION FISICA</strong> por : "."<br>";
						echo "<p>
							Cualquier alteración Fisica relacionada con fatiga por conducción
						</p>";
						echo "<hr>";
						/*echo "EL id de condicion fisica es = ".$pilares_seleccionados."<br>";
						
						if($traer_Valores_interrogatorio[5] < 8 && $traer_Valores_interrogatorio[5] != 0) {
							echo "Las horas de sueño fueron insuficientes , las horas ingresadas fueron = ".$traer_Valores_interrogatorio[5]."<br>";
						}
						if($acumulador_Sintomas >= 91) {
							echo "Los puntos para sintoma son = ".$acumulador_Sintomas."<br>";
						}
						if($acumulador_Alteraciones_emocionales >= 15) {
							echo "Los puntos para lateraciones emocionales son = ".$acumulador_Alteraciones_emocionales."<br>";
						}
						if($acumulador_Alteraciones_neurologicas >= 13) {
							echo "Los puntos para alteraciones Neurologicas son = ".$acumulador_Alteraciones_neurologicas."<br>"."<hr>";
						}
						if($acumulador_Signo == 7) {
							echo "El signo asociado para Condicion Fisica es = Comatoso";
						}*/
					}

					//PILAR ESTADO EMOCIONAL
					/*Orden para el condicional
					emocional
					Sintomas
					*/
					
					if($acumulador_Alteraciones_emocionales >= 9 || $acumulador_Sintomas == 2) {
						$valor_Pilar = 1;
						$pilar_estado_emocional_activo = 1;
						$acumulador_Pilares = $acumulador_Pilares + $valor_Pilar;
						$acumulador_saber_pilares_activos = $acumulador_saber_pilares_activos + $valor_Pilar;

						$pilares_seleccionados = "5".",".$pilares_seleccionados;
						echo "EL conductor da positivo para <strong>ESTADO EMOCIONAL</strong> por : "."<br>";
						echo "<p>
							Alteración emocional ostensible que pueda representar un riesgo de accidente relacionado con conducir un vehículo
						</p>";
						echo "<hr>";
						/*echo "EL id de estado emocional es = ".$pilares_seleccionados."<br>";
						
						
						if($acumulador_Alteraciones_emocionales >= 9  && $acumulador_Alteraciones_emocionales != 0) {
							echo "Los puntos para alteraciones Emocionales son = ".$acumulador_Alteraciones_emocionales."<br>";
						}
						if($acumulador_Sintomas == 2) {
							echo "El sintoma asociado al ESTADO EMOCIONAL es = Depresion";
						}*/
					}

					//Hallar el Nivel de fatiga del conductor
					switch ($acumulador_Pilares) {
						case 1:
							echo "<script>alert(' El conductor Presenta nivel de fatiga BAJO por tener Activos '+$acumulador_Pilares+' Pilares del test')</script>";
							break;
						case 2:
							echo "<script>alert(' El conductor Presenta nivel de fatiga BAJO por tener Activos '+$acumulador_Pilares+' Pilares del test')</script>";
							break;
						case 3:
							echo "<script>alert(' El conductor Presenta nivel de fatiga MEDIO por tener Activos ' +$acumulador_Pilares+' Pilares del test')</script>";
							break;
						case 4:
							echo "<script>alert(' El conductor Presenta nivel de fatiga ALTO por tener Activos '+$acumulador_Pilares+' Pilares del test')</script>";
							break;
						case 5:
							echo "<script>alert(' El conductor Presenta nivel de fatiga ALTO por tener Activos '+$acumulador_Pilares+' Pilares del test')</script>";
							break;
						default:
							echo "<script> alert('Se encuentra en optimas condiciones para conducir GOOD TRAVEL'); </script>";
							break;
					}

					//condicional para saber si hay al menos un pilar activo
					if($acumulador_saber_pilares_activos != 0) {
						echo "<script> document.getElementById('modal_pilar_activo').style.display='inlineblock';</script>";
					}else{
						echo "<script> document.getElementById('modal_pilar_activo').style.display='none';</script>";
					}
				?>
			</div>
			<div class='modal-footer form-inline'>
				<button type='button' class='btn btn-danger' data-dismiss='modal'>Salir</button>
			</div>
		</div>
	</div>
</div>