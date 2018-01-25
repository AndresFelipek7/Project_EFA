<?php
	//El vector $traer_Info_manilla[1] esta creado en el archivo comparacion_sueno_manilla.php
	$traer_Valor_Pulsaciones_ingresadas = $traer_Info_manilla[1];
	$edad_Conductor = $_SESSION["edad"];

	//Si se ha ingresado un valor de pulsaciones que muestre la recomendacion , sino que no haga nada
	if ($traer_Valor_Pulsaciones_ingresadas != "") {
		//Condicional para sacar el rango de edad del conductor
		if($edad_Conductor >= 20 && $edad_Conductor <=29) {
			//Pulsacioes muy bajas dependiendo de la edad del conductor cuando se encuentra en este rango
			if($traer_Valor_Pulsaciones_ingresadas < 60) {
				echo "
					<div class='alert alert-warning container text-center'>
						<span class='fa fa-heart-o fa-2x'></span><br>
						<label>
							El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas
						</label>
					</div>";
			//Pulsacion buena del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 62 && $traer_Valor_Pulsaciones_ingresadas <= 68) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una Buena Pulsaciones en su cuerpo
						</label>
					</div>";
			//Pulsacion normal del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 70 && $traer_Valor_Pulsaciones_ingresadas <= 84) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una pulsaciones normales para la edad que tiene
						</label>
					</div>";
			//Pulsacion alta del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 86) {
				echo "
					<div class='alert alert-danger container text-center'>
						<span class='fa fa-heartbeat fa-2x'></span><br>
						<label>
							El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones
						</label>
						<p>
							Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso
						</p><br>
						<p>
							Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje
						</p><br>
						<p>
							Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente
						</p>
					</div>";
				//Estas dos variables son los ids de las alteraciones emocionales cuando sus pulsaciones no son normales
				$valor_Id_ansiedad = 2;
				$valor_Id_prisa = 1;
				//Creamos esta variable para que no se repita los id de las alteraciones emocionales cuando las pulsaciones son altas
				$negar_seleccion = true;
				//Esta variable se creo para mostrar la descripcion detallada de prisa y ansiedad sin que el evaluador las halla seleccionado
				$Mostrar_Alteraciones_emocionales = 1;
				//creamos el acumulador a_emocionales_seleccionadas que es el que enviamos a la bd a la tabla evaluacion fatiga
				$a_emocionales_seleccionadas = $valor_Id_ansiedad.",".$a_emocionales_seleccionadas;
				$a_emocionales_seleccionadas = $valor_Id_prisa.",".$a_emocionales_seleccionadas;
			}
		//Rango de edades de 30 a 39 años
		}else if($edad_Conductor >= 30 && $edad_Conductor <=39) {
			//Pulsacioes muy bajas dependiendo de la edad del conductor cuando se encuentra en este rango
			if($traer_Valor_Pulsaciones_ingresadas < 62) {
				echo "
					<div class='alert alert-warning container text-center'>
						<span class='fa fa-heart-o fa-2x'></span><br>
						<label>
							El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas
						</label>
					</div>";
			//Pulsacion buena del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 64 && $traer_Valor_Pulsaciones_ingresadas <= 70) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una Buena Pulsaciones en su cuerpo
						</label>
					</div>";
			//Pulsacion normal del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 72 && $traer_Valor_Pulsaciones_ingresadas <= 84) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una pulsaciones normales para la edad que tiene
						</label>
					</div>";
			//Pulsacion alta del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 86) {
				echo "
					<div class='alert alert-danger container text-center'>
						<span class='fa fa-heartbeat fa-2x'></span><br>
						<label>
							El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones
						</label>
						<p>
							Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso
						</p><br>
						<p>
							Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje
						</p><br>
						<p>
							Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente
						</p>
					</div>";
				//Estas dos variables son los ids de las alteraciones emocionales cuando sus pulsaciones no son normales
				$valor_Id_ansiedad = 2;
				$valor_Id_prisa = 1;
				//Creamos esta variable para que no se repita los id de las alteraciones emocionales cuando las pulsaciones son altas
				$negar_seleccion = true;
				//Esta variable se creo para mostrar la descripcion detallada de prisa y ansiedad sin que el evaluador las halla seleccionado
				$Mostrar_Alteraciones_emocionales = 1;
				//creamos el acumulador a_emocionales_seleccionadas que es el que enviamos a la bd a la tabla evaluacion fatiga
				$a_emocionales_seleccionadas = $valor_Id_ansiedad.",".$a_emocionales_seleccionadas;
				$a_emocionales_seleccionadas = $valor_Id_prisa.",".$a_emocionales_seleccionadas;
			}
		//Rango de edades de 40 a 49 años
		}else if($edad_Conductor >= 40 && $edad_Conductor <=49) {
			//Pulsacioes muy bajas dependiendo de la edad del conductor cuando se encuentra en este rango
			if($traer_Valor_Pulsaciones_ingresadas < 66) {
				echo "
					<div class='alert alert-warning container text-center'>
						<span class='fa fa-heart-o fa-2x'></span><br>
						<label>
							El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas
						</label>
					</div>";
			//Pulsacion buena del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 67 && $traer_Valor_Pulsaciones_ingresadas <= 74) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una Buena Pulsaciones en su cuerpo
						</label>
					</div>";
			//Pulsacion normal del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 75 && $traer_Valor_Pulsaciones_ingresadas <= 88) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una pulsaciones normales para la edad que tiene
						</label>
					</div>";
			//Pulsacion alta del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 90) {
				echo "
					<div class='alert alert-danger container text-center'>
						<span class='fa fa-heartbeat fa-2x'></span><br>
						<label>
							El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones
						</label>
						<p>
							Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso
						</p><br>
						<p>
							Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje
						</p><br>
						<p>
							Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente
						</p>
					</div>";
				//Estas dos variables son los ids de las alteraciones emocionales cuando sus pulsaciones no son normales
				$valor_Id_ansiedad = 2;
				$valor_Id_prisa = 1;
				//Creamos esta variable para que no se repita los id de las alteraciones emocionales cuando las pulsaciones son altas
				$negar_seleccion = true;
				//Esta variable se creo para mostrar la descripcion detallada de prisa y ansiedad sin que el evaluador las halla seleccionado
				$Mostrar_Alteraciones_emocionales = 1;
				//creamos el acumulador a_emocionales_seleccionadas que es el que enviamos a la bd a la tabla evaluacion fatiga
				$a_emocionales_seleccionadas = $valor_Id_ansiedad.",".$a_emocionales_seleccionadas;
				$a_emocionales_seleccionadas = $valor_Id_prisa.",".$a_emocionales_seleccionadas;
			}
		//Rango de edades de 50 a 59 años
		}else if($edad_Conductor >= 50 && $edad_Conductor <=59) {
			//Pulsacioes muy bajas dependiendo de la edad del conductor cuando se encuentra en este rango
			if($traer_Valor_Pulsaciones_ingresadas < 66) {
				echo "
					<div class='alert alert-warning container text-center'>
						<span class='fa fa-heart-o fa-2x'></span><br>
						<label>
							El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas
						</label>
					</div>";
			//Pulsacion buena del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 68 && $traer_Valor_Pulsaciones_ingresadas <= 74) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una Buena Pulsaciones en su cuerpo
						</label>
					</div>";
			//Pulsacion normal del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 75 && $traer_Valor_Pulsaciones_ingresadas <= 88) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una pulsaciones normales para la edad que tiene
						</label>
					</div>";
			//Pulsacion alta del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 90) {
				echo "
					<div class='alert alert-danger container text-center'>
						<span class='fa fa-heartbeat fa-2x'></span><br>
						<label>
							El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones
						</label>
						<p>
							Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso
						</p><br>
						<p>
							Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje
						</p><br>
						<p>
							Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente
						</p>
					</div>";
				//Estas dos variables son los ids de las alteraciones emocionales cuando sus pulsaciones no son normales
				$valor_Id_ansiedad = 2;
				$valor_Id_prisa = 1;
				//Creamos esta variable para que no se repita los id de las alteraciones emocionales cuando las pulsaciones son altas
				$negar_seleccion = true;
				//Esta variable se creo para mostrar la descripcion detallada de prisa y ansiedad sin que el evaluador las halla seleccionado
				$Mostrar_Alteraciones_emocionales = 1;
				//creamos el acumulador a_emocionales_seleccionadas que es el que enviamos a la bd a la tabla evaluacion fatiga
				$a_emocionales_seleccionadas = $valor_Id_ansiedad.",".$a_emocionales_seleccionadas;
				$a_emocionales_seleccionadas = $valor_Id_prisa.",".$a_emocionales_seleccionadas;
			}
		//Rango de edades mayor a 60 años
		}else if($edad_Conductor >= 60) {
			//Pulsacioes muy bajas dependiendo de la edad del conductor cuando se encuentra en este rango
			if($traer_Valor_Pulsaciones_ingresadas < 68) {
				echo "
					<div class='alert alert-warning container text-center'>
						<span class='fa fa-heart-o fa-2x'></span><br>
						<label>
							El conductor Presenta Bradicardia , Por favor consulte al medico por tener las pulsaciones bajas
						</label>
					</div>";
			//Pulsacion buena del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 70 && $traer_Valor_Pulsaciones_ingresadas <= 75) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una Buena Pulsaciones en su cuerpo
						</label>
					</div>";
			//Pulsacion normal del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 76 && $traer_Valor_Pulsaciones_ingresadas <= 90) {
				echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-heart fa-2x'></span><br>
						<label>
							El conductor presenta una pulsaciones normales para la edad que tiene
						</label>
					</div>";
			//Pulsacion alta del conductor cuando se encuentra en este rango
			}else if($traer_Valor_Pulsaciones_ingresadas >= 94) {
				echo "
					<div class='alert alert-danger container text-center'>
						<span class='fa fa-heartbeat fa-2x'></span><br>
						<label>
							El conductor presenta Taticardia por tener las pulsaciones altas, Por favor hacer las siguientes recomendaciones
						</label>
						<p>
							Recomendacion 1: Mantenerse relajado y tranquilo por 10 Minutos , luego de este tiempo tomar de nuevo el pulso
						</p><br>
						<p>
							Recomendacion 2 : Si tiene Hipertension por favor tomar su medicamente en los tiempo correctos antes de salir de viaje
						</p><br>
						<p>
							Recomendacion 3 : Si persiste las pulsaciones alta despues de hacer las recomendaciones anteriores visite al medico Inmediatamente
						</p>
					</div>";
				//Estas dos variables son los ids de las alteraciones emocionales cuando sus pulsaciones no son normales
				$valor_Id_ansiedad = 2;
				$valor_Id_prisa = 1;
				//Creamos esta variable para que no se repita los id de las alteraciones emocionales cuando las pulsaciones son altas
				$negar_seleccion = true;
				//Esta variable se creo para mostrar la descripcion detallada de prisa y ansiedad sin que el evaluador las halla seleccionado
				$Mostrar_Alteraciones_emocionales = 1;
				//creamos el acumulador a_emocionales_seleccionadas que es el que enviamos a la bd a la tabla evaluacion fatiga
				$a_emocionales_seleccionadas = $valor_Id_ansiedad.",".$a_emocionales_seleccionadas;
				$a_emocionales_seleccionadas = $valor_Id_prisa.",".$a_emocionales_seleccionadas;
			}
		}
	}
?>