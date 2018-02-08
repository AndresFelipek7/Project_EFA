<?php
	include "../methods_backend.php";

	//$select_sueño_profundo = $_POST["sueño_profundo"];
	$select_sueño_profundo = "hora";
	//Sacamos los minutos de la informacion que dijo el conductor que durmio en tiempo sueño
	//$sacar_Minutos_hora = get_minutes($traer_Valores_interrogatorio[5]);
	$sacar_Minutos_hora = getMinutes('2');

	switch ($select_sueño_profundo) {
		case 'hora':
			/*$sueño_profundo = $_POST["solo_hora_sueno"];*/
			$sueño_profundo = 3;
			$sacar_Minutos_hora_Manilla = getMinutes($sueño_profundo);
			$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $sacar_Minutos_hora_Manilla;
			echo "Los minutos que dijo el conductor son : ".$sacar_Minutos_hora."<br>";
			echo "Los minutos de la manilla es = ".$sacar_Minutos_hora_Manilla."<br>";
			echo "La diferencia de los dos tiempo en minutos es ".$diferencia_Entre_tiempo_Sueño."<br>";

			($diferencia_Entre_tiempo_Sueño < 0) ? change_negative_numeric($diferencia_Entre_tiempo_Sueño) : '';
			break;
		case 'minutos':
			$sueño_profundo_solo_minutos = $_POST["minutos_sueno"];
			$añadir_minutos_faltantes = 60 - $sueño_profundo_solo_minutos;
			($sueño_profundo_solo_minutos >= 50) ? $valor_Total_minutos_Manilla = $sueño_profundo_solo_minutos + $añadir_minutos_faltantes : $valor_Total_minutos_Manilla = $sueño_profundo_solo_minutos;
			$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;

			if($diferencia_Entre_tiempo_Sueño < 0) {
				//Tenemos el valor convertido a posicito de la diferencia entre los dos tiempos
				$cambiar_signo_si_es_negativo = ( $diferencia_Entre_tiempo_Sueño + ( -$diferencia_Entre_tiempo_Sueño ) )+ ( -$diferencia_Entre_tiempo_Sueño );
			}
			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = ( $diferencia_Entre_tiempo_Sueño + ( -$diferencia_Entre_tiempo_Sueño ) )+ ( -$diferencia_Entre_tiempo_Sueño ) : $diferencia_Entre_tiempo_Sueño;
			break;
		case 'ambos':
			$campo_hora = $_POST["solo_hora_sueno"];
			$campo_minuto = $_POST["minutos_sueno"];

			if ($campo_minuto >= 50) {
				$añadir_minutos_faltantes = 60 - $campo_minuto;
				$hora_Total_con_Aproximado_minutos = $campo_hora + 1;
				$valor_Total_minutos_Manilla = (($hora_Total_con_Aproximado_minutos*60)/1);
				$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;
				($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = ( $diferencia_Entre_tiempo_Sueño + ( -$diferencia_Entre_tiempo_Sueño ) )+ ( -$diferencia_Entre_tiempo_Sueño ) : $diferencia_Entre_tiempo_Sueño;
			}else {

			}
			break;
		default:
			echo "No se ha podido capturar la informacion del campo sueño profundo";
			break;
	}
	//$vector_Tiempo_sueño_Profundo = explode(".",$sueño_profundo);



	/*//Verificamos que antes del punto este un numero que en nuestro caso serian las horas de sueño que no se encuentren vacios
	if(!empty($vector_Tiempo_sueño_Profundo[0])) {
		//Verificamos que en la posicion 2 del vector no se encuentre vacio , si es diferente el vector tiene minutos
		if(!empty($vector_Tiempo_sueño_Profundo[1])) {
			//Condicional para aproximar los minutos cuando es mayor de 50
			if($vector_Tiempo_sueño_Profundo[1] >= 50) {
				//Le sumamos 10 al tiempo para aproximarlo a 60 minutos
				$minutos_Tiempo_sueño_profundo_Aproximado = $vector_Tiempo_sueño_Profundo[1] + 10;
				//si aproxima los minutos la hora le sumamos una mas para que se mueva la hora
				$hora_Total_con_Aproximado_minutos = $vector_Tiempo_sueño_Profundo[0] + 1;

				//Sacamos el valor en minutos total de la hora ingresada en la info manilla ya aproximado
				$valor_Total_minutos_Manilla = (($hora_Total_con_Aproximado_minutos*60)/1);
				//Sacamos la diferencia en minutos de los dos tiempos = el que dijo el conductor y el de la manilla en minutos
				$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;

				//Si es menor a 0 significa que la diferencia salio negativa por multiples razones
				//La principal razon porque la diferencia sea negativa es porque el conductor dijo que durmino menos horas con respecto a lo que dice la manilla
				if($diferencia_Entre_tiempo_Sueño < 0) {
					//Tenemos el valor convertido a posicito de la diferencia entre los dos tiempos
					$cambiar_signo_si_es_negativo = ( $diferencia_Entre_tiempo_Sueño + ( -$diferencia_Entre_tiempo_Sueño ) )+ ( -$diferencia_Entre_tiempo_Sueño );
				}
			//Cuando los minutos no superan el numero 50 para aproximar se va por este camino
			}else{
				//Sacamos el valor total en minutos de la manilla sumando los minutos de la hora de la manilla y los minutos por separado de la manilla que me da el total
				$valor_Total_minutos_Manilla = $sacar_Minutos_hora_Manilla + $vector_Tiempo_sueño_Profundo[1];
				//Sacamos la diferencia entre los dos tiempos el que dijo el conductor y el de la manilla
				$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;

				//Si es menor a 0 significa que la diferencia salio negativa por multiples razones
				//La principal razon porque la dierencia sea negativa es porque el conductor dijo que durmino menos horas con respecto a lo que dice la manilla
				if($diferencia_Entre_tiempo_Sueño < 0) {
					$cambiar_signo_si_es_negativo = ( $diferencia_Entre_tiempo_Sueño + ( -$diferencia_Entre_tiempo_Sueño ) )+ ( -$diferencia_Entre_tiempo_Sueño );
				}
			}
		//Esta parte del codigo es cuando solo se ingresa un numero que significa que es la hora y en la posicion de los minutos esta vacia
		}else{
			$valor_Total_minutos_Manilla = $sacar_Minutos_hora_Manilla;
			$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;

			//Si es menor a 0 significa que la diferencia salio negativa por multiples razones
			//La principal razon porque la dierencia sea negativa es porque el conductor dijo que durmino menos horas con respecto a lo que dice la manilla
			if($diferencia_Entre_tiempo_Sueño < 0) {
				$cambiar_signo_si_es_negativo = ( $diferencia_Entre_tiempo_Sueño + ( -$diferencia_Entre_tiempo_Sueño ) )+ ( -$diferencia_Entre_tiempo_Sueño );
			}
		}
	//Parte del codigo cuando la primera posicion esta vacia y la segunda tiene el valor de los minutos
	}else{
		if($vector_Tiempo_sueño_Profundo[1] > 60) {
			echo "El valor de los minutos ingresados es incorrecto porque supera los 60 minutos";
		}
		$valor_Total_minutos_Manilla = $vector_Tiempo_sueño_Profundo[1];
		$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;
	}

	//Condicional Para saber si las horas de sueño del conductor son correctas con las horas o minutos registradas por la manilla
	//El valor de la variable $diferencia_Entre_tiempo_Sueño es en minutos

	if($diferencia_Entre_tiempo_Sueño >=30) {
		$valor_verdad_tiempo_descanso_conductor = "Mentira";
		echo "
			<div class='alert alert-danger container text-center'>
				<span class='fa fa-minus-circle fa-2x'></span><br>
				<label>
					<strong>El conductor esta mintiendo con las horas de sueño ingresadas , No es necesario que le mencione esto al conductor , Se manejara de forma interna. Gracias</strong>
				</label>
			</div>"."<br>";
	//Este condicional es para confirmar que exista la varibla cambiar_signo_si_es_negativo y que este lleno para poder entrar en el lado verdadero
	//Este caso paso porque el conductor menciono menos horas que la manilla , cuando se saca la diferencia va a dar como resultado un numero negativo
	}else if(!empty($cambiar_signo_si_es_negativo)){
			//Si es mayor a 30 o igul significa que la diferencia entre los dos tiempos no coincide con lo que dijo el condictor
			if($cambiar_signo_si_es_negativo >= 30) {
				$valor_verdad_tiempo_descanso_conductor = "Mentira";
				echo "
					<div class='alert alert-warning container text-center'>
						<span class='fa fa-flag fa-2x'></span><br>
						<label>
							<strong>El conductor esta mencionando menos horas con respecto a las horas de descanso capturadas por la manilla , Se recomienda que el conductor en su proxima evaluacion sea lo mas cercano con el tiempo de Sueño que tuvo , para dar una solucion la mas precisa posible</strong>
						</label>
					</div>"."<br>";
				//Si no es mayor significa que esta diciendo la verdad
				}else{
					$valor_verdad_tiempo_descanso_conductor = "Verdad";
					echo "
					<div class='alert alert-success container text-center'>
						<span class='fa fa-check-circle fa-2x'></span><br>
						<label>
							<strong>El conductor dijo la verdad con respecto a las horas de sueño ingresadas , la probabilidad de error es poca</strong>
						</label>
					</div>"."<br>";
				}
		//Cuando la variable cambiar_signo_si_es_negativo esta vacio porque el tiempo del conductor y el de la manilla es
		//el mismo la diferencia da cero y porque esa variable esta vacia vamos a mostrar este mensaje
		}else {
			$valor_verdad_tiempo_descanso_conductor = "Verdad";
				echo "
				<div class='alert alert-success container text-center'>
					<span class='fa fa-check-circle fa-2x'></span><br>
					<label>
						<strong>El conductor dijo la verdad con respecto a las horas de sueño ingresadas , la probabilidad de error es poca</strong>
					</label>
				</div>"."<br>";
		}*/
?>