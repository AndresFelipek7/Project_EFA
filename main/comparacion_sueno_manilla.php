<?php
	$select_sueño_profundo = $_POST["sueño_profundo"];
	//Sacamos los minutos de la informacion que dijo el conductor que durmio en tiempo sueño
	$sacar_Minutos_hora = getMinutes($traer_Valores_interrogatorio[5]);

	switch ($select_sueño_profundo) {
		case 'hora':
			$sueño_profundo = $_POST["solo_hora_sueno"];
			$sacar_Minutos_hora_Manilla = getMinutes($sueño_profundo);
			$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $sacar_Minutos_hora_Manilla;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : '';
			break;
		case 'minutos':
			$sueño_profundo = $_POST["solo_hora_sueno"];
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno"];

			if ($sueño_profundo_solo_minutos >= 50 && $sueño_profundo_solo_minutos < 60) {
				$añadir_minutos_faltantes = 60 - $sueño_profundo_solo_minutos;
				$valor_Total_minutos_Manilla = $sueño_profundo_solo_minutos + $añadir_minutos_faltantes;
			}else {
				$valor_Total_minutos_Manilla = $sueño_profundo_solo_minutos;
			}

			$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;
			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
			break;
		case 'ambos':
			$sueño_profundo = $_POST["solo_hora_sueno_both"];
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno_both"];

			if ($sueño_profundo_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_profundo + 1;
				$valor_Total_minutos_Manilla = getMinutes($hora_Total_con_Aproximado_minutos);

				$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;
				($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_profundo);
				$valor_Total_minutos_Manilla = $valor_minutos_Manilla + $sueño_profundo_solo_minutos;

				$diferencia_Entre_tiempo_Sueño = $sacar_Minutos_hora - $valor_Total_minutos_Manilla;
				($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
			}
			break;
		default:
			message_mistake_validator("Ha ocurrido un error en el algoritmo de Sueño profudo del conductor.");
			break;
	}

	//La comparacion aqui es en minutos (30 significa el rango que tiene de error)
	if($diferencia_Entre_tiempo_Sueño >= 30) {
		$valor_verdad_tiempo_descanso_conductor = "Mentira";
		message_compare_sleep_fit("danger","El conductor esta mintiendo con las horas de sueño ingresadas , No es necesario que le mencione esto al conductor , Se manejara de forma interna. Gracias");
	}else if(!empty($cambiar_signo_si_es_negativo) && $cambiar_signo_si_es_negativo >= 30){
		$valor_verdad_tiempo_descanso_conductor = "Mentira";
		message_compare_sleep_fit("warning","El conductor esta mencionando menos horas con respecto a las horas de descanso capturadas por la manilla , Se recomienda que el conductor en su proxima evaluacion sea lo mas cercano con el tiempo de Sueño que tuvo , para dar una solucion la mas precisa posible");
	}else {
		message_compare_sleep_fit("success","El conductor dijo las horas de sueño correctamente.");
		$valor_verdad_tiempo_descanso_conductor = "Verdad";
	}
?>