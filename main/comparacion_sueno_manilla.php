<?php
	$select_sueño_profundo = $_POST["sueño_profundo"];
	$select_sueño_ligero = $_POST["sueño_ligero"];
	$combinacion_selects = $select_sueño_profundo."-".$select_sueño_ligero;
	//Sacamos los minutos de la informacion que dijo el conductor que durmio en tiempo sueño
	$tiempo_sueño_conductor = getMinutes($traer_Valores_interrogatorio[5]);

	switch($combinacion_selects) {
		case 'hora-hora':
			$sueño_profundo_hora = $_POST["solo_hora_sueno"];
			$sueño_ligero_hora = $_POST["solo_hora_sueno_ligero"];
			$sueño_profundo = getMinutes($sueño_profundo_hora);
			$sueno_ligero = getMinutes($sueño_ligero_hora);
			$total_minutos_sueños = $sueño_profundo + $sueno_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueños;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'minutos-minutos':
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno"];
			$sueno_ligero_solo_minutos = $_POST["solo_minutos_sueno_ligero"];

			//Condicional para sueño profundo
			if ($sueño_profundo_solo_minutos >= 50 && $sueño_profundo_solo_minutos < 60) {
				$añadir_minutos_faltantes = 60 - $sueño_profundo_solo_minutos;
				$total_minutos_sueño_profundo = $sueño_profundo_solo_minutos + $añadir_minutos_faltantes;
			}else {
				$total_minutos_sueño_profundo = $sueño_profundo_solo_minutos;
			}

			//Condicional para Sueño Ligero
			if ($sueno_ligero_solo_minutos >= 50 && $sueno_ligero_solo_minutos < 60) {
				$añadir_minutos_faltantes = 60 - $sueno_ligero_solo_minutos;
				$total_minutos_sueño_ligero = $sueno_ligero_solo_minutos + $añadir_minutos_faltantes;
			}else {
				$total_minutos_sueño_ligero = $sueno_ligero_solo_minutos;
			}

			//Total de los dos sueños en solo minutos aproximados si es posible
			$total_minutos_sueños = $total_minutos_sueño_profundo + $total_minutos_sueño_ligero;

			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueños;
			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'ambos-ambos':
			$sueño_profundo = $_POST["solo_hora_sueno_both"];
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno_both"];
			$sueño_ligero_hora = $_POST["solo_hora_sueno_both_ligero"];
			$sueño_ligero_solo_minutos = $_POST["solo_minutos_sueno_both_ligero"];

			//Condicional de Sueño Profundo
			if ($sueño_profundo_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_profundo + 1;
				$total_minutos_sueño_profundo = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_profundo);
				$total_minutos_sueño_profundo = $valor_minutos_Manilla + $sueño_profundo_solo_minutos;
			}

			//Condicional de Sueño ligero
			if ($sueño_ligero_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_ligero_hora + 1;
				$total_minutos_sueño_ligero = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_ligero_hora);
				$total_minutos_sueño_ligero = $valor_minutos_Manilla + $sueño_ligero_solo_minutos;
			}

			//Total de los minutos de los dos tipos de sueño
			$total_minutos_sueño = $total_minutos_sueño_profundo + $total_minutos_sueño_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueño;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'hora-minutos':
			$sueño_profundo = $_POST["solo_hora_sueno"];
			$sueno_ligero_solo_minutos = $_POST["solo_minutos_sueno_ligero"];
			$sacar_Minutos_hora_Manilla = getMinutes($sueño_profundo);

			//Condicional para Sueño Ligero
			if ($sueno_ligero_solo_minutos >= 50 && $sueno_ligero_solo_minutos < 60) {
				$añadir_minutos_faltantes = 60 - $sueno_ligero_solo_minutos;
				$total_minutos_sueño_ligero = $sueno_ligero_solo_minutos + $añadir_minutos_faltantes;
			}else {
				$total_minutos_sueño_ligero = $sueno_ligero_solo_minutos;
			}

			$total_tiempo_sueño = $sacar_Minutos_hora_Manilla + $total_minutos_sueño_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_tiempo_sueño;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'minutos-hora':
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno"];
			$sueño_ligero_hora = $_POST["solo_hora_sueno_ligero"];
			$sueno_ligero = getMinutes($sueño_ligero_hora);

			//Condicional para sueño profundo
			if ($sueño_profundo_solo_minutos >= 50 && $sueño_profundo_solo_minutos < 60) {
				$añadir_minutos_faltantes = 60 - $sueño_profundo_solo_minutos;
				$total_minutos_sueño_profundo = $sueño_profundo_solo_minutos + $añadir_minutos_faltantes;
			}else {
				$total_minutos_sueño_profundo = $sueño_profundo_solo_minutos;
			}

			//Total de los dos sueños
			$total_minutos_sueños = $total_minutos_sueño_profundo + $sueno_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueños;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'ambos-minutos':
			$sueño_profundo = $_POST["solo_hora_sueno_both"];
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno_both"];
			$sueno_ligero_solo_minutos = $_POST["solo_minutos_sueno_ligero"];
			$sacar_Minutos_hora_Manilla = getMinutes($sueño_profundo);

			//Condicional de Sueño Profundo
			if ($sueño_profundo_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_profundo + 1;
				$total_minutos_sueño_profundo = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_profundo);
				$total_minutos_sueño_profundo = $valor_minutos_Manilla + $sueño_profundo_solo_minutos;
			}

			$total_tiempo_sueño = $total_minutos_sueño_profundo + $sueno_ligero_solo_minutos;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_tiempo_sueño;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'minutos-ambos':
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno"];
			$sueño_ligero_hora = $_POST["solo_hora_sueno_both_ligero"];
			$sueño_ligero_solo_minutos = $_POST["solo_minutos_sueno_both_ligero"];

			//Condicional para sueño profundo
			if ($sueño_profundo_solo_minutos >= 50 && $sueño_profundo_solo_minutos < 60) {
				$añadir_minutos_faltantes = 60 - $sueño_profundo_solo_minutos;
				$total_minutos_sueño_profundo = $sueño_profundo_solo_minutos + $añadir_minutos_faltantes;
			}else {
				$total_minutos_sueño_profundo = $sueño_profundo_solo_minutos;
			}

			//Condicional de sueño ligero
			if ($sueño_ligero_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_ligero_hora + 1;
				$total_minutos_sueño_ligero = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_ligero_hora);
				$total_minutos_sueño_ligero = $valor_minutos_Manilla + $sueño_ligero_solo_minutos;
			}

			//Total de los minutos de los dos tipos de sueño
			$total_minutos_sueño = $total_minutos_sueño_profundo + $total_minutos_sueño_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueño;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'ambos-hora':
			$sueño_profundo = $_POST["solo_hora_sueno_both"];
			$sueño_profundo_solo_minutos = $_POST["solo_minutos_sueno_both"];
			$sueño_ligero_hora = $_POST["solo_hora_sueno_ligero"];
			$sueno_ligero = getMinutes($sueño_ligero_hora);

			//Condicional de Sueño Profundo
			if ($sueño_profundo_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_profundo + 1;
				$total_minutos_sueño_profundo = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_profundo);
				$total_minutos_sueño_profundo = $valor_minutos_Manilla + $sueño_profundo_solo_minutos;
			}

			$all_minutes_sleep_hour = $total_minutos_sueño_profundo + $sueno_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $all_minutes_sleep_hour;

			($diferencia_Entre_tiempo_Sueño < 0) ? $cambiar_signo_si_es_negativo = change_negative_numeric($diferencia_Entre_tiempo_Sueño) : $diferencia_Entre_tiempo_Sueño;
		break;
		case 'hora-ambos':
			$sueño_profundo = $_POST["solo_hora_sueno"];
			$sueño_ligero_hora = $_POST["solo_hora_sueno_both_ligero"];
			$sueño_ligero_solo_minutos = $_POST["solo_minutos_sueno_both_ligero"];
			$sacar_Minutos_hora_Manilla = getMinutes($sueño_profundo);

			//Condicional de sueño ligero
			if ($sueño_ligero_solo_minutos >= 50) {
				$hora_Total_con_Aproximado_minutos = $sueño_ligero_hora + 1;
				$total_minutos_sueño_ligero = getMinutes($hora_Total_con_Aproximado_minutos);
			}else {
				$valor_minutos_Manilla = getMinutes($sueño_ligero_hora);
				$total_minutos_sueño_ligero = $valor_minutos_Manilla + $sueño_ligero_solo_minutos;
			}

			//Total de los minutos de los dos tipos de sueño
			$total_minutos_sueño = $sacar_Minutos_hora_Manilla + $total_minutos_sueño_ligero;
			$diferencia_Entre_tiempo_Sueño = $tiempo_sueño_conductor - $total_minutos_sueño;

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