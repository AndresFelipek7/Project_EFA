<?php
	$select_sueño = $_POST["sueño_profundo"];
	//Sacamos los minutos de la informacion que dijo el conductor que durmio en tiempo sueño
	$tiempo_sueño_conductor = getMinutes($traer_Valores_interrogatorio[5]);

	switch($select_sueño) {
		case 'hora':
			$solo_hora_sueño = $_POST["solo_hora_sueno"];
			$total_minutos_sueño_manilla = getMinutes($solo_hora_sueño);
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueño_manilla;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'minutos':
			$solo_minutos_sueño = $_POST["solo_minutos_sueno"];

			if ($solo_minutos_sueño >= 50 && $solo_minutos_sueño < 60) {
				$añadir_minutos_faltantes = 60 - $solo_minutos_sueño;
				$total_minutos_sueño_manilla = $solo_minutos_sueño + $añadir_minutos_faltantes;
			}else {
				$total_minutos_sueño_manilla = $solo_minutos_sueño;
			}

			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueño_manilla;
			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'ambos':
			$solo_hora_sueño_both = $_POST["solo_hora_sueno_both"];
			$solo_minutos_sueño_both = $_POST["solo_minutos_sueno_both"];

			if ($solo_minutos_sueño_both >= 50) {
				$hora_Total_con_Aproximado_minutos = $solo_hora_sueño_both + 1;
				$total_minutos_sueño_manilla = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($solo_hora_sueño_both);
				$total_minutos_sueño_manilla = $valor_minutos_Manilla + $solo_minutos_sueño_both;
			}

			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueño_manilla;
			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		default:
			echo "<script>
				alert_dinamic_outside_place('evaluacion.php');
			</script>";
	}

	//La comparacion aqui es en minutos (30 significa el rango que tiene de error)
	if($diferencia_Entre_tiempo_Sueño >= 30) {
		$valor_verdad_tiempo_descanso_conductor = "Mentira";
		message_compare_sleep_fit("danger","El conductor esta mintiendo con las horas de sueño ingresadas , No es necesario que le mencione esto al conductor , Se manejara de forma interna. Gracias");
	}else if(!empty($cambiar_signo_si_es_negativo)){
		$valor_verdad_tiempo_descanso_conductor = "Mentira";
		message_compare_sleep_fit("warning","El conductor esta mencionando menos horas con respecto a las horas de descanso capturadas por la manilla , Se recomienda que el conductor en su proxima evaluacion sea lo mas cercano con el tiempo de Sueño que tuvo , para dar una solucion la mas precisa posible");
	}else {
		message_compare_sleep_fit("success","El conductor dijo las horas de sueño correctamente.");
		$valor_verdad_tiempo_descanso_conductor = "Verdad";
	}
?>